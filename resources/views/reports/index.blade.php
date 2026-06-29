@extends('layouts.app')

@section('title', 'OPT Reports')

@section('content')

{{-- Generate Report Filter --}}
<div class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8 mb-6">

    {{-- Decorative Background --}}
    <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
    <div class="absolute -bottom-28 -left-28 w-80 h-80 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
    <div class="absolute top-1/2 right-20 w-32 h-32 rounded-full bg-[#f7a832]/10 blur-2xl"></div>

    <div class="relative z-10">

        {{-- Header --}}
        <div class="mb-8 flex items-start gap-4">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                <i class="fa-solid fa-file-lines text-2xl"></i>
            </div>

            <div>
                <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                    <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                    Monthly OPT Reporting
                </div>

                <h2 class="mt-3 text-2xl font-black text-[#17364a]">
                    Generate OPT Report
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Generate monthly Operation Timbang report per barangay.
                </p>
            </div>
        </div>

        <form method="GET" action="{{ route('reports.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-5">

            {{-- Barangay --}}
            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">
                    Barangay
                </label>

                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                        <i class="fa-solid fa-house-flag"></i>
                    </span>

                    <select name="brgy_id"
                            required
                            class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
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
            </div>

            {{-- Month --}}
            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">
                    Month
                </label>

                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                        <i class="fa-solid fa-calendar-days"></i>
                    </span>

                    <select name="month"
                            required
                            class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                        @for($month = 1; $month <= 12; $month++)
                            <option value="{{ $month }}" @selected($selectedMonth == $month)>
                                {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            {{-- Year --}}
            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">
                    Year
                </label>

                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                        <i class="fa-solid fa-calendar-check"></i>
                    </span>

                    <input type="number"
                           name="year"
                           value="{{ $selectedYear }}"
                           required
                           class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                </div>
            </div>

            {{-- Button --}}
            <div class="flex items-end">
                <button type="submit"
                        class="group relative overflow-hidden w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-6 py-4 text-white text-sm font-black shadow-[0_14px_35px_rgba(47,143,193,.25)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(47,143,193,.35)]">
                    <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                    <span class="relative flex items-center gap-2">
                        <i class="fa-solid fa-file-lines"></i>
                        Generate Report
                    </span>
                </button>
            </div>

        </form>
    </div>
</div>

@if($report)

    {{-- Report Header Summary --}}
    <div class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8 mb-6">

        <div class="absolute -top-24 -left-24 w-72 h-72 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-72 h-72 rounded-full bg-[#f7a832]/10 blur-3xl"></div>

        <div class="relative z-10 text-center">
            <div class="mx-auto mb-5 w-20 h-20 rounded-[1.7rem] bg-white border border-[#d8f0e9] shadow-xl flex items-center justify-center">
                <img
                    src="{{ asset('images/optimis/optimis-logo.png') }}"
                    alt="OPTIMIS Logo"
                    class="w-16 h-16 object-contain"
                >
            </div>

            <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-4 py-2 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                Tracking Growth, Saving Lives
            </div>

            <h2 class="mt-4 text-3xl font-black text-[#17364a]">
                OPTIMIS Monthly Report
            </h2>

            <div class="mt-5 flex flex-wrap justify-center gap-3 text-sm">
                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] px-4 py-3">
                    <span class="text-gray-500">Barangay:</span>
                    <span class="font-black text-[#17364a]">
                        {{ $barangay->brgy_name }}
                    </span>
                </div>

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] px-4 py-3">
                    <span class="text-gray-500">Municipality:</span>
                    <span class="font-black text-[#17364a]">
                        {{ $barangay->municipality->municipality_name ?? 'N/A' }}
                    </span>
                </div>

                <div class="rounded-2xl bg-[#fff3dc] border border-[#ffe1a6] px-4 py-3">
                    <span class="text-gray-500">Period:</span>
                    <span class="font-black text-[#f7a832]">
                        {{ DateTime::createFromFormat('!m', $selectedMonth)->format('F') }}
                        {{ $selectedYear }}
                    </span>
                </div>
            </div>

            <div class="mt-7 inline-flex items-center gap-4 rounded-[1.7rem] bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-7 py-5 text-white shadow-[0_18px_45px_rgba(47,143,193,.28)]">
                <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center">
                    <i class="fa-solid fa-children text-2xl"></i>
                </div>

                <div class="text-left">
                    <p class="text-xs uppercase font-black text-white/85 tracking-wide">
                        Total OPT Records
                    </p>
                    <p class="text-4xl font-black leading-none mt-1">
                        {{ $report['total'] }}
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- Report Tables --}}
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

        <div class="rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_18px_45px_rgba(47,143,193,.10)] p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                    <i class="fa-solid fa-weight-scale"></i>
                </div>

                <h3 class="font-black text-[#17364a]">
                    Table 1. Weight-for-Age
                </h3>
            </div>

            @include('reports.table', [
                'rows' => $report['weight_for_age'],
                'label' => 'Weight-for-Age Status'
            ])
        </div>

        <div class="rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_18px_45px_rgba(47,143,193,.10)] p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                    <i class="fa-solid fa-ruler-vertical"></i>
                </div>

                <h3 class="font-black text-[#17364a]">
                    Table 2. Height-for-Age
                </h3>
            </div>

            @include('reports.table', [
                'rows' => $report['height_for_age'],
                'label' => 'Height-for-Age Status'
            ])
        </div>

        <div class="rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_18px_45px_rgba(47,143,193,.10)] p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-[#fff3dc] text-[#f7a832] flex items-center justify-center">
                    <i class="fa-solid fa-chart-simple"></i>
                </div>

                <h3 class="font-black text-[#17364a]">
                    Table 3. Weight-for-Length/Height
                </h3>
            </div>

            @include('reports.table', [
                'rows' => $report['weight_for_ltht'],
                'label' => 'Weight-for-Length/Height Status'
            ])
        </div>

    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

        <div class="rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_18px_45px_rgba(47,143,193,.10)] p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                    <i class="fa-solid fa-venus-mars"></i>
                </div>

                <h3 class="font-black text-[#17364a]">
                    Table 4. Sex Distribution
                </h3>
            </div>

            @include('reports.table', [
                'rows' => $report['sex'],
                'label' => 'Sex'
            ])
        </div>

        <div class="rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_18px_45px_rgba(47,143,193,.10)] p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                    <i class="fa-solid fa-child-reaching"></i>
                </div>

                <h3 class="font-black text-[#17364a]">
                    Table 5. Age Group Distribution
                </h3>
            </div>

            @include('reports.table', [
                'rows' => $report['age_groups'],
                'label' => 'Age Group'
            ])
        </div>

        <div class="rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_18px_45px_rgba(47,143,193,.10)] p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="w-11 h-11 rounded-2xl bg-[#fff3dc] text-[#f7a832] flex items-center justify-center">
                    <i class="fa-solid fa-users"></i>
                </div>

                <h3 class="font-black text-[#17364a]">
                    Table 6. IP Group Distribution
                </h3>
            </div>

            @include('reports.table', [
                'rows' => $report['ip_group'],
                'label' => 'IP Group'
            ])
        </div>

    </div>

@else

    {{-- Empty State --}}
    <div class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-10 text-center">

        <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>

        <div class="relative z-10">
            <div class="w-20 h-20 rounded-3xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center mx-auto mb-5">
                <i class="fa-solid fa-file-lines text-3xl"></i>
            </div>

            <h3 class="text-xl font-black text-[#17364a] mb-2">
                No Report Generated Yet
            </h3>

            <p class="text-sm text-gray-500">
                Select barangay, month, and year, then click Generate Report.
            </p>
        </div>
    </div>

@endif

@endsection