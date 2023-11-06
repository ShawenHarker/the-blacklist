<?php
    $studentTeachersTableHeader = [
        'First Name',
        'Last Name',
        'Location',
    ];

    $view = 'dashboard/students/view-student/';
    $edit = 'students/edit-student/';
?>

<x-app-layout>
    <h1 class="font-semibold text-lg text-gray-800 leading-tight text-center mb-6 w-full">
        {{ $school->name }}
    </h1>
    <div class="flex">
        <h2  class="justify-start text-right w-full">
            <a href="{{ route('school.edit', $school->id) }}">
                <i class="fa-solid fa-pencil"></i>
            </a>
        </h2>
    </div>
    <section class="form-body">
        <div class="flex ">
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
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mt-6 mb-6 w-full">
            All Students Blacklisted By The School
        </h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-8 border-gray-500">
            <x-table-header :header=$studentTeachersTableHeader></x-table-header>
            <tbody class="table-body-styling">
                @forelse ($students as $student)
                    <tr class="table-row">
                        <x-table-column>
                            {{ $student->first_name }}
                        </x-table-column>
                        <x-table-column>
                            {{ $student->last_name }}
                        </x-table-column>
                        <x-table-column>
                            {{ $student->location }}
                        </x-table-column>
                    </tr>
                @empty
                    <tr>
                        <x-table-column>
                            <p>No blacklisted students yet.</p>
                        </x-table-column>
                    </tr>
                @endforelse
            </tbody>
            <x-table-footer :page="$students"></x-table-footer>
        </table>
    </section>
</x-app-layout>