@props(['school'])

<div x-data="{ show: false }" x-cloak>
    <x-secondary-button @click="show = true" class="text-red-600 ml-2">Delete</x-secondary-button>
    <div
        x-show="show"
        class="fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
        x-cloak
    >
        <div class="fixed inset-0 transform transition-all" x-on:click="show = false">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>

        <div class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-2xl sm:mx-auto" x-show="show">
            <div class="p-6">
                <h2 class="text-lg font-semibold">Confirmation</h2>
                <p>Are you sure you want to delete the {{ $school->name }}?</p>
            </div>

            <div class="p-6 bg-gray-100 flex justify-end">
                <x-primary-button @click="show = false" class="text-gray-500">Cancel</x-primary-button>
                <x-secondary-button
                    @click="deleteSchool"
                    class="text-red-600 ml-2"
                >
                    Yes, Delete
                </x-secondary-button>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteSchool() {
        fetch(`{{ route('school.destroy', ['school' => $school]) }}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
        })
        .then(response => {
            if (response.status === 204) {
                window.location.href = '{{ route('school.index') }}';
            }
        })
        .catch(error => {
            console.error(error);
        });
    }
</script>
