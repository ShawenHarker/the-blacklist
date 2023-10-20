@props(['users'])

<tboby class="table-body-styling">
    @foreach ($users as $user)
    <tr class="table-row">
        <x:tables.table-column>
            {{ $user->first_name }}
        </x:tables.table-column>
        <x:tables.table-column>
            {{ $user->last_name}}
        </x:tables.table-column>
        <x:tables.table-column>
            {{ $user->location }}
        </x:tables.table-column>
        <x:tables.table-column>
            University of North Carolina
        </x:tables.table-column>
        <x:tables.table-column>
            No
        </x:tables.table-column>
        <x:tables.table-column>
            {{ $user->created_at }}
        </x:tables.table-column>
        <x:tables.table-column>
            {{ $user->updated_at }}
        </x:tables.table-column>
        <x:tables.table-column>
            <a href="#">Edit</a>
        </x:tables.table-column>
    </tr>
    @endforeach
</tboby>