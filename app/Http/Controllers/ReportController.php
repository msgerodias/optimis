<?php

namespace App\Http\Controllers;

use App\Models\Barangay;
use App\Models\OptCase;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $barangays = Barangay::with('municipality')
            ->orderBy('brgy_name')
            ->get();

        $selectedBarangay = $request->brgy_id;
        $selectedMonth = $request->month ?? now()->month;
        $selectedYear = $request->year ?? now()->year;

        $barangay = null;
        $report = null;

        if ($selectedBarangay) {
            $barangay = Barangay::with('municipality')
                ->findOrFail($selectedBarangay);

            $cases = OptCase::with([
                    'child',
                    'child.barangay',
                    'child.municipality',
                ])
                ->whereYear('date_measured', $selectedYear)
                ->whereMonth('date_measured', $selectedMonth)
                ->whereHas('child', function ($query) use ($selectedBarangay) {
                    $query->where('barangay_id', $selectedBarangay);
                })
                ->get();

            $total = $cases->count();

            $report = [
                'total' => $total,

                'weight_for_age' => $this->distribution($cases, 'weight_for_age_status', [
                    'Normal (N)',
                    'Overweight (OW)',
                    'Moderately Underweight (UW)',
                    'Severely Underweight (SUW)',
                ]),

                'height_for_age' => $this->distribution($cases, 'height_for_age_status', [
                    'Normal (N)',
                    'Tall (T)',
                    'Stunted (St)',
                    'Severely Stunted (SSt)',
                ]),

                'weight_for_ltht' => $this->distribution($cases, 'weight_for_ltht_status', [
                    'Normal (N)',
                    'Overweight (OW)',
                    'Obese (Ob)',
                    'Wasted (W)',
                    'MW/MAM',
                ]),

                'sex' => $this->sexDistribution($cases),

                'age_groups' => $this->ageGroupDistribution($cases),

                'ip_group' => $this->ipGroupDistribution($cases),
            ];
        }

        return view('reports.index', compact(
            'barangays',
            'selectedBarangay',
            'selectedMonth',
            'selectedYear',
            'barangay',
            'report'
        ));
    }

    private function distribution($cases, string $field, array $labels): array
    {
        $total = $cases->count();

        return collect($labels)
            ->map(function ($label) use ($cases, $field, $total) {
                $count = $cases->where($field, $label)->count();

                return [
                    'label' => $label,
                    'count' => $count,
                    'percent' => $this->percent($count, $total),
                ];
            })
            ->toArray();
    }

    private function sexDistribution($cases): array
    {
        $total = $cases->count();

        $rows = [
            'Male' => $cases->filter(function ($case) {
                return optional($case->child)->gender === 'Male';
            })->count(),

            'Female' => $cases->filter(function ($case) {
                return optional($case->child)->gender === 'Female';
            })->count(),
        ];

        return collect($rows)
            ->map(function ($count, $label) use ($total) {
                return [
                    'label' => $label,
                    'count' => $count,
                    'percent' => $this->percent($count, $total),
                ];
            })
            ->values()
            ->toArray();
    }

    private function ageGroupDistribution($cases): array
    {
        $groups = [
            '0-5 months' => [0, 5],
            '6-11 months' => [6, 11],
            '12-23 months' => [12, 23],
            '24-35 months' => [24, 35],
            '36-47 months' => [36, 47],
            '48-59 months' => [48, 59],
            '60 months and above' => [60, 999],
        ];

        $total = $cases->count();

        $rows = [];

        foreach ($groups as $label => [$min, $max]) {
            $count = $cases->filter(function ($case) use ($min, $max) {
                return $case->age_in_months >= $min && $case->age_in_months <= $max;
            })->count();

            $rows[] = [
                'label' => $label,
                'count' => $count,
                'percent' => $this->percent($count, $total),
            ];
        }

        return $rows;
    }

    private function ipGroupDistribution($cases): array
    {
        $total = $cases->count();

        $rows = [
            'IP Group' => $cases->filter(function ($case) {
                return optional($case->child)->belongs_to_ip_group === 'yes';
            })->count(),

            'Non-IP Group' => $cases->filter(function ($case) {
                return optional($case->child)->belongs_to_ip_group === 'no';
            })->count(),
        ];

        return collect($rows)
            ->map(function ($count, $label) use ($total) {
                return [
                    'label' => $label,
                    'count' => $count,
                    'percent' => $this->percent($count, $total),
                ];
            })
            ->values()
            ->toArray();
    }

    private function percent(int $count, int $total): string
    {
        if ($total <= 0) {
            return '0.00%';
        }

        return number_format(($count / $total) * 100, 2) . '%';
    }
}