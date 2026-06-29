@extends('layouts.app')

@section('title', 'Register Child')

@section('content')

<form method="POST"
      action="{{ route('bhw.children.store') }}"
      class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

    @csrf

    {{-- Decorative Background --}}
    <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
    <div class="absolute -bottom-28 -left-28 w-80 h-80 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
    <div class="absolute top-1/2 right-20 w-32 h-32 rounded-full bg-[#f7a832]/10 blur-2xl"></div>

    <div class="relative z-10">

        {{-- Header --}}
        <div class="mb-8 flex items-start gap-4">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                <i class="fa-solid fa-child-reaching text-2xl"></i>
            </div>

            <div>
                <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                    <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                    Child Registration
                </div>

                <h2 class="mt-3 text-2xl font-black text-[#17364a]">
                    Register Child Information
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Encode child information and parent/guardian details.
                </p>
            </div>
        </div>

        {{-- Child Information Notice --}}
        <div class="rounded-[1.5rem] bg-[#e8f8f3] border border-[#d8f0e9] px-5 py-4 mb-7">
            <div class="flex items-start gap-3">
                <div class="mt-0.5 w-10 h-10 rounded-2xl bg-white text-[#2f8fc1] flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-child-reaching"></i>
                </div>

                <div>
                    <h3 class="font-black text-[#17364a] mb-1">
                        Child Information
                    </h3>

                    <p class="text-sm text-[#176895] leading-relaxed">
                        Select the municipality and barangay to automatically generate available purok options.
                    </p>
                </div>
            </div>
        </div>

        {{-- Child Name --}}
        <div class="mb-5 flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                <i class="fa-solid fa-id-card"></i>
            </div>

            <div>
                <h3 class="font-black text-[#17364a]">Child Personal Information</h3>
                <p class="text-xs text-gray-500">Enter the child’s complete name.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Lastname</label>
                <input type="text" name="lastname" value="{{ old('lastname') }}" required
                       class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                       placeholder="Enter lastname">

                @error('lastname')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Firstname</label>
                <input type="text" name="firstname" value="{{ old('firstname') }}" required
                       class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                       placeholder="Enter firstname">

                @error('firstname')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Middlename</label>
                <input type="text" name="middlename" value="{{ old('middlename') }}"
                       class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                       placeholder="Enter middlename">

                @error('middlename')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Child Details --}}
        <div class="mb-5 mt-8 flex items-center gap-3">
            <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>

            <div>
                <h3 class="font-black text-[#17364a]">Child Details</h3>
                <p class="text-xs text-gray-500">Select IP group, gender, birthday, and location.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-5">
            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Belongs to IP Group?</label>
                <select name="belongs_to_ip_group" required
                        class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                    <option value="no" @selected(old('belongs_to_ip_group') === 'no')>No</option>
                    <option value="yes" @selected(old('belongs_to_ip_group') === 'yes')>Yes</option>
                </select>

                @error('belongs_to_ip_group')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Gender</label>
                <select name="gender" required
                        class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                    <option value="">Select Gender</option>
                    <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                    <option value="Female" @selected(old('gender') === 'Female')>Female</option>
                </select>

                @error('gender')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Birthday</label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                        <i class="fa-solid fa-cake-candles"></i>
                    </span>

                    <input type="date" name="birthday" value="{{ old('birthday') }}" required
                           class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                </div>

                @error('birthday')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Municipality</label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </span>

                    <select name="municipality_id" id="municipality_id" required
                            class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                        <option value="">Select Municipality</option>

                        @foreach($municipalities as $municipality)
                            <option value="{{ $municipality->municipality_id }}"
                                @selected(old('municipality_id') == $municipality->municipality_id)>
                                {{ $municipality->municipality_name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                @error('municipality_id')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Barangay</label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                        <i class="fa-solid fa-house-flag"></i>
                    </span>

                    <select name="barangay_id" id="barangay_id" required
                            class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                        <option value="">Select Municipality First</option>
                    </select>
                </div>

                @error('barangay_id')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Purok</label>
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                        <i class="fa-solid fa-layer-group"></i>
                    </span>

                    <select name="purok" id="purok" required
                            class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                        <option value="">Select Barangay First</option>
                    </select>
                </div>

                @error('purok')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Parent Information Notice --}}
        <div class="rounded-[1.5rem] bg-[#fff3dc] border border-[#ffe1a6] px-5 py-4 mt-8 mb-7">
            <div class="flex items-start gap-3">
                <div class="mt-0.5 w-10 h-10 rounded-2xl bg-white/70 text-[#f7a832] flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-users"></i>
                </div>

                <div>
                    <h3 class="font-black text-[#9b6500] mb-1">
                        Parent / Guardian Information
                    </h3>

                    <p class="text-sm text-[#9b6500] leading-relaxed">
                        A temporary parent account will be generated after saving.
                    </p>
                </div>
            </div>
        </div>

        {{-- Parent Name --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Parent Lastname</label>
                <input type="text" name="parent_lastname" value="{{ old('parent_lastname') }}" required
                       class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                       placeholder="Enter parent lastname">

                @error('parent_lastname')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Parent Firstname</label>
                <input type="text" name="parent_firstname" value="{{ old('parent_firstname') }}" required
                       class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                       placeholder="Enter parent firstname">

                @error('parent_firstname')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Parent Middlename</label>
                <input type="text" name="parent_middlename" value="{{ old('parent_middlename') }}"
                       class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                       placeholder="Enter parent middlename">

                @error('parent_middlename')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Parent Contact --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">
            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Contact No.</label>

                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                        <i class="fa-solid fa-phone"></i>
                    </span>

                    <input type="text" name="parent_contact_no" value="{{ old('parent_contact_no') }}"
                           class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                           placeholder="Enter contact no.">
                </div>

                @error('parent_contact_no')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Email Address</label>

                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                        <i class="fa-solid fa-envelope"></i>
                    </span>

                    <input type="email" name="parent_email_address" value="{{ old('parent_email_address') }}" required
                           class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                           placeholder="Enter email address">
                </div>

                @error('parent_email_address')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">Authorized Guardian</label>
                <input type="text" name="authorized_guardian" value="{{ old('authorized_guardian') }}"
                       class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                       placeholder="Optional">

                @error('authorized_guardian')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        {{-- Parent Credentials Notice --}}
        <div class="rounded-[1.5rem] bg-[#fff3dc] border border-[#ffe1a6] px-5 py-4 text-sm text-[#9b6500] mt-7">
            <div class="flex items-start gap-3">
                <div class="mt-0.5 w-10 h-10 rounded-2xl bg-white/70 text-[#f7a832] flex items-center justify-center shrink-0">
                    <i class="fa-solid fa-circle-info"></i>
                </div>

                <div>
                    <p class="font-black mb-1">
                        Parent Login Credentials
                    </p>

                    <p class="leading-relaxed">
                        Since <span class="font-mono font-black">MAIL_MAILER</span> is currently set to log,
                        parent credentials will be saved in
                        <span class="font-mono font-black">storage/logs/laravel.log</span>.
                    </p>
                </div>
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row gap-3 pt-7">
            <button type="submit"
                    class="group relative overflow-hidden inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-6 py-3.5 text-white text-sm font-black shadow-[0_14px_35px_rgba(47,143,193,.25)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(47,143,193,.35)]">
                <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                <span class="relative flex items-center gap-2">
                    <i class="fa-solid fa-save"></i>
                    Save Child and Generate Parent Account
                </span>
            </button>

            <a href="{{ route('bhw.children.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-2xl bg-[#e8f8f3] border border-[#d8f0e9] px-6 py-3.5 text-[#176895] text-sm font-black transition hover:bg-[#d8f0e9]">
                <i class="fa-solid fa-arrow-left"></i>
                Cancel
            </a>
        </div>

    </div>

</form>

@php
    $barangayOptions = $barangays->map(function ($barangay) {
        return [
            'brgy_id' => $barangay->brgy_id,
            'brgy_name' => $barangay->brgy_name,
            'brgy_municipality' => $barangay->brgy_municipality,
            'brgy_purok_count' => $barangay->brgy_purok_count,
        ];
    })->values();
@endphp

<script>
    const barangays = @json($barangayOptions);

    const oldMunicipalityId = "{{ old('municipality_id') }}";
    const oldBarangayId = "{{ old('barangay_id') }}";
    const oldPurok = "{{ old('purok') }}";

    const municipalitySelect = document.getElementById('municipality_id');
    const barangaySelect = document.getElementById('barangay_id');
    const purokSelect = document.getElementById('purok');

    function loadBarangays() {
        const municipalityId = municipalitySelect.value;

        const filteredBarangays = barangays.filter(function (barangay) {
            return barangay.brgy_municipality == municipalityId;
        });

        barangaySelect.innerHTML = '<option value="">Select Barangay</option>';
        purokSelect.innerHTML = '<option value="">Select Barangay First</option>';

        filteredBarangays.forEach(function (barangay) {
            const selected = barangay.brgy_id == oldBarangayId ? 'selected' : '';

            barangaySelect.innerHTML += `
                <option value="${barangay.brgy_id}" ${selected}>
                    ${barangay.brgy_name}
                </option>
            `;
        });

        loadPuroks();
    }

    function loadPuroks() {
        const selectedBarangay = barangays.find(function (barangay) {
            return barangay.brgy_id == barangaySelect.value;
        });

        purokSelect.innerHTML = '<option value="">Select Purok</option>';

        if (selectedBarangay) {
            for (let i = 1; i <= selectedBarangay.brgy_purok_count; i++) {
                const selected = i == oldPurok ? 'selected' : '';

                purokSelect.innerHTML += `
                    <option value="${i}" ${selected}>
                        Purok ${i}
                    </option>
                `;
            }
        }
    }

    municipalitySelect.addEventListener('change', loadBarangays);
    barangaySelect.addEventListener('change', loadPuroks);

    if (oldMunicipalityId) {
        loadBarangays();
    }
</script>

@endsection