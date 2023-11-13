<x-app-layout>
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mb-4">Import Students</h2>

    <form method="post" action="{{ route('student.import') }}" enctype="multipart/form-data" class="text-center">
        @csrf
        <x-input-label for="csv_file">Choose CSV File</x-input-label>
        <input type="file" name="csv_file" id="csv_file" accept=".csv" class="input border border-gray-300 p-4 ml-3">

        <x-primary-button>Import</x-primary-button>
    </form>
</x-app-layout>
