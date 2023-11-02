<?php
    if ($studentTeacher->is_blacklisted === 1) {
        $blacklisted = 'Yes';
    }
    else {
        $blacklisted = 'No';
    }
?>

<x-app-layout>
    <h1 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6 w-full">
        View Student Details
    </h1>
    <div class="flex">
        <h2 class="font-semibold text-md text-gray-800 leading-tight text-right mr-12 mb-6 w-full">
            General Information
        </h2>
        <h2  class="justify-start text-right w-full">
            <a href="#">
                <i class="fa-solid fa-pencil"></i>
            </a>
        </h2>
    </div>
    <section class="form-body">
        <div class="flex ">
            <div class="form-group">
                <x-input-label for="first_name">First Name</x-input-label>
                <input
                    class="input text-gray-500"
                    type="text"
                    name="first_name"
                    id="first_name"
                    value="{{ $studentTeacher->first_name }}"
                    disabled
                />
            </div>
            <div class="form-group">
                <x-input-label for="last_name">Last Name</x-input-label>
                <input 
                    class="input text-gray-500"
                    type="text"
                    name="last_name"
                    id="last_name"
                    value="{{ $studentTeacher->last_name }}"
                    disabled
                />
            </div>
        </div>
        <div class="flex">
            <div class="form-group">
                <x-input-label for="location">Location</x-input-label>
                <input 
                    class="input text-gray-500"
                    type="text"
                    name="location"
                    id="location"
                    value="{{ $studentTeacher->location }}"
                    disabled
                />
            </div>
            <div class="form-group">
                <x-input-label for="school_id">School</x-input-label>
                <input 
                    class="input text-gray-500"
                    type="text"
                    id="school_id"
                    {{-- value="{{ $studentTeacher->school->name }}" --}}
                    disabled
                />
            </div>
            <div class="form-group">
                <x-input-label for="is_blacklisted">BlackListed</x-input-label>
                <input 
                    class="input text-gray-500"
                    type="text"
                    id="is_blacklisted"
                    value="{{ $blacklisted }}"
                    disabled
                />
            </div>
        </div>
    </section>
</x-app-layout>
