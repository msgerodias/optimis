@extends('layouts.app')

@section('title', 'Register Child')

@section('content')

<form method="POST"
      action="{{ route('bhw.children.store') }}"
      class="bg-white rounded-3xl shadow border border-yellow-100 p-6">

    @csrf

    <div class="mb-6">
        <h2 class="text-xl font-black text-yellow-800">Register Child Information</h2>
        <p class="text-sm text-gray-500">
            Encode child information and parent/guardian details.
        </p>
    </div>

    <div class="rounded-2xl bg-yellow-50 border border-yellow-100 px-5 py-4 mb-6">
        <h3 class="font-black text-yellow-800 mb-1">
            <i class="fa-solid fa-child-reaching mr-2"></i>
            Child Information
        </h3>
        <p class="text-sm text-yellow-700">
            Select the municipality and barangay to automatically generate available purok options.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Lastname</label>
            <input type="text" name="lastname" value="{{ old('lastname') }}" required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Firstname</label>
            <input type="text" name="firstname" value="{{ old('firstname') }}" required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Middlename</label>
            <input type="text" name="middlename" value="{{ old('middlename') }}"
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mt-5">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Belongs to IP Group?</label>
            <select name="belongs_to_ip_group" required
                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                <option value="no" @selected(old('belongs_to_ip_group') === 'no')>No</option>
                <option value="yes" @selected(old('belongs_to_ip_group') === 'yes')>Yes</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Gender</label>
            <select name="gender" required
                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                <option value="">Select Gender</option>
                <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                <option value="Female" @selected(old('gender') === 'Female')>Female</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Birthday</label>
            <input type="date" name="birthday" value="{{ old('birthday') }}" required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Municipality</label>
            <select name="municipality_id" id="municipality_id" required
                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                <option value="">Select Municipality</option>

                @foreach($municipalities as $municipality)
                    <option value="{{ $municipality->municipality_id }}"
                        @selected(old('municipality_id') == $municipality->municipality_id)>
                        {{ $municipality->municipality_name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 mt-5">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Barangay</label>
            <select name="barangay_id" id="barangay_id" required
                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                <option value="">Select Municipality First</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Purok</label>
            <select name="purok" id="purok" required
                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                <option value="">Select Barangay First</option>
            </select>
        </div>
    </div>

    <div class="rounded-2xl bg-yellow-50 border border-yellow-100 px-5 py-4 mt-8 mb-6">
        <h3 class="font-black text-yellow-800 mb-1">
            <i class="fa-solid fa-users mr-2"></i>
            Parent / Guardian Information
        </h3>
        <p class="text-sm text-yellow-700">
            A temporary parent account will be generated after saving.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Parent Lastname</label>
            <input type="text" name="parent_lastname" value="{{ old('parent_lastname') }}" required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Parent Firstname</label>
            <input type="text" name="parent_firstname" value="{{ old('parent_firstname') }}" required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Parent Middlename</label>
            <input type="text" name="parent_middlename" value="{{ old('parent_middlename') }}"
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-5">
        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Contact No.</label>
            <input type="text" name="parent_contact_no" value="{{ old('parent_contact_no') }}"
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Email Address</label>
            <input type="email" name="parent_email_address" value="{{ old('parent_email_address') }}" required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">Authorized Guardian</label>
            <input type="text" name="authorized_guardian" value="{{ old('authorized_guardian') }}"
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
        </div>
    </div>

    <div class="rounded-2xl bg-yellow-50 border border-yellow-100 px-5 py-4 text-sm text-yellow-800 mt-6">
        <p class="font-bold mb-1">
            <i class="fa-solid fa-circle-info mr-2"></i>
            Parent Login Credentials
        </p>

        <p>
            Since MAIL_MAILER is currently set to log, parent credentials will be saved in
            <span class="font-mono font-bold">storage/logs/laravel.log</span>.
        </p>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 pt-6">
        <button type="submit"
                class="inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-6 py-3 text-white text-sm font-bold hover:bg-yellow-800">
            <i class="fa-solid fa-save"></i>
            Save Child and Generate Parent Account
        </button>

        <a href="{{ route('bhw.children.index') }}"
           class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gray-100 px-6 py-3 text-gray-700 text-sm font-bold hover:bg-gray-200">
            Cancel
        </a>
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