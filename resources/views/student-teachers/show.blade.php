<?php
    $studentTeachersTableHeader = [
        'Shools',
        'School Location',
        'School Website',
        'Actions'
    ]
?>

<x-app-layout>
    <h1 class="font-semibold text-lg text-gray-800 leading-tight text-center mb-6 w-full">
        {{ $studentTeacher->first_name }} {{ $studentTeacher->last_name }}
    </h1>
    <div class="flex">
        <h2  class="justify-start text-right w-full">
            <a href="{{ route('student.edit', $studentTeacher->id) }}">
                <i class="fa-solid fa-pencil"></i>
            </a>
        </h2>
    </div>
    <section class="form-body">
        <div class="flex ">
        </div>
        <div class="form-group">
            <x-input-label for="location">Location</x-input-label>
            <input 
                class="input text-gray-500 w-full"
                type="text"
                name="location"
                id="location"
                value="{{ $studentTeacher->location }}"
                disabled
            />
        </div>
    </section>
    <section>
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6 w-full">
            All The Schools {{ $studentTeacher->first_name }} {{ $studentTeacher->last_name }} Has Attended
        </h2>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-8 border-gray-500">
            <x-table-header :header=$studentTeachersTableHeader></x-table-header>
            <tbody class="table-body-styling">
                @forelse ($schools as $school)
                    <tr class="table-row" id="row_{{ $school->id }}">
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
                            <button class="expand-button" data-school-id="{{ $school->id }}">
                                <i class="fa-solid fa-caret-down"></i>
                            </button>
                        </x-table-column>
                    </tr>
                    <x-blacklist-reason
                        :blacklisting=$blacklisting
                        :id="$school->id"
                    />
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const expandButtons = document.querySelectorAll(".expand-button");

        expandButtons.forEach((button) => {
            button.addEventListener("click", function () {
                const schoolId = this.getAttribute("data-school-id");
                const row = document.getElementById(`row_${schoolId}`);
                const section = document.getElementById(`section_${schoolId}`);

                if (section.style.display === "none" || section.style.display === "") {
                    section.style.display = "table-row";
                } else {
                    section.style.display = "none";
                }
            });
        });
    });
</script>
