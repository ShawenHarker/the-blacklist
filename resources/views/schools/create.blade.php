<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Add A New School</h2>
    <section class="form-body">
        <form action="{{ route('school.store') }}" method="POST">

            @csrf
                <div>
                    <x-input-label for="first_name">Name</x-input-label>
                    <input 
                        class="input"
                        type="text"
                        name="name"
                        id="name"
                        value="{{ old('name') }}"
                        required
                    />
                </div>
                <div>
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
                <div>
                    <x-input-label for="website">Website</x-input-label>
                    <input 
                        class="input"
                        type="url"
                        name="website"
                        id="website"
                        value="{{ old('website') }}"
                        required
                    />
                </div>
            <div>
                <x-primary-button>Add School</x-primary-button>
            </div>
        </form>
    </section>
</x-app-layout>