<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Add New University</h2>
    <section class="form-body">
        <form action="/dashboard/universities/add-new-university" method="POST">
            @csrf
            <div class="flex">
                <div class="form-group">
                    <label class="form-label"
                        for="name"
                    >
                        Name
                    </label>
                    <input 
                        class="input"
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        required
                    />
                </div>
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
            </div>
            <div class="flex">
                <div class="form-group">
                    <label class="form-label"
                        for="website"
                    >
                        Website
                    </label>
                    <input 
                        class="input"
                        type="url"
                        name="website"
                        id="website"
                        value="{{ old('website') }}"
                        required
                    />
                </div>
                <div class="form-group">
                    <label class="form-label"
                        for="student_count"
                    >
                        Student Count
                    </label>
                    <input 
                        class="input"
                        type="number"
                        name="student_count"
                        id="student_count"
                        value="{{ old('student_count') }}"
                        required
                    />
                </div>
            </div>
            <div>
                <button type="submit"
                    class="button"
                >
                    Add University
                </button>
            </div>
        </form>
    </section>
</x-app-layout>