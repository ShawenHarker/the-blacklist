<?php 
    $tableList = [
        [
            'name' => 'Students',
            'url' => 'students',
        ],
        [
            'name' => 'Universities',
            'url' => 'universities',
        ],
        [
            'name' => 'BlackListed Students',
            'url' => 'blacklisted-students',
        ]
    ]
?>

<div class="flex justify-between">
    @foreach ($tableList as $table)
            <a href="/{{ $table['url'] }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 px-4">{{ $table['name'] }}</a>
    @endforeach
</div>