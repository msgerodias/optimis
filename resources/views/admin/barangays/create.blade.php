@extends('layouts.app')

@section('title', 'Add Barangay')

@section('content')

<div class="max-w-3xl">

    <div class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

        {{-- Decorative Background --}}
        <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
        <div class="absolute top-1/2 right-10 w-32 h-32 rounded-full bg-[#f7a832]/10 blur-2xl"></div>

        <div class="relative z-10">

            {{-- Header --}}
            <div class="mb-8 flex items-start gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                    <i class="fa-solid fa-house-flag text-2xl"></i>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                        <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                        Barangay Records
                    </div>

                    <h2 class="mt-3 text-2xl font-black text-[#17364a]">
                        Add Barangay
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Create a barangay record under a selected municipality.
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.barangays.store') }}" class="space-y-6">
                @csrf

                {{-- Barangay Name --}}
                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Barangay Name
                    </label>

                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                            <i class="fa-solid fa-house"></i>
                        </span>

                        <input type="text"
                               name="brgy_name"
                               value="{{ old('brgy_name') }}"
                               required
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                               placeholder="Example: Barangay 1">
                    </div>

                    @error('brgy_name')
                        <p class="mt-2 text-sm font-semibold text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Municipality --}}
                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Municipality
                    </label>

                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </span>

                        <select name="brgy_municipality"
                                required
                                class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                            <option value="">Select Municipality</option>

                            @foreach($municipalities as $municipality)
                                <option value="{{ $municipality->municipality_id }}"
                                    @selected(old('brgy_municipality') == $municipality->municipality_id)>
                                    {{ $municipality->municipality_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    @error('brgy_municipality')
                        <p class="mt-2 text-sm font-semibold text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Purok Count --}}
                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Purok Count
                    </label>

                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                            <i class="fa-solid fa-layer-group"></i>
                        </span>

                        <input type="number"
                               name="brgy_purok_count"
                               value="{{ old('brgy_purok_count', 1) }}"
                               min="1"
                               required
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                               placeholder="Example: 7">
                    </div>

                    @error('brgy_purok_count')
                        <p class="mt-2 text-sm font-semibold text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Info Note --}}
                <div class="rounded-[1.5rem] bg-[#e8f8f3] border border-[#d8f0e9] px-5 py-4 text-sm text-[#176895]">
                    <div class="flex items-start gap-3">
                        <div class="mt-0.5 w-10 h-10 rounded-2xl bg-white text-[#2f8fc1] flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-circle-info"></i>
                        </div>

                        <div>
                            <p class="font-black mb-1 text-[#17364a]">
                                Barangay Coverage
                            </p>

                            <p class="leading-relaxed">
                                The purok count will help organize child monitoring records and barangay-level OPT reporting.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-3">
                    <button type="submit"
                            class="group relative overflow-hidden inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-6 py-3.5 text-white text-sm font-black shadow-[0_14px_35px_rgba(47,143,193,.25)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(47,143,193,.35)]">
                        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                        <span class="relative flex items-center gap-2">
                            <i class="fa-solid fa-save"></i>
                            Save Barangay
                        </span>
                    </button>

                    <a href="{{ route('admin.barangays.index') }}"
                       class="inline-flex items-center justify-center gap-2 rounded-2xl bg-[#e8f8f3] border border-[#d8f0e9] px-6 py-3.5 text-[#176895] text-sm font-black transition hover:bg-[#d8f0e9]">
                        <i class="fa-solid fa-arrow-left"></i>
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection