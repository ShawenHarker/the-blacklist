<?php
    $studentTeachersTableHeader = [
        'Shools',
        'School Location',
        'School Website',
    ]
?>

<x-app-layout>
    <h1 class="font-semibold text-lg text-gray-800 leading-tight text-center mb-6 w-full">
        {{ $studentTeacher->first_name }} {{ $studentTeacher->last_name }}
    </h1>
    <div class="flex">
    </div>
    <section class="form-body">
        <form action="{{ route('student.update', ['studentTeacher' => $studentTeacher]) }}" method="POST">
            @csrf
            <div class="form-group ml-4">
                <x-input-label for="first_name">First Name</x-input-label>
                <input 
                    class="input w-full"
                    type="text"
                    name="first_name"
                    id="first_name"
                    value="{{ $studentTeacher->first_name }}"
                />
            </div>
            <div class="form-group">
                <x-input-label for="last_name">Last Name</x-input-label>
                <input 
                    class="input w-full"
                    type="text"
                    name="last_name"
                    id="last_name"
                    value="{{ $studentTeacher->last_name }}"
                />
            </div>
            <div class="form-group">
                <x-input-label for="location">Location</x-input-label>
                <input 
                    class="input w-full"
                    type="text"
                    name="location"
                    id="location"
                    value="{{ $studentTeacher->location }}"
                />
            </div>
            <div class="flex justify-end mt-1">
                <x-primary-button>Update Student</x-primary-button>
                <x-secondary-button class="ml-1"><a href="{{ route('blacklist.create') }}">Blacklist</a></x-secondary-button>
                <x-student-delete-modal 
                    :studentTeacher="$studentTeacher"
                    x-show="showModal"
                    x-cloak>
                </x-student-delete-modal>
            </div>
        </form>
    </section>
    <section>
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mt-6 mb-6 w-full">
            All The Schools {{ $studentTeacher->first_name }} {{ $studentTeacher->last_name }} Has Attended
        </h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-8 border-gray-500">
            <x-table-header :header=$studentTeachersTableHeader></x-table-header>
            <tbody class="table-body-styling"> 
                @forelse ($schools as $school)
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
                    </tr>
                    @empty
                    <tr class="table-row">
                        <x-table-column>
                            <p>Not blacklisted yet.</p>
                        </x-table-column>
                    </tr>
                @endforelse
            </tbody>
            <x-table-footer :page="$schools"></x-table-footer>
        </table>
    </section>
</x-app-layout>
