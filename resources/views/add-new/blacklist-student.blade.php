<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Blacklist A Student</h2>
    <section class="form-body">
        <form action="/dashboard/blacklisted-students/add-new-blacklist-student" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- <div class="flex">
                <div class="form-group">
                    <label class="form-label"
                        for="first_name"
                    >
                        First Name
                    </label>
                    <input 
                        class="input"
                        type="text"
                        name="first_name"
                        id="first_name"
                        value="{{ old('first_name') }}"
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="form-label"
                        for="last_name"
                    >
                        Last Name
                    </label>
                    <input 
                        class="input"
                        type="text"
                        name="last_name"
                        id="last_name"
                        value="{{ old('last_name') }}"
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="form-label"
                        for="email"
                    >
                        Email
                    </label>
                    <input 
                        class="input"
                        type="email"
                        name="email"
                        id="email"
                        required
                    />
                </div>
            </div> --}}
            

            {{-- dropdown that will bring me all the students and I want to select an student id from (George Many - jigumany ) --}}
            <div class="form-group">
                <label class="form-label"
                    for="reason"
                >
                    Reason For Blacklisting
                </label>
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
                    <label class="form-label"
                        for="image"
                    >
                        Image
                    </label>
                    <input 
                        class="input"
                        type="file"
                        name="image"
                        id="image"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label"
                        for="mp3"
                    >
                        Mp3
                    </label>
                    <input 
                        class="input"
                        type="file"
                        name="mp3"
                        id="mp3"
                    />
                </div>
                <div class="form-group">
                    <label class="form-label"
                        for="video"
                    >
                        Video
                    </label>
                    <input 
                        class="input"
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