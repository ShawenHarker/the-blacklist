@props(['header'])

<thead class="table-head">
    <tr class="text-center font-bold">
        @foreach ($header as $headerItem)
        <x-table-column>
            {{ $headerItem }}
        </x-table-column>
    @endforeach
    </tr>
</thead>