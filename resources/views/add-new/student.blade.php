<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Add New Student</h2>
    <section class="form-body">
        <form action="/dashboard/students/add-new-student" method="POST">
            <div class="flex ">
                <div class="form-group">
                    <label class="form-label"
                        for="fisrt_name"
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
                        value="{{ old('email') }}"
                        required
                    />
                </div>
            </div>
            <div class="flex ">
                <div class="form-group">
                    <label class="form-label"
                        for="location"
                    >
                        Location
                    </label>
                    <input 
                        class="input"
                        type="text"
                        name="location"
                        id="location"
                        value="{{ old('location') }}"
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="form-label"
                        for="university"
                    >
                        University
                    </label>
                    <input 
                        class="input"
                        type="text"
                        name="university"
                        id="university"
                        value="{{ old('university') }}"
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="form-label"
                        for="blacklisted"
                    >
                        Blacklisted
                    </label>
                    <input 
                        class="input"
                        type="text"
                        name="blacklisted"
                        id="blacklisted"
                        value="{{ old('blacklisted') }}"
                        required
                    />
                </div>
            </div>
            <div>
                <button type="submit"
                    class="button"
                >
                    Add Student
                </button>
            </div>
        </form>
    </section>
</x-app-layout>