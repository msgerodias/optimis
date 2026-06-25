@extends('layouts.app')

@section('title', 'Add BHW')

@section('content')

<div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">

    <div class="mb-6">
        <h2 class="text-xl font-black text-yellow-800">Add Barangay Health Worker</h2>
        <p class="text-sm text-gray-500">
            Creating a BHW profile will also create a temporary system user account.
        </p>
    </div>

    <form method="POST" action="{{ route('admin.bhws.store') }}" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Lastname
                </label>

                <input type="text"
                       name="lastname"
                       value="{{ old('lastname') }}"
                       required
                       class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Firstname
                </label>

                <input type="text"
                       name="firstname"
                       value="{{ old('firstname') }}"
                       required
                       class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Middlename
                </label>

                <input type="text"
                       name="middlename"
                       value="{{ old('middlename') }}"
                       class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Contact No.
                </label>

                <input type="text"
                       name="contact_no"
                       value="{{ old('contact_no') }}"
                       class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Email Address
                </label>

                <input type="email"
                       name="email_address"
                       value="{{ old('email_address') }}"
                       required
                       class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Gender
                </label>

                <select name="gender"
                        required
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                    <option value="">Select Gender</option>
                    <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                    <option value="Female" @selected(old('gender') === 'Female')>Female</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">
                Address
            </label>

            <textarea name="address"
                      rows="4"
                      class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">{{ old('address') }}</textarea>
        </div>

        <div class="rounded-2xl bg-yellow-50 border border-yellow-100 px-5 py-4 text-sm text-yellow-800">
            <p class="font-bold mb-1">
                <i class="fa-solid fa-circle-info mr-2"></i>
                Temporary Credentials
            </p>

            <p>
                The system will automatically generate a username and password.
                Since MAIL_MAILER is currently set to log, credentials will be saved in
                <span class="font-mono font-bold">storage/logs/laravel.log</span>.
            </p>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 pt-3">
            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-6 py-3 text-white text-sm font-bold hover:bg-yellow-800">
                <i class="fa-solid fa-save"></i>
                Save BHW and Generate Account
            </button>

            <a href="{{ route('admin.bhws.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gray-100 px-6 py-3 text-gray-700 text-sm font-bold hover:bg-gray-200">
                Cancel
            </a>
        </div>
    </form>

</div>

@endsection