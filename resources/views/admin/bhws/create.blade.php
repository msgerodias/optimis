@extends('layouts.app')

@section('title', 'Add BHW')

@section('content')

<div class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

    {{-- Decorative Background --}}
    <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
    <div class="absolute -bottom-28 -left-28 w-80 h-80 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
    <div class="absolute top-1/2 right-20 w-32 h-32 rounded-full bg-[#f7a832]/10 blur-2xl"></div>

    <div class="relative z-10">

        {{-- Header --}}
        <div class="mb-8 flex items-start gap-4">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                <i class="fa-solid fa-user-nurse text-2xl"></i>
            </div>

            <div>
                <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                    <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                    Health Worker Account
                </div>

                <h2 class="mt-3 text-2xl font-black text-[#17364a]">
                    Add Barangay Health Worker
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Creating a BHW profile will also create a temporary system user account.
                </p>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.bhws.store') }}" class="space-y-7">
            @csrf

            {{-- Name Information --}}
            <div>
                <div class="mb-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                        <i class="fa-solid fa-id-card"></i>
                    </div>

                    <div>
                        <h3 class="font-black text-[#17364a]">Personal Information</h3>
                        <p class="text-xs text-gray-500">Enter the BHW's complete name.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm font-black text-[#17364a] mb-2">
                            Lastname
                        </label>

                        <input type="text"
                               name="lastname"
                               value="{{ old('lastname') }}"
                               required
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                               placeholder="Enter lastname">

                        @error('lastname')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-black text-[#17364a] mb-2">
                            Firstname
                        </label>

                        <input type="text"
                               name="firstname"
                               value="{{ old('firstname') }}"
                               required
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                               placeholder="Enter firstname">

                        @error('firstname')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-black text-[#17364a] mb-2">
                            Middlename
                        </label>

                        <input type="text"
                               name="middlename"
                               value="{{ old('middlename') }}"
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                               placeholder="Enter middlename">

                        @error('middlename')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Contact Information --}}
            <div>
                <div class="mb-4 flex items-center gap-3">
                    <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                        <i class="fa-solid fa-address-book"></i>
                    </div>

                    <div>
                        <h3 class="font-black text-[#17364a]">Contact Information</h3>
                        <p class="text-xs text-gray-500">Used for account notification and profile records.</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                    <div>
                        <label class="block text-sm font-black text-[#17364a] mb-2">
                            Contact No.
                        </label>

                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                                <i class="fa-solid fa-phone"></i>
                            </span>

                            <input type="text"
                                   name="contact_no"
                                   value="{{ old('contact_no') }}"
                                   class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                                   placeholder="Enter contact no.">
                        </div>

                        @error('contact_no')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-black text-[#17364a] mb-2">
                            Email Address
                        </label>

                        <div class="relative group">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                                <i class="fa-solid fa-envelope"></i>
                            </span>

                            <input type="email"
                                   name="email_address"
                                   value="{{ old('email_address') }}"
                                   required
                                   class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                                   placeholder="Enter email address">
                        </div>

                        @error('email_address')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-black text-[#17364a] mb-2">
                            Gender
                        </label>

                        <select name="gender"
                                required
                                class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25">
                            <option value="">Select Gender</option>
                            <option value="Male" @selected(old('gender') === 'Male')>Male</option>
                            <option value="Female" @selected(old('gender') === 'Female')>Female</option>
                        </select>

                        @error('gender')
                            <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Address --}}
            <div>
                <label class="block text-sm font-black text-[#17364a] mb-2">
                    Address
                </label>

                <textarea name="address"
                          rows="4"
                          class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                          placeholder="Enter complete address">{{ old('address') }}</textarea>

                @error('address')
                    <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Temporary Credentials Notice --}}
            <div class="rounded-[1.5rem] bg-[#fff3dc] border border-[#ffe1a6] px-5 py-4 text-sm text-[#9b6500]">
                <div class="flex items-start gap-3">
                    <div class="mt-0.5 w-10 h-10 rounded-2xl bg-white/70 text-[#f7a832] flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-circle-info"></i>
                    </div>

                    <div>
                        <p class="font-black mb-1 text-[#9b6500]">
                            Temporary Credentials
                        </p>

                        <p class="leading-relaxed">
                            The system will automatically generate a username and password.
                            Since <span class="font-mono font-black">MAIL_MAILER</span> is currently set to log,
                            credentials will be saved in
                            <span class="font-mono font-black">storage/logs/laravel.log</span>.
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
                        Save BHW and Generate Account
                    </span>
                </button>

                <a href="{{ route('admin.bhws.index') }}"
                   class="inline-flex items-center justify-center gap-2 rounded-2xl bg-[#e8f8f3] border border-[#d8f0e9] px-6 py-3.5 text-[#176895] text-sm font-black transition hover:bg-[#d8f0e9]">
                    <i class="fa-solid fa-arrow-left"></i>
                    Cancel
                </a>
            </div>
        </form>

    </div>
</div>

@endsection