<?php
    $studentTeachersTableHeader = [
        'First Name',
        'Last Name',
        'Location',
        'School',
        'Date Created',
        'Date Updated',
        'Actions'
    ];

    $url = 'students/add-new-student';
    $view = 'dashboard/students/view-student/';
    $edit = 'dashboard/students/edit-student/';
?>

<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Active Students</h2>
    <x-search-add :url="$url"/>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-8 border-gray-500">
        <x-table-header :header=$studentTeachersTableHeader ></x-table-header>
        <tboby class="table-body-styling">
            @foreach ($studentTeachers as $student)
                @if ($student->is_blacklisted === 0 && $student->role_id !== 2)
                    <tr class="table-row">
                        <x-table-column>
                            {{ $student->first_name }}
                        </x-table-column>
                        <x-table-column>
                            {{ $student->last_name}}
                        </x-table-column>
                        <x-table-column>
                            {{ $student->location }}
                        </x-table-column>
                        <x-table-column>
                            {{ $student->school->name }}
                        </x-table-column>
                        <x-table-column>
                            {{ $date = $student->created_at->format('d/m/Y') }}
                        </x-table-column>
                        <x-table-column>
                            {{ $date = $student->updated_at->format('d/m/Y') }}
                        </x-table-column>
                        <x-table-column>
                            <x-action-button-table
                            :viewRoute="$view . $student->id"
                            :updateRoute="$edit . $student->id"
                        ></x-action-button-table>
                        </x-table-column>
                    </tr>
                @endif
            @endforeach
        </tboby>
        <x-table-footer :page=$studentTeachers ></x-table-footer>
    </table>
</x-app-layout>