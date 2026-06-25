@extends('layouts.app')

@section('title', 'Barangay Health Workers')

@section('content')

<div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-black text-yellow-800">BHW Accounts</h2>
            <p class="text-sm text-gray-500">Manage Barangay Health Worker profiles and system accounts.</p>
        </div>

        <a href="{{ route('admin.bhws.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-5 py-3 text-white text-sm font-bold hover:bg-yellow-800">
            <i class="fa-solid fa-plus"></i>
            Add BHW
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-yellow-100 text-yellow-900">
                    <th class="px-4 py-3 text-left rounded-l-xl">Name</th>
                    <th class="px-4 py-3 text-left">Gender</th>
                    <th class="px-4 py-3 text-left">Contact No.</th>
                    <th class="px-4 py-3 text-left">Email Address</th>
                    <th class="px-4 py-3 text-right rounded-r-xl">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($bhws as $bhw)
                    <tr class="border-b border-gray-100">
                        <td class="px-4 py-4">
                            <div class="font-bold text-gray-900">
                                {{ $bhw->full_name }}
                            </div>

                            <div class="text-xs text-gray-500">
                                BHW ID: {{ $bhw->bhw_id }}
                            </div>
                        </td>

                        <td class="px-4 py-4">
                            {{ $bhw->gender }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $bhw->contact_no ?? 'N/A' }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $bhw->email_address }}
                        </td>

                        <td class="px-4 py-4 text-right">
                            <a href="{{ route('admin.bhws.edit', $bhw) }}"
                               class="inline-flex items-center gap-1 text-yellow-700 font-bold hover:text-yellow-900">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('admin.bhws.destroy', $bhw) }}"
                                  class="inline-block ml-3">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Delete this BHW and its user account?')"
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
                            No BHW accounts found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $bhws->links() }}
    </div>

</div>

@endsection