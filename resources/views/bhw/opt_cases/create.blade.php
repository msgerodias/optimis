@extends('layouts.app')

@section('title', 'Create OPT Case')

@section('content')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- Child Profile Card --}}
    <div class="xl:col-span-1 h-fit relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

        {{-- Decorative Background --}}
        <div class="absolute -top-20 -right-20 w-60 h-60 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-60 h-60 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>

        <div class="relative z-10">

            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center mb-5 shadow-lg">
                <i class="fa-solid fa-child-reaching text-2xl"></i>
            </div>

            <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                Child Profile
            </div>

            <h2 class="mt-3 text-2xl font-black text-[#17364a] mb-5">
                {{ $child->full_name }}
            </h2>

            <div class="space-y-4 text-sm">

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-4">
                    <p class="text-gray-500">Birthday</p>
                    <p class="font-black text-[#17364a] mt-1">
                        {{ $child->birthday->format('M d, Y') }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-4">
                    <p class="text-gray-500">Gender</p>
                    <p class="font-black text-[#17364a] mt-1">
                        {{ $child->gender }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-4">
                    <p class="text-gray-500">Municipality</p>
                    <p class="font-black text-[#17364a] mt-1">
                        {{ $child->municipality->municipality_name ?? 'N/A' }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-4">
                    <p class="text-gray-500">Barangay</p>
                    <p class="font-black text-[#17364a] mt-1">
                        {{ $child->barangay->brgy_name ?? 'N/A' }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#fff3dc] border border-[#ffe1a6] p-4">
                    <p class="text-gray-500">Purok</p>
                    <p class="font-black text-[#f7a832] mt-1">
                        Purok {{ $child->purok }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#fff3dc] border border-[#ffe1a6] p-4">
                    <p class="text-gray-500">Parent / Guardian</p>
                    <p class="font-black text-[#f7a832] mt-1">
                        {{ $child->parent->full_name ?? 'N/A' }}
                    </p>
                </div>

            </div>
        </div>
    </div>

    {{-- Create OPT Case Form --}}
    <form method="POST"
          action="{{ route('bhw.opt-cases.store', $child) }}"
          class="xl:col-span-2 relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

        @csrf

        {{-- Decorative Background --}}
        <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
        <div class="absolute -bottom-28 -left-28 w-80 h-80 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
        <div class="absolute top-1/2 right-20 w-32 h-32 rounded-full bg-[#f7a832]/10 blur-2xl"></div>

        <div class="relative z-10">

            {{-- Header --}}
            <div class="mb-8 flex items-start gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                    <i class="fa-solid fa-notes-medical text-2xl"></i>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                        <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                        OPT Monitoring
                    </div>

                    <h2 class="mt-3 text-2xl font-black text-[#17364a]">
                        Create OPT Case
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Encode height, weight, date measured, and nutritional status.
                    </p>
                </div>
            </div>

            {{-- Measurements --}}
            <div class="mb-5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                    <i class="fa-solid fa-ruler-combined"></i>
                </div>

                <div>
                    <h3 class="font-black text-[#17364a]">Measurement Details</h3>
                    <p class="text-xs text-gray-500">Enter the child’s current height and weight.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Height
                    </label>

                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                            <i class="fa-solid fa-ruler-vertical"></i>
                        </span>

                        <input type="number"
                               step="0.01"
                               min="1"
                               name="height"
                               value="{{ old('height') }}"
                               required
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                               placeholder="Example: 90.50">
                    </div>

                    @error('height')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Weight
                    </label>

                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                            <i class="fa-solid fa-weight-scale"></i>
                        </span>

                        <input type="number"
                               step="0.01"
                               min="1"
                               name="weight"
                               value="{{ old('weight') }}"
                               required
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                               placeholder="Example: 14.20">
                    </div>

                    @error('weight')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Date Measured
                    </label>

                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                            <i class="fa-solid fa-calendar-days"></i>
                        </span>

                        <input type="date"
                               name="date_measured"
                               value="{{ old('date_measured', now()->format('Y-m-d')) }}"
                               required
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                    </div>

                    @error('date_measured')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Age Notice --}}
            <div class="rounded-[1.5rem] bg-[#fff3dc] border border-[#ffe1a6] px-5 py-4 mt-7 mb-7 text-sm text-[#9b6500]">
                <div class="flex items-start gap-3">
                    <div class="mt-0.5 w-10 h-10 rounded-2xl bg-white/70 text-[#f7a832] flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-calculator"></i>
                    </div>

                    <div>
                        <p class="font-black mb-1 text-[#9b6500]">
                            Age in Months
                        </p>

                        <p class="leading-relaxed">
                            The system will automatically calculate the age in months using the child’s birthday and the selected date measured.
                        </p>
                    </div>
                </div>
            </div>

            {{-- Nutritional Status --}}
            <div class="mb-5 flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                    <i class="fa-solid fa-chart-simple"></i>
                </div>

                <div>
                    <h3 class="font-black text-[#17364a]">Nutritional Status</h3>
                    <p class="text-xs text-gray-500">Select the child’s nutritional classifications.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-5">
                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Weight-for-Age Status
                    </label>

                    <select name="weight_for_age_status"
                            required
                            class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                        <option value="">Select Status</option>

                        @foreach($weightForAgeStatuses as $status)
                            <option value="{{ $status }}" @selected(old('weight_for_age_status') === $status)>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>

                    @error('weight_for_age_status')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Height-for-Age Status
                    </label>

                    <select name="height_for_age_status"
                            required
                            class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                        <option value="">Select Status</option>

                        @foreach($heightForAgeStatuses as $status)
                            <option value="{{ $status }}" @selected(old('height_for_age_status') === $status)>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>

                    @error('height_for_age_status')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Weight-for-Length/Height Status
                    </label>

                    <select name="weight_for_ltht_status"
                            required
                            class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                        <option value="">Select Status</option>

                        @foreach($weightForLengthHeightStatuses as $status)
                            <option value="{{ $status }}" @selected(old('weight_for_ltht_status') === $status)>
                                {{ $status }}
                            </option>
                        @endforeach
                    </select>

                    @error('weight_for_ltht_status')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex flex-col sm:flex-row gap-3 pt-7">
                <button type="submit"
                        class="group relative overflow-hidden inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-6 py-3.5 text-white text-sm font-black shadow-[0_14px_35px_rgba(47,143,193,.25)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(47,143,193,.35)]">
                    <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                    <span class="relative flex items-center gap-2">
                        <i class="fa-solid fa-save"></i>
                        Save OPT Case
                    </span>
                </button>

                <a href="{{ route('bhw.children.show', $child) }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-[#e8f8f3] border border-[#d8f0e9] px-6 py-3.5 text-[#176895] text-sm font-black transition hover:bg-[#d8f0e9]">
                    <i class="fa-solid fa-arrow-left"></i>
                    Cancel
                </a>
            </div>

        </div>
    </form>

</div>

@endsection