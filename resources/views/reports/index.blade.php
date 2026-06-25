@extends('layouts.app')

@section('title', 'OPT Reports')

@section('content')

<div class="bg-white rounded-3xl shadow border border-yellow-100 p-6 mb-6">

    <div class="mb-6">
        <h2 class="text-xl font-black text-yellow-800">Generate OPT Report</h2>
        <p class="text-sm text-gray-500">
            Generate monthly Operation Timbang report per barangay.
        </p>
    </div>

    <form method="GET" action="{{ route('reports.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-5">

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">
                Barangay
            </label>

            <select name="brgy_id"
                    required
                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                <option value="">Select Barangay</option>

                @foreach($barangays as $barangayOption)
                    <option value="{{ $barangayOption->brgy_id }}"
                        @selected($selectedBarangay == $barangayOption->brgy_id)>
                        {{ $barangayOption->brgy_name }}
                        -
                        {{ $barangayOption->municipality->municipality_name ?? 'N/A' }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">
                Month
            </label>

            <select name="month"
                    required
                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                @for($month = 1; $month <= 12; $month++)
                    <option value="{{ $month }}" @selected($selectedMonth == $month)>
                        {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                    </option>
                @endfor
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">
                Year
            </label>

            <input type="number"
                   name="year"
                   value="{{ $selectedYear }}"
                   required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>

        <div class="flex items-end">
            <button type="submit"
                    class="w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-6 py-3 text-white text-sm font-bold hover:bg-yellow-800">
                <i class="fa-solid fa-file-lines"></i>
                Generate Report
            </button>
        </div>

    </form>
</div>

@if($report)

    <div class="bg-white rounded-3xl shadow border border-yellow-100 p-6 mb-6">

        <div class="text-center">
            <h2 class="text-2xl font-black text-yellow-800">
                OPTIMIS Monthly Report
            </h2>

            <p class="text-sm text-gray-600 mt-2">
                Barangay:
                <span class="font-bold">
                    {{ $barangay->brgy_name }}
                </span>
            </p>

            <p class="text-sm text-gray-600">
                Municipality:
                <span class="font-bold">
                    {{ $barangay->municipality->municipality_name ?? 'N/A' }}
                </span>
            </p>

            <p class="text-sm text-gray-600">
                Period:
                <span class="font-bold">
                    {{ DateTime::createFromFormat('!m', $selectedMonth)->format('F') }}
                    {{ $selectedYear }}
                </span>
            </p>

            <div class="mt-5 inline-flex items-center gap-3 rounded-2xl bg-yellow-50 border border-yellow-100 px-6 py-4">
                <div class="w-12 h-12 rounded-2xl bg-yellow-100 text-yellow-800 flex items-center justify-center">
                    <i class="fa-solid fa-children"></i>
                </div>

                <div class="text-left">
                    <p class="text-xs uppercase font-bold text-gray-500">
                        Total OPT Records
                    </p>
                    <p class="text-3xl font-black text-yellow-800">
                        {{ $report['total'] }}
                    </p>
                </div>
            </div>
        </div>

    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

        <div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">
            <h3 class="font-black text-yellow-800 mb-4">
                Table 1. Weight-for-Age Nutritional Status
            </h3>

            @include('reports.table', [
                'rows' => $report['weight_for_age'],
                'label' => 'Weight-for-Age Status'
            ])
        </div>

        <div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">
            <h3 class="font-black text-yellow-800 mb-4">
                Table 2. Height-for-Age Nutritional Status
            </h3>

            @include('reports.table', [
                'rows' => $report['height_for_age'],
                'label' => 'Height-for-Age Status'
            ])
        </div>

        <div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">
            <h3 class="font-black text-yellow-800 mb-4">
                Table 3. Weight-for-Length/Height Nutritional Status
            </h3>

            @include('reports.table', [
                'rows' => $report['weight_for_ltht'],
                'label' => 'Weight-for-Length/Height Status'
            ])
        </div>

    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">
            <h3 class="font-black text-yellow-800 mb-4">
                Table 4. Sex Distribution
            </h3>

            @include('reports.table', [
                'rows' => $report['sex'],
                'label' => 'Sex'
            ])
        </div>

        <div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">
            <h3 class="font-black text-yellow-800 mb-4">
                Table 5. Age Group Distribution
            </h3>

            @include('reports.table', [
                'rows' => $report['age_groups'],
                'label' => 'Age Group'
            ])
        </div>

        <div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">
            <h3 class="font-black text-yellow-800 mb-4">
                Table 6. IP Group Distribution
            </h3>

            @include('reports.table', [
                'rows' => $report['ip_group'],
                'label' => 'IP Group'
            ])
        </div>

    </div>

@else

    <div class="bg-white rounded-3xl shadow border border-yellow-100 p-10 text-center">
        <div class="w-20 h-20 rounded-3xl bg-yellow-100 text-yellow-800 flex items-center justify-center mx-auto mb-5">
            <i class="fa-solid fa-file-lines text-3xl"></i>
        </div>

        <h3 class="text-xl font-black text-yellow-800 mb-2">
            No Report Generated Yet
        </h3>

        <p class="text-sm text-gray-500">
            Select barangay, month, and year, then click Generate Report.
        </p>
    </div>

@endif

@endsection