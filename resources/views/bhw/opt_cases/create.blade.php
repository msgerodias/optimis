@extends('layouts.app')

@section('title', 'Create OPT Case')

@section('content')

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    <div class="xl:col-span-1 bg-white rounded-3xl shadow border border-yellow-100 p-6 h-fit">
        <div class="w-16 h-16 rounded-3xl bg-yellow-100 text-yellow-800 flex items-center justify-center mb-5">
            <i class="fa-solid fa-child-reaching text-2xl"></i>
        </div>

        <h2 class="text-xl font-black text-yellow-800 mb-4">
            {{ $child->full_name }}
        </h2>

        <div class="space-y-4 text-sm">
            <div>
                <p class="text-gray-500">Birthday</p>
                <p class="font-bold text-gray-900">
                    {{ $child->birthday->format('M d, Y') }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Gender</p>
                <p class="font-bold text-gray-900">
                    {{ $child->gender }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Municipality</p>
                <p class="font-bold text-gray-900">
                    {{ $child->municipality->municipality_name ?? 'N/A' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Barangay</p>
                <p class="font-bold text-gray-900">
                    {{ $child->barangay->brgy_name ?? 'N/A' }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Purok</p>
                <p class="font-bold text-gray-900">
                    Purok {{ $child->purok }}
                </p>
            </div>

            <div>
                <p class="text-gray-500">Parent / Guardian</p>
                <p class="font-bold text-gray-900">
                    {{ $child->parent->full_name ?? 'N/A' }}
                </p>
            </div>
        </div>
    </div>

    <form method="POST"
          action="{{ route('bhw.opt-cases.store', $child) }}"
          class="xl:col-span-2 bg-white rounded-3xl shadow border border-yellow-100 p-6">

        @csrf

        <div class="mb-6">
            <h2 class="text-xl font-black text-yellow-800">Create OPT Case</h2>
            <p class="text-sm text-gray-500">
                Encode height, weight, date measured, and nutritional status.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Height
                </label>

                <input type="number"
                       step="0.01"
                       min="1"
                       name="height"
                       value="{{ old('height') }}"
                       required
                       class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none"
                       placeholder="Example: 90.50">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Weight
                </label>

                <input type="number"
                       step="0.01"
                       min="1"
                       name="weight"
                       value="{{ old('weight') }}"
                       required
                       class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none"
                       placeholder="Example: 14.20">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Date Measured
                </label>

                <input type="date"
                       name="date_measured"
                       value="{{ old('date_measured', now()->format('Y-m-d')) }}"
                       required
                       class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
            </div>
        </div>

        <div class="rounded-2xl bg-yellow-50 border border-yellow-100 px-5 py-4 mt-6 mb-6 text-sm text-yellow-800">
            <p class="font-bold mb-1">
                <i class="fa-solid fa-calculator mr-2"></i>
                Age in Months
            </p>

            <p>
                The system will automatically calculate the age in months using the child’s birthday and the selected date measured.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-5">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Weight-for-Age Status
                </label>

                <select name="weight_for_age_status"
                        required
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                    <option value="">Select Status</option>

                    @foreach($weightForAgeStatuses as $status)
                        <option value="{{ $status }}" @selected(old('weight_for_age_status') === $status)>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Height-for-Age Status
                </label>

                <select name="height_for_age_status"
                        required
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                    <option value="">Select Status</option>

                    @foreach($heightForAgeStatuses as $status)
                        <option value="{{ $status }}" @selected(old('height_for_age_status') === $status)>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">
                    Weight-for-Length/Height Status
                </label>

                <select name="weight_for_ltht_status"
                        required
                        class="w-full rounded-2xl border border-gray-200 px-4 py-3 text-sm focus:ring-2 focus:ring-yellow-500 outline-none">
                    <option value="">Select Status</option>

                    @foreach($weightForLengthHeightStatuses as $status)
                        <option value="{{ $status }}" @selected(old('weight_for_ltht_status') === $status)>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row gap-3 pt-6">
            <button type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-2xl bg-yellow-700 px-6 py-3 text-white text-sm font-bold hover:bg-yellow-800">
                <i class="fa-solid fa-save"></i>
                Save OPT Case
            </button>

            <a href="{{ route('bhw.children.show', $child) }}"
               class="inline-flex items-center justify-center gap-2 rounded-2xl bg-gray-100 px-6 py-3 text-gray-700 text-sm font-bold hover:bg-gray-200">
                Cancel
            </a>
        </div>

    </form>

</div>

@endsection