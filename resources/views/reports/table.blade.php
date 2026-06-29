<div class="overflow-x-auto rounded-[1.3rem] border border-[#d8f0e9] bg-white shadow-sm">
    <table class="w-full text-sm">
        <thead>
            <tr class="bg-[#e8f8f3] text-[#176895]">
                <th class="px-4 py-3 text-left font-black uppercase tracking-wide text-xs">
                    {{ $label }}
                </th>

                <th class="px-4 py-3 text-center font-black uppercase tracking-wide text-xs">
                    Frequency
                </th>

                <th class="px-4 py-3 text-center font-black uppercase tracking-wide text-xs">
                    Percentage
                </th>
            </tr>
        </thead>

        <tbody class="divide-y divide-[#edf7f4]">
            @php
                $totalCount = collect($rows)->sum('count');
            @endphp

            @foreach($rows as $row)
                <tr class="transition hover:bg-[#f3fbf8]">
                    <td class="px-4 py-4">
                        <div class="flex items-center gap-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#2f8fc1]"></span>

                            <span class="font-bold text-[#17364a]">
                                {{ $row['label'] }}
                            </span>
                        </div>
                    </td>

                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex items-center justify-center min-w-10 rounded-xl bg-[#e8f8f3] px-3 py-1.5 text-xs font-black text-[#176895]">
                            {{ $row['count'] }}
                        </span>
                    </td>

                    <td class="px-4 py-4 text-center">
                        <span class="inline-flex items-center justify-center rounded-xl bg-[#fff3dc] px-3 py-1.5 text-xs font-black text-[#f7a832]">
                            {{ $row['percent'] }}
                        </span>
                    </td>
                </tr>
            @endforeach

            <tr class="bg-gradient-to-r from-[#2f8fc1] via-[#72c7b0] to-[#f7a832] text-white">
                <td class="px-4 py-4 font-black uppercase tracking-wide">
                    TOTAL
                </td>

                <td class="px-4 py-4 text-center font-black">
                    {{ $totalCount }}
                </td>

                <td class="px-4 py-4 text-center font-black">
                    {{ $totalCount > 0 ? '100%' : '0%' }}
                </td>
            </tr>
        </tbody>
    </table>
</div>