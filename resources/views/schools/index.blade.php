<?php
    $schoolsTableHeader = [
        'Name',
        'Location',
        'Website',
        'Date Created',
        'Date Updated',
        'Actions'
    ];

    $url = 'schools/add-new-school';
    $view = 'schools/view-school/';
    $edit = 'schools/edit-school/';
?>

<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Schools</h2>
    <x-search-add :url="$url"/>
    <table class="table">
        <x-table-header :header=$schoolsTableHeader ></x-table-header>
        <tboby class="table-body-styling">
            @foreach ($schools as $school)
                <tr class="table-row">
                    <x-table-column>
                        {{ $school->name }}
                    </x-table-column>
                    <x-table-column>
                        {{ $school->location }}
                    </x-table-column>
                    <x-table-column>
                        {{ $school->website }}
                    </x-table-column>
                    <x-table-column>
                        {{ $date = $school->created_at->format('d/m/Y') }}
                    </x-table-column>
                    <x-table-column>
                        {{ $date = $school->updated_at->format('d/m/Y') }}
                    </x-table-column>
                    <x-table-column>
                        <x-action-button-table
                                :viewRoute="$view . $school->id"
                                :updateRoute="$edit . $school->id"
                            ></x-action-button-table>
                    </x-table-column>
                </tr>
            @endforeach
        </tboby>
        <x-table-footer :page=$schools ></x-table-footer>
    </table>
</x-app-layout>
