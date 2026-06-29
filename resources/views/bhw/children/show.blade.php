@extends('layouts.app')

@section('title', 'Child Profile')

@section('content')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

    {{-- Child Profile --}}
    <div class="xl:col-span-2 relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

        {{-- Decorative Background --}}
        <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
        <div class="absolute -bottom-28 -left-28 w-80 h-80 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
        <div class="absolute top-1/2 right-20 w-32 h-32 rounded-full bg-[#f7a832]/10 blur-2xl"></div>

        <div class="relative z-10">

            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-7">
                <div class="flex items-start gap-4">
                    <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-child-reaching text-2xl"></i>
                    </div>

                    <div>
                        <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                            <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                            Child OPT Profile
                        </div>

                        <h2 class="mt-3 text-2xl sm:text-3xl font-black text-[#17364a]">
                            {{ $child->full_name }}
                        </h2>

                        <p class="text-sm text-gray-500 mt-1">
                            Child ID:
                            <span class="font-black text-[#2f8fc1]">
                                {{ $child->child_id }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('bhw.children.edit', $child) }}"
                       class="inline-flex items-center gap-2 rounded-2xl bg-blue-50 px-4 py-3 text-blue-600 text-sm font-black transition hover:bg-blue-100 hover:text-blue-700">
                        <i class="fa-solid fa-pen-to-square"></i>
                        Edit
                    </a>

                    <a href="{{ route('bhw.opt-cases.create', $child) }}"
                       class="group relative overflow-hidden inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-4 py-3 text-white text-sm font-black shadow-[0_14px_35px_rgba(47,143,193,.25)] transition duration-300 hover:-translate-y-1">
                        <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                        <span class="relative flex items-center gap-2">
                            <i class="fa-solid fa-plus"></i>
                            Add OPT
                        </span>
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                            <i class="fa-solid fa-venus-mars"></i>
                        </div>

                        <div>
                            <p class="text-gray-500 mb-1">Gender</p>
                            <p class="font-black text-[#17364a]">
                                {{ $child->gender }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                            <i class="fa-solid fa-cake-candles"></i>
                        </div>

                        <div>
                            <p class="text-gray-500 mb-1">Birthday</p>
                            <p class="font-black text-[#17364a]">
                                {{ $child->birthday->format('M d, Y') }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl bg-[#fff3dc] border border-[#ffe1a6] p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-white text-[#f7a832] flex items-center justify-center">
                            <i class="fa-solid fa-users"></i>
                        </div>

                        <div>
                            <p class="text-gray-500 mb-1">Belongs to IP Group</p>
                            <p class="font-black text-[#f7a832]">
                                {{ strtoupper($child->belongs_to_ip_group) }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl bg-[#fff3dc] border border-[#ffe1a6] p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-white text-[#f7a832] flex items-center justify-center">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>

                        <div>
                            <p class="text-gray-500 mb-1">Purok</p>
                            <p class="font-black text-[#f7a832]">
                                Purok {{ $child->purok }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                            <i class="fa-solid fa-map-location-dot"></i>
                        </div>

                        <div>
                            <p class="text-gray-500 mb-1">Municipality</p>
                            <p class="font-black text-[#17364a]">
                                {{ $child->municipality->municipality_name ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-5">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-2xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                            <i class="fa-solid fa-house-flag"></i>
                        </div>

                        <div>
                            <p class="text-gray-500 mb-1">Barangay</p>
                            <p class="font-black text-[#17364a]">
                                {{ $child->barangay->brgy_name ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    {{-- Parent / Guardian --}}
    <div class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

        <div class="absolute -top-20 -right-20 w-60 h-60 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>
        <div class="absolute -bottom-20 -left-20 w-60 h-60 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>

        <div class="relative z-10">

            <div class="w-16 h-16 rounded-3xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center mb-5 shadow-lg">
                <i class="fa-solid fa-users text-2xl"></i>
            </div>

            <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                Guardian Details
            </div>

            <h3 class="mt-3 text-xl font-black text-[#17364a] mb-5">
                Parent / Guardian
            </h3>

            <div class="space-y-4 text-sm">
                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-4">
                    <p class="text-gray-500">Name</p>
                    <p class="font-black text-[#17364a] mt-1">
                        {{ $child->parent->full_name ?? 'N/A' }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-4">
                    <p class="text-gray-500">Contact No.</p>
                    <p class="font-black text-[#17364a] mt-1">
                        {{ $child->parent->contact_no ?? 'N/A' }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#fff3dc] border border-[#ffe1a6] p-4">
                    <p class="text-gray-500">Email Address</p>
                    <p class="font-black text-[#f7a832] mt-1 break-all">
                        {{ $child->parent->email_address ?? 'N/A' }}
                    </p>
                </div>

                <div class="rounded-2xl bg-[#f3fbf8] border border-[#d8f0e9] p-4">
                    <p class="text-gray-500">Authorized Guardian</p>
                    <p class="font-black text-[#17364a] mt-1">
                        {{ $child->parent->authorized_guardian ?? 'N/A' }}
                    </p>
                </div>
            </div>

        </div>
    </div>

</div>

{{-- OPT Case History --}}
<div class="relative overflow-hidden rounded-[2rem] bg-white/90 backdrop-blur-xl border border-[#d8f0e9] shadow-[0_20px_60px_rgba(47,143,193,.12)] p-6 sm:p-8">

    {{-- Decorative Background --}}
    <div class="absolute -top-24 -right-24 w-72 h-72 rounded-full bg-[#72c7b0]/20 blur-3xl"></div>
    <div class="absolute -bottom-28 -left-28 w-80 h-80 rounded-full bg-[#2f8fc1]/10 blur-3xl"></div>

    <div class="relative z-10">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-7">
            <div class="flex items-start gap-4">
                <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white flex items-center justify-center shadow-lg">
                    <i class="fa-solid fa-chart-line text-2xl"></i>
                </div>

                <div>
                    <div class="inline-flex items-center gap-2 rounded-full bg-[#e8f8f3] px-3 py-1 text-[11px] font-black uppercase tracking-[.16em] text-[#176895]">
                        <span class="w-2 h-2 rounded-full bg-[#f7a832]"></span>
                        Tracking Growth, Saving Lives
                    </div>

                    <h3 class="mt-3 text-2xl font-black text-[#17364a]">
                        OPT Case History
                    </h3>

                    <p class="text-sm text-gray-500 mt-1">
                        All recorded Operation Timbang cases for this child.
                    </p>
                </div>
            </div>

            <a href="{{ route('bhw.opt-cases.create', $child) }}"
               class="group relative overflow-hidden inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-5 py-3 text-white text-sm font-black shadow-[0_14px_35px_rgba(47,143,193,.25)] transition duration-300 hover:-translate-y-1">
                <span class="absolute inset-0 bg-gradient-to-r from-transparent via-white/25 to-transparent translate-x-[-100%] transition duration-700 group-hover:translate-x-[100%]"></span>

                <span class="relative flex items-center gap-2">
                    <i class="fa-solid fa-plus"></i>
                    Add OPT Case
                </span>
            </a>
        </div>

        <div class="overflow-x-auto rounded-[1.5rem] border border-[#d8f0e9] bg-white shadow-sm">
            <table class="w-full text-sm">
                <thead>
                    <tr class="bg-[#e8f8f3] text-[#176895]">
                        <th class="px-5 py-4 text-left font-black uppercase tracking-wide text-xs">Date Measured</th>
                        <th class="px-5 py-4 text-center font-black uppercase tracking-wide text-xs">Age</th>
                        <th class="px-5 py-4 text-center font-black uppercase tracking-wide text-xs">Height</th>
                        <th class="px-5 py-4 text-center font-black uppercase tracking-wide text-xs">Weight</th>
                        <th class="px-5 py-4 text-left font-black uppercase tracking-wide text-xs">Weight-for-Age</th>
                        <th class="px-5 py-4 text-left font-black uppercase tracking-wide text-xs">Height-for-Age</th>
                        <th class="px-5 py-4 text-left font-black uppercase tracking-wide text-xs">Weight-for-L/H</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-[#edf7f4]">
                    @forelse($child->optCases as $case)
                        <tr class="transition hover:bg-[#f3fbf8]">
                            <td class="px-5 py-4">
                                <span class="font-black text-[#17364a]">
                                    {{ $case->date_measured->format('M d, Y') }}
                                </span>
                            </td>

                            <td class="px-5 py-4 text-center">
                                <span class="inline-flex items-center justify-center rounded-xl bg-[#e8f8f3] px-3 py-1.5 text-xs font-black text-[#176895]">
                                    {{ $case->age_in_months }} months
                                </span>
                            </td>

                            <td class="px-5 py-4 text-center">
                                <span class="font-bold text-[#17364a]">
                                    {{ $case->height }}
                                </span>
                            </td>

                            <td class="px-5 py-4 text-center">
                                <span class="font-bold text-[#17364a]">
                                    {{ $case->weight }}
                                </span>
                            </td>

                            <td class="px-5 py-4">
                                <span class="inline-flex items-center rounded-xl bg-[#f3fbf8] border border-[#d8f0e9] px-3 py-1.5 text-xs font-bold text-[#17364a]">
                                    {{ $case->weight_for_age_status }}
                                </span>
                            </td>

                            <td class="px-5 py-4">
                                <span class="inline-flex items-center rounded-xl bg-[#f3fbf8] border border-[#d8f0e9] px-3 py-1.5 text-xs font-bold text-[#17364a]">
                                    {{ $case->height_for_age_status }}
                                </span>
                            </td>

                            <td class="px-5 py-4">
                                <span class="inline-flex items-center rounded-xl bg-[#fff3dc] px-3 py-1.5 text-xs font-black text-[#f7a832]">
                                    {{ $case->weight_for_ltht_status }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center">
                                <div class="mx-auto mb-4 w-16 h-16 rounded-3xl bg-[#e8f8f3] text-[#2f8fc1] flex items-center justify-center">
                                    <i class="fa-solid fa-file-circle-exclamation text-2xl"></i>
                                </div>

                                <h3 class="font-black text-[#17364a]">
                                    No OPT cases recorded yet
                                </h3>

                                <p class="text-sm text-gray-500 mt-1">
                                    Add the first OPT case to begin monitoring this child’s growth record.
                                </p>

                                <a href="{{ route('bhw.opt-cases.create', $child) }}"
                                   class="mt-5 inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] px-5 py-3 text-white text-sm font-black shadow transition hover:-translate-y-1">
                                    <i class="fa-solid fa-plus"></i>
                                    Add OPT Case
                                </a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection