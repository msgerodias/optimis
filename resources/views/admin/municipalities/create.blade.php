@extends('layouts.app')

@section('title', 'Add Municipality')

@section('content')

<div class="max-w-3xl bg-white rounded-3xl shadow border border-yellow-100 p-6">

    <div class="mb-6">
        <h2 class="text-xl font-black text-yellow-800">Add Municipality</h2>
        <p class="text-sm text-gray-500">Create a new municipality record.</p>
    </div>

    <form method="POST" action="{{ route('admin.municipalities.store') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">
                Municipality Name
            </label>

            <input type="text"
                   name="municipality_name"
                   value="{{ old('municipality_name') }}"
                   required
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none"
                   placeholder="Example: Tanauan City">
        </div>

        <div>
            <label class="block text-sm font-bold text-gray-700 mb-2">
                Postal Code
            </label>

            <input type="text"
                   name="municipality_postal_code"
                   value="{{ old('municipality_postal_code') }}"
                   class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none"
                   placeholder="Example: 4232">
        </div>

        <div class="flex flex-col sm:flex-row gap-3 pt-3">
            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-6 py-3 text-white text-sm font-bold hover:bg-yellow-800">
                <i class="fa-solid fa-save"></i>
                Save Municipality
            </button>

            <a href="{{ route('admin.municipalities.index') }}"
               class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gray-100 px-6 py-3 text-gray-700 text-sm font-bold hover:bg-gray-200">
                Cancel
            </a>
        </div>
    </form>

</div>

@endsection