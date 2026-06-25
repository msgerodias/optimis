<div class="overflow-x-auto">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-yellow-100 text-yellow-900">
                <th class="px-4 py-3 text-left rounded-l-xl">
                    {{ $label }}
                </th>
                <th class="px-4 py-3 text-center">
                    Frequency
                </th>
                <th class="px-4 py-3 text-center rounded-r-xl">
                    Percentage
                </th>
            </tr>
        </thead>

        <tbody>
            @php
                $totalCount = collect($rows)->sum('count');
            @endphp

            @foreach($rows as $row)
                <tr class="border-b border-gray-100">
                    <td class="px-4 py-4">
                        {{ $row['label'] }}
                    </td>

                    <td class="px-4 py-4 text-center font-bold">
                        {{ $row['count'] }}
                    </td>

                    <td class="px-4 py-4 text-center">
                        {{ $row['percent'] }}
                    </td>
                </tr>
            @endforeach

            <tr class="bg-yellow-50 font-black text-yellow-900">
                <td class="px-4 py-4">
                    TOTAL
                </td>

                <td class="px-4 py-4 text-center">
                    {{ $totalCount }}
                </td>

                <td class="px-4 py-4 text-center">
                    {{ $totalCount > 0 ? '100%' : '0%' }}
                </td>
            </tr>
        </tbody>
    </table>
</div>