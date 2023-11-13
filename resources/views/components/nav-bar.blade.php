<?php 
    $tableList = [
        [
            'name' => 'Dashboard',
            'url' => 'dashboard',
        ],
        [
            'name' => 'Schools',
            'url' => 'dashboard/schools',
        ],
    ]
?>

<div class="flex justify-between">
    @foreach ($tableList as $table)
            <a href="/{{ $table['url'] }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white px-4">{{ $table['name'] }}</a>
    @endforeach
</div>