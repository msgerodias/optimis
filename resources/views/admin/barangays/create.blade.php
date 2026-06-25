@extends('layouts.app')

@section('title', 'Add Barangay')

@section('content')

<div class="max-w-3xl bg-white rounded-3xl shadow border border-yellow-100 p-6">

    <div class="mb-6">
        <h2 class="text-xl font-black text-yellow-800">Add Barangay</h2>
        <p class="text-sm text-gray-500">Create a barangay record under a municipality.</p>
    </div>

    <form method="POST" action="{{ route('admin.barangays.store') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">
                Barangay Name
            </label>

            <input type="text"
                   name="brgy_name"
                   value="{{ old('brgy_name') }}"
                   required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none"
                   placeholder="Example: Barangay 1">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">
                Municipality
            </label>

            <select name="brgy_municipality"
                    required
                    class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                <option value="">Select Municipality</option>

                @foreach($municipalities as $municipality)
                    <option value="{{ $municipality->municipality_id }}"
                        @selected(old('brgy_municipality') == $municipality->municipality_id)>
                        {{ $municipality->municipality_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">
                Purok Count
            </label>

            <input type="number"
                   name="brgy_purok_count"
                   value="{{ old('brgy_purok_count', 1) }}"
                   min="1"
                   required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none"
                   placeholder="Example: 7">
        </div>

        <div class="flex flex-col sm:flex-row gap-3 pt-3">
            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-6 py-3 text-white text-sm font-bold hover:bg-yellow-800">
                <i class="fa-solid fa-save"></i>
                Save Barangay
            </button>

            <a href="{{ route('admin.barangays.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gray-100 px-6 py-3 text-gray-700 text-sm font-bold hover:bg-gray-200">
                Cancel
            </a>
        </div>
    </form>

</div>

@endsection