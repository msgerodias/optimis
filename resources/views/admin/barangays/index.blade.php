@extends('layouts.app')

@section('title', 'Barangays')

@section('content')

<div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-black text-yellow-800">Barangay Records</h2>
            <p class="text-sm text-gray-500">Manage barangays and purok count.</p>
        </div>

        <a href="{{ route('admin.barangays.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-5 py-3 text-white text-sm font-bold hover:bg-yellow-800">
            <i class="fa-solid fa-plus"></i>
            Add Barangay
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-yellow-100 text-yellow-900">
                    <th class="px-4 py-3 text-left rounded-l-xl">ID</th>
                    <th class="px-4 py-3 text-left">Barangay</th>
                    <th class="px-4 py-3 text-left">Municipality</th>
                    <th class="px-4 py-3 text-center">Purok Count</th>
                    <th class="px-4 py-3 text-right rounded-r-xl">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($barangays as $barangay)
                    <tr class="border-b border-gray-100">
                        <td class="px-4 py-4 font-bold text-gray-700">
                            {{ $barangay->brgy_id }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $barangay->brgy_name }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $barangay->municipality->municipality_name ?? 'N/A' }}
                        </td>

                        <td class="px-4 py-4 text-center">
                            <span class="inline-flex items-center justify-center rounded-full bg-yellow-100 px-3 py-1 text-yellow-800 font-bold">
                                {{ $barangay->brgy_purok_count }}
                            </span>
                        </td>

                        <td class="px-4 py-4 text-right">
                            <a href="{{ route('admin.barangays.edit', $barangay) }}"
                               class="inline-flex items-center gap-1 text-yellow-700 font-bold hover:text-yellow-900">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('admin.barangays.destroy', $barangay) }}"
                                  class="inline-block ml-3">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Delete this barangay?')"
                                        class="inline-flex items-center gap-1 text-red-600 font-bold hover:text-red-800">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-8 text-center text-gray-500">
                            No barangays found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $barangays->links() }}
    </div>

</div>

@endsection