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
                    <x-input-label for="university">University</x-input-label>
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
                    <x-input-label for="blacklisted">BlackListed</x-input-label>
                    <input 
                        class="input"
                        type="text"
                        name="blacklisted"
                        id="blacklisted"
                        required
                    />
                </div>
            </div>
            <div>
                <x-primary-button>Add Student</x-primary-button>
            </div>
        </form>
    </section>
</x-app-layout>