@extends('layouts.app')

@section('title', 'Children Records')

@section('content')

<div class="bg-white rounded-3xl shadow border border-yellow-100 p-6">

    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-xl font-black text-yellow-800">Registered Children</h2>
            <p class="text-sm text-gray-500">Manage child records and OPT monitoring cases.</p>
        </div>

        <a href="{{ route('bhw.children.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-5 py-3 text-white text-sm font-bold hover:bg-yellow-800">
            <i class="fa-solid fa-plus"></i>
            Register Child
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="bg-yellow-100 text-yellow-900">
                    <th class="px-4 py-3 text-left rounded-l-xl">Child</th>
                    <th class="px-4 py-3 text-left">Gender</th>
                    <th class="px-4 py-3 text-left">Birthday</th>
                    <th class="px-4 py-3 text-left">Barangay</th>
                    <th class="px-4 py-3 text-left">Parent</th>
                    <th class="px-4 py-3 text-right rounded-r-xl">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($children as $child)
                    <tr class="border-b border-gray-100">
                        <td class="px-4 py-4">
                            <div class="font-bold text-gray-900">
                                {{ $child->full_name }}
                            </div>
                            <div class="text-xs text-gray-500">
                                Child ID: {{ $child->child_id }}
                            </div>
                        </td>

                        <td class="px-4 py-4">
                            {{ $child->gender }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $child->birthday->format('M d, Y') }}
                        </td>

                        <td class="px-4 py-4">
                            {{ $child->barangay->brgy_name ?? 'N/A' }}
                            <div class="text-xs text-gray-500">
                                Purok {{ $child->purok }}
                            </div>
                        </td>

                        <td class="px-4 py-4">
                            {{ $child->parent->full_name ?? 'N/A' }}
                        </td>

                        <td class="px-4 py-4 text-right">
                            <a href="{{ route('bhw.children.show', $child) }}"
                               class="inline-flex items-center gap-1 text-yellow-700 font-bold hover:text-yellow-900">
                                <i class="fa-solid fa-eye"></i>
                                View
                            </a>

                            <a href="{{ route('bhw.children.edit', $child) }}"
                               class="inline-flex items-center gap-1 text-blue-600 font-bold hover:text-blue-800 ml-3">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </a>

                            <form method="POST"
                                  action="{{ route('bhw.children.destroy', $child) }}"
                                  class="inline-block ml-3">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Delete this child record and parent account?')"
                                        class="inline-flex items-center gap-1 text-red-600 font-bold hover:text-red-800">
                                    <i class="fa-solid fa-trash"></i>
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-gray-500">
                            No child records found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $children->links() }}
    </div>

</div>

@endsection