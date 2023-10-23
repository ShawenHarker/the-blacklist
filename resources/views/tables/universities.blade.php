<?php
    $universityTableHeader = [
        'Name',
        'Location',
        'Website',
        'Student Count',
        'Date Created',
        'Date Updated',
        'Actions'
    ]
?>

<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Universities</h2>

    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-8 border-gray-500">
    
        <x-table-header :header=$universityTableHeader />

        <tboby class="table-body-styling">
        @foreach ($universities as $university)
            <tr class="table-row">
                <x-table-column>
                    {{ $university->name }}
                </x-table-column>
                <x-table-column>
                    {{ $university->location }}
                </x-table-column>
                <x-table-column>
                    {{ $university->website }}
                </x-table-column>
                <x-table-column>
                    {{ $university->student_count }}
                </x-table-column>
                <x-table-column>
                    {{ $date = $university->created_at->format('d/m/Y') }}
                </x-table-column>
                <x-table-column>
                    {{ $date = $university->updated_at->format('d/m/Y') }}
                </x-table-column>
                <x-table-column>
                    <x-action-button-table></x-action-button-table>
                </x-table-column>
            </tr>
        @endforeach
        </tboby>
    </table>
</x-app-layout>