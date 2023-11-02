<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Add New Student</h2>
    <section class="form-body">
        <form action="/dashboard/students/add-new-student" method="POST">
            @csrf
            <div class="flex">
                <div class="form-group">
                    <x-input-label for="first_name">First Name</x-input-label>
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
                    <x-input-label for="last_name">Last Name</x-input-label>
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
                    <x-input-label for="email">Email</x-input-label>
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
                    <x-input-label for="location">Location</x-input-label>
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
                    <x-input-label for="school_id">School</x-input-label>
                    <select
                        class="input"
                        name="school_id"
                    >
                        <option>Select School</option>
                        @foreach ($universities as $school)
                            <option value="{{ $school->id }}">
                                {{ $school->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <x-input-label for="is_blacklisted">BlackListed</x-input-label>
                    <select
                        class="input"
                        name="is_blacklisted"
                    >
                        <option value="0">No</option>
                        <option value="1">Yes</option>
                    </select>
                </div>
            </div>
            <div>
                <x-primary-button>Add Student</x-primary-button>
            </div>
        </form>
    </section>
</x-app-layout>