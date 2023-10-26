<?php 
    $tableList = [
        [
            'name' => 'Dashboard',
            'url' => 'dashboard',
        ],
        [
            'name' => 'Students',
            'url' => 'dashboard/students',
        ],
        [
            'name' => 'Universities',
            'url' => 'dashboard/universities',
        ],
        [
            'name' => 'BlackListed Students',
            'url' => 'dashboard/blacklisted-students',
        ]
    ]
?>

<div class="flex justify-between">
    @foreach ($tableList as $table)
            <a href="/{{ $table['url'] }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white px-4">{{ $table['name'] }}</a>
    @endforeach
</div>