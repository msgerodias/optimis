@extends('layouts.app')

@section('title', 'Edit Municipality')

@section('content')

<div class="max-w-3xl">

    {{-- Page Card --}}
    <div class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

        {{-- Decorative Background --}}
        <div class="absolute -top-20 -right-20 w-64 h-64 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
        <div class="absolute -bottom-24 -left-24 w-72 h-72 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
        <div class="absolute top-1/2 right-10 w-32 h-32 rounded-full bg-[#f7a832]/10 blur-2xl"></div>

        <div class="relative z-10">

            {{-- Header --}}
            <div class="mb-8 flex items-start gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                    <i class="fa-solid fa-pen-to-square text-2xl"></i>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                        <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                        Municipality Records
                    </div>

                    <h2 class="mt-3 text-2xl font-black text-[#17364a]">
                        Edit Municipality
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Update municipality information and postal code.
                    </p>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.municipalities.update', $municipality) }}" class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Municipality Name --}}
                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Municipality Name
                    </label>

                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                            <i class="fa-solid fa-city"></i>
                        </span>

                        <input type="text"
                               name="municipality_name"
                               value="{{ old('municipality_name', $municipality->municipality_name) }}"
                               required
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                               placeholder="Example: Tanauan City">
                    </div>

                    @error('municipality_name')
                        <p class="mt-2 text-sm font-semibold text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Postal Code --}}
                <div>
                    <label class="block text-sm font-black text-[#17364a] mb-2">
                        Postal Code
                    </label>

                    <div class="relative group">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-[#2f8fc1] group-focus-within:text-[#176895]">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </span>

                        <input type="text"
                               name="municipality_postal_code"
                               value="{{ old('municipality_postal_code', $municipality->municipality_postal_code) }}"
                               class="w-full rounded-2xl border border-[#d8f0e9] bg-white px-4 py-4 pl-12 text-sm font-semibold text-gray-800 shadow-sm outline-none transition focus:border-[#2f8fc1] focus:ring-4 focus:ring-[#72c7b0]/25"
                               placeholder="Example: 4232">
                    </div>

                    @error('municipality_postal_code')
                        <p class="mt-2 text-sm font-semibold text-red-600">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-4">

                    <button type="submit"
                            class="group relative overflow-hidden inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-6 py-3.5 text-white text-sm font-black shadow-[0_14px_35px_rgba(47,143,193,.25)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(47,143,193,.35)]">
                        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                        <span class="relative flex items-center gap-2">
                            <i class="fa-solid fa-save"></i>
                            Update Municipality
                        </span>
                    </button>

                    <a href="{{ route('admin.municipalities.index') }}"
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