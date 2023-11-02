<x-app-layout>
    <h2 class="font-semibold text-md text-gray-800 leading-tight text-center mb-6">Add A New School</h2>
    <section class="form-body">
        <form action="{{ route('school.update', ['school' => $school]) }}" method="POST">
            @csrf
                <div>
                    <x-input-label for="first_name">Name</x-input-label>
                    <input 
                        class="input"
                        type="text"
                        name="name"
                        id="name"
                        value="{{ $school->name }}"
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
                        value="{{ $school->location }}"
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
                        value="{{ $school->website }}"
                        required
                    />
                </div>
            <div class="flex justify-end mt-4">
                <x-primary-button>Update School</x-primary-button>
                <x-school-delete-modal 
                    :school="$school"
                    x-show="showModal"
                    x-cloak>
                </x-school-delete-modal>
            </div>
        </form>
    </section>
</x-app-layout>