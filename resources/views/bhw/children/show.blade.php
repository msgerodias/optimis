@extends('layouts.app')

@section('title', 'Child Profile')

@section('content')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-6">

    <div class="xl:col-span-2 bg-white rounded-3xl shadow border border-yellow-100 p-6">
        <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl font-black text-yellow-800">
                    {{ $child->full_name }}
                </h2>

                <p class="text-sm text-gray-500">
                    Child ID: {{ $child->child_id }}
                </p>
            </div>

            <div class="flex flex-wrap gap-2">
                <a href="{{ route('bhw.children.edit', $child) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-blue-600 px-4 py-3 text-white text-sm font-bold hover:bg-blue-700">
                    <i class="fa-solid fa-pen-to-square"></i>
                    Edit
                </a>

                <a href="{{ route('bhw.opt-cases.create', $child) }}"
                   class="inline-flex items-center gap-2 rounded-2xl bg-yellow-700 px-4 py-3 text-white text-sm font-bold hover:bg-yellow-800">
                    <i class="fa-solid fa-plus"></i>
                    Add OPT
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 text-sm">
            <div class="rounded-2xl bg-yellow-50 border border-yellow-100 p-5">
                <p class="text-gray-500 mb-1">Gender</p>
                <p class="font-black text-gray-900">{{ $child->gender }}</p>
            </div>

            <div class="rounded-2xl bg-yellow-50 border border-yellow-100 p-5">
                <p class="text-gray-500 mb-1">Birthday</p>
                <p class="font-black text-gray-900">
                    {{ $child->birthday->format('M d, Y') }}
                </p>
            </div>

            <div class="rounded-2xl bg-yellow-50 border border-yellow-100 p-5">
                <p class="text-gray-500 mb-1">Belongs to IP Group</p>
                <p class="font-black text-gray-900">
                    {{ strtoupper($child->belongs_to_ip_group) }}
                </p>
            </div>

            <div class="rounded-2xl bg-yellow-50 border border-yellow-100 p-5">
                <p class="text-gray-500 mb-1">Purok</p>
                <p class="font-black text-gray-900">
                    Purok {{ $child->purok }}
                </p>
            </div>

            <div class="rounded-2xl bg-yellow-50 border border-yellow-100 p-5">
                <p class="text-gray-500 mb-1">Municipality</p>
                <p class="font-black text-gray-900">
                    {{ $child->municipality->municipality_name ?? 'N/A' }}
                </p>
            </div>

            <div class="rounded-2xl bg-yellow-50 border border-yellow-100 p-5">
                <p class="text-gray-500 mb-1">Barangay</p>
                <p class="font-black text-gray-900">
                    {{ $child->barangay->brgy_name ?? 'N/A' }}
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">
        <div class="w-16 h-16 rounded-3xl bg-yellow-100 text-yellow-800 flex items-center justify-center mb-5">
            <i class="fa-solid fa-users text-2xl"></i>
        </div>

        <h3 class="text-xl font-black text-yellow-800 mb-4">
            Parent / Guardian
        </h3>

        <div class="space-y-4 text-sm">
            <div>
                <p class="text-gray-500">Name</p>
                <p class="font-bold text-gray-900">
                    {{ $child->parent->full_name ?? 'N/A' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Contact No.</p>
                <p class="font-bold text-gray-900">
                    {{ $child->parent->contact_no ?? 'N/A' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Email Address</p>
                <p class="font-bold text-gray-900 break-all">
                    {{ $child->parent->email_address ?? 'N/A' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Authorized Guardian</p>
                <p class="font-bold text-gray-900">
                    {{ $child->parent->authorized_guardian ?? 'N/A' }}
                </p>
            </div>
        </div>
    </div>

</div>

<div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h3 class="text-xl font-black text-yellow-800">OPT Case History</h3>
            <p class="text-sm text-gray-500">
                All recorded Operation Timbang cases for this child.
            </p>
        </div>

        <a href="{{ route('bhw.opt-cases.create', $child) }}"
           class="inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-5 py-3 text-white text-sm font-bold hover:bg-yellow-800">
            <i class="fa-solid fa-plus"></i>
            Add OPT Case
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-yellow-100 text-yellow-900">
                    <th class="px-4 py-3 text-left rounded-l-xl">Date Measured</th>
                    <th class="px-4 py-3 text-center">Age</th>
                    <th class="px-4 py-3 text-center">Height</th>
                    <th class="px-4 py-3 text-center">Weight</th>
                    <th class="px-4 py-3 text-left">Weight-for-Age</th>
                    <th class="px-4 py-3 text-left">Height-for-Age</th>
                    <th class="px-4 py-3 text-left rounded-r-xl">Weight-for-L/H</th>
                </tr>
            </thead>

            <tbody>
                @forelse($child->optCases as $case)
                    <tr class="border-b border-gray-100">
                        <td class="px-4 py-4 font-bold">
                            {{ $case->date_measured->format('M d, Y') }}
                        </td>

                        <td class="px-4 py-4 text-center">
                            {{ $case->age_in_months }} months
                        </td>

                        <td class="px-4 py-4 text-center">
                            {{ $case->height }}
                        </td>

                        <td class="px-4 py-4 text-center">
                            {{ $case->weight }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $case->weight_for_age_status }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $case->height_for_age_status }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $case->weight_for_ltht_status }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                            No OPT cases recorded yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>

@endsection