<?php

namespace App\Http\Controllers\Bhw;

use App\Http\Controllers\Controller;
use App\Models\ChildRecord;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OptCaseController extends Controller
{
    public function create(ChildRecord $child)
    {
        $child->load([
            'municipality',
            'barangay',
            'parent',
        ]);

        $weightForAgeStatuses = $this->weightForAgeStatuses();
        $heightForAgeStatuses = $this->heightForAgeStatuses();
        $weightForLengthHeightStatuses = $this->weightForLengthHeightStatuses();

        return view('bhw.opt_cases.create', compact(
            'child',
            'weightForAgeStatuses',
            'heightForAgeStatuses',
            'weightForLengthHeightStatuses'
        ));
    }

    public function store(Request $request, ChildRecord $child)
    {
        $request->validate([
            'height' => ['required', 'numeric', 'min:1'],
            'weight' => ['required', 'numeric', 'min:1'],
            'date_measured' => ['required', 'date'],

            'weight_for_age_status' => [
                'required',
                Rule::in($this->weightForAgeStatuses()),
            ],

            'height_for_age_status' => [
                'required',
                Rule::in($this->heightForAgeStatuses()),
            ],

            'weight_for_ltht_status' => [
                'required',
                Rule::in($this->weightForLengthHeightStatuses()),
            ],
        ]);

        $birthday = Carbon::parse($child->birthday);
        $dateMeasured = Carbon::parse($request->date_measured);

        if ($dateMeasured->lt($birthday)) {
            return back()
                ->withErrors([
                    'date_measured' => 'Date measured cannot be earlier than the child birthday.',
                ])
                ->withInput();
        }

        $ageInMonths = $birthday->diffInMonths($dateMeasured);

        $child->optCases()->create([
            'height' => $request->height,
            'weight' => $request->weight,
            'date_measured' => $request->date_measured,
            'age_in_months' => $ageInMonths,
            'weight_for_age_status' => $request->weight_for_age_status,
            'height_for_age_status' => $request->height_for_age_status,
            'weight_for_ltht_status' => $request->weight_for_ltht_status,
        ]);

        return redirect()
            ->route('bhw.children.show', $child)
            ->with('success', 'OPT case created successfully.');
    }

    private function weightForAgeStatuses(): array
    {
        return [
            'Normal (N)',
            'Overweight (OW)',
            'Moderately Underweight (UW)',
            'Severely Underweight (SUW)',
        ];
    }

    private function heightForAgeStatuses(): array
    {
        return [
            'Normal (N)',
            'Tall (T)',
            'Stunted (St)',
            'Severely Stunted (SSt)',
        ];
    }

    private function weightForLengthHeightStatuses(): array
    {
        return [
            'Normal (N)',
            'Overweight (OW)',
            'Obese (Ob)',
            'Wasted (W)',
            'MW/MAM',
        ];
    }
}