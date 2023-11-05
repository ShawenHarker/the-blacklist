<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Blacklist A Student</h2>
    <section class="form-body">
        <form action="/dashboard/blacklisted-students/add-new-blacklist-student" method="POST" enctype="multipart/form-data">
            @csrf
            <x-input-label for="student_teacher_id">Select Student</x-input-label>
            <select
                class="w-full mt-4 mb-4"
                name="student_teacher_id"
            >
                <option>Select Student</option>
                @foreach ($studentTeachers as $studentTeacher)
                    <option value="{{ $studentTeacher->id }}">
                        {{ $studentTeacher->first_name . ' ' . $studentTeacher->last_name . ' ' . '-' . ' ' . $studentTeacher->location }}
                    </option>
                @endforeach
            </select>
            <x-input-label for="school_id">Select School</x-input-label>
            <select
                class="w-full mt-4 mb-4"
                name="school_id"
            >
                <option>Select School</option>
                @foreach ($schools as $school)
                    <option value="{{ $school->id }}">
                        {{ $school->name }}
                    </option>
                @endforeach
            </select>
            <div class="form-group">
                <x-input-label for="reason">Reason For Blacklisting</x-input-label>
                <input 
                    class="w-full mt-4 mb-4"
                    type="text"
                    name="reason"
                    id="reason"
                    value="{{ old('reason') }}"
                    required
                />
            </div>
            <h3 class="text-sm font-semibold text-gray-800 leading-tight py-2">
                If you have any information you would like to share about the student, please do so below, to improve your case against the student. <span class="span-nb">NB!!! Theses fields are not required.</span>
            </h3>
            <div class="flex">
                <div class="form-group">
                    <x-input-label for="image">Add Image</x-input-label>
                    <input 
                        class="mt-4 mb-6"
                        type="file"
                        name="image"
                        id="image"
                    />
                </div>
                <div class="form-group">
                    <x-input-label for="mp3">Add Mp3</x-input-label>
                    <input 
                        class="mt-4 mb-6"
                        type="file"
                        name="mp3"
                        id="mp3"
                    />
                </div>
                <div class="form-group">
                    <x-input-label for="video">Add Video</x-input-label>
                    <input 
                        class="mt-4 mb-6"
                        type="file"
                        name="video"
                        id="video"
                    />
                </div>
            </div>
            <div>
                <x-primary-button>Blacklist Student</x-primary-button>
            </div>
        </form>
    </section>
</x-app-layout>