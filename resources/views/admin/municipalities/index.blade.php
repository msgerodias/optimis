@extends('layouts.app')

@section('title', 'Municipalities')

@section('content')

<div class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

    {{-- Decorative Background --}}
    <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
    <div class="absolute -bottom-28 -left-28 w-80 h-80 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
    <div class="absolute top-1/2 right-20 w-32 h-32 rounded-full bg-[#f7a832]/10 blur-2xl"></div>

    <div class="relative z-10">

        {{-- Header --}}
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-7">
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                    <i class="fa-solid fa-map-location-dot text-2xl"></i>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                        <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                        Municipality Records
                    </div>

                    <h2 class="mt-3 text-2xl font-black text-[#17364a]">
                        Municipality Records
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Manage municipalities covered by OPTIMIS.
                    </p>
                </div>
            </div>

            <a href="{{ route('admin.municipalities.create') }}"
               class="group relative overflow-hidden inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-5 py-3 text-white text-sm font-black shadow-[0_14px_35px_rgba(47,143,193,.25)] transition duration-300 hover:-translate-y-1 hover:shadow-[0_18px_45px_rgba(47,143,193,.35)]">
                <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                <span class="relative flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    Add Municipality
                </span>
            </a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto rounded-[1.5rem] border border-[#d8f0e9] bg-white shadow-sm">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[#e8f8f3] text-[#176895]">
                        <th class="px-5 py-4 text-left font-black uppercase tracking-wide text-xs">ID</th>
                        <th class="px-5 py-4 text-left font-black uppercase tracking-wide text-xs">Municipality Name</th>
                        <th class="px-5 py-4 text-left font-black uppercase tracking-wide text-xs">Postal Code</th>
                        <th class="px-5 py-4 text-right font-black uppercase tracking-wide text-xs">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[#edf7f4]">
                    @forelse($municipalities as $municipality)
                        <tr class="transition hover:bg-[#f3fbf8]">
                            <td class="px-5 py-4">
                                <span class="inline-flex items-center justify-center min-w-10 rounded-xl bg-[#e8f8f3] px-3 py-1 text-xs font-black text-[#176895]">
                                    {{ $municipality->municipality_id }}
                                </span>
                            </td>

                            <td class="px-5 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                                        <i class="fa-solid fa-city"></i>
                                    </div>

                                    <div>
                                        <p class="font-black text-[#17364a]">
                                            {{ $municipality->municipality_name }}
                                        </p>
                                        <p class="text-xs text-gray-400">
                                            Municipality
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <td class="px-5 py-4">
                                @if($municipality->municipality_postal_code)
                                    <span class="inline-flex items-center gap-2 rounded-xl bg-[#fff3dc] px-3 py-1.5 text-xs font-black text-[#f7a832]">
                                        <i class="fa-solid fa-envelope-open-text"></i>
                                        {{ $municipality->municipality_postal_code }}
                                    </span>
                                @else
                                    <span class="text-gray-400 font-semibold">N/A</span>
                                @endif
                            </td>

                            <td class="px-5 py-4 text-right">
                                <div class="inline-flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.municipalities.edit', $municipality) }}"
                                       class="inline-flex items-center gap-1.5 rounded-xl bg-[#e8f8f3] px-3 py-2 text-xs font-black text-[#176895] transition hover:bg-[#d8f0e9]">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                        Edit
                                    </a>

                                    <form method="POST"
                                          action="{{ route('admin.municipalities.destroy', $municipality) }}"
                                          class="inline-block">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                onclick="return confirm('Delete this municipality?')"
                                                class="inline-flex items-center gap-1.5 rounded-xl bg-red-50 px-3 py-2 text-xs font-black text-red-600 transition hover:bg-red-100 hover:text-red-700">
                                            <i class="fa-solid fa-trash"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-5 py-12 text-center">
                                <div class="mx-auto mb-4 w-16 h-16 rounded-3xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                                    <i class="fa-solid fa-map-location-dot text-2xl"></i>
                                </div>

                                <h3 class="font-black text-[#17364a]">
                                    No municipalities found
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Start by adding your first municipality record.
                                </p>

                                <a href="{{ route('admin.municipalities.create') }}"
                                   class="mt-5 inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-5 py-3 text-white text-sm font-black shadow transition hover:-translate-y-1">
                                    <i class="fa-solid fa-plus"></i>
                                    Add Municipality
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $municipalities->links() }}
        </div>

    </div>

</div>

@endsection