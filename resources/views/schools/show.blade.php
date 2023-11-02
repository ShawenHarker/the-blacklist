<?php
    $studentTeachersTableHeader = [
        'First Name',
        'Last Name',
        'Location',
        'School',
        'Blacklisted',
        'Date Created',
        'Date Updated',
        'Actions'
    ];

    $view = 'dashboard/students/view-student/';
    $edit = 'dashboard/students/edit-student/';
?>

<x-app-layout>
    <h1 class="font-semibold text-lg text-gray-800 leading-tight text-center mb-6 w-full">
        View School Details
    </h1>
    <div class="flex">
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-right mb-6 w-full">
            General Information
        </h2>
        <h2  class="justify-start text-right w-full">
            <a href="{{ route('school.edit', $school->id) }}">
                <i class="fa-solid fa-pencil"></i>
            </a>
        </h2>
    </div>
    <section class="form-body">
        <div class="flex ">
            <div class="form-group">
                <x-input-label for="name">Name</x-input-label>
                <input
                    class="input text-gray-500"
                    type="text"
                    name="name"
                    id="name"
                    value="{{ $school->name }}"
                    disabled
                />
            </div>
            <div class="form-group">
                <x-input-label for="location">Location</x-input-label>
                <input 
                    class="input text-gray-500"
                    type="text"
                    name="location"
                    id="location"
                    value="{{ $school->location }}"
                    disabled
                />
            </div>
            <div class="form-group">
                <x-input-label for="website">Website</x-input-label>
                <input 
                    class="input text-gray-500"
                    type="text"
                    name="website"
                    id="website"
                    value="{{ $school->website }}"
                    disabled
                />
            </div>
        </div>
    </section>
    <section>
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6 w-full">
            All Students Registered To The School
        </h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-8 border-gray-500">
            <x-table-header :header=$studentTeachersTableHeader></x-table-header>
            <tboby class="table-body-styling">
                @foreach ($studentTeachers as $student)
                    @if ($student->school_id == $school->id)
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
                            @if ($student->is_blacklisted === 1)
                                Yes
                            @else
                                No
                            @endif
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
    </section>
</x-app-layout>