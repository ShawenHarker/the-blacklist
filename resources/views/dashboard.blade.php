<?php
    $studentTableHeader = [
        'First Name',
        'Last Name',
        'Location',
        'University',
        'Blacklisted',
        'Date Created',
        'Date Updated',
        'Actions'
    ];

    $url = 'dashboard/students/add-new-student';
?>

<x-app-layout> 
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center mb-4">Dashboard</h2> 
    <h4
    class="font-semibold text-md text-gray-800 leading-tight text-center">All Students</h4>
    <x-search-add :url="$url"/>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border-8 border-gray-500">
        <x-table-header :header=$studentTableHeader></x-table-header>
        <tboby class="table-body-styling">
            @foreach ($users as $user)
                <tr class="table-row">
                    <x-table-column>
                        {{ $user->first_name }}
                    </x-table-column>
                    <x-table-column>
                        {{ $user->last_name}}
                    </x-table-column>
                    <x-table-column>
                        {{ $user->location }}
                    </x-table-column>
                    <x-table-column>
                        {{ $user->university->name }}
                    </x-table-column>
                    <x-table-column>
                    @if ($user->is_blacklisted === 1)
                        Yes
                    @else
                        No
                    @endif
                    </x-table-column>
                    <x-table-column>
                        {{ $date = $user->created_at->format('d/m/Y') }}
                    </x-table-column>
                    <x-table-column>
                        {{ $date = $user->updated_at->format('d/m/Y') }}
                    </x-table-column>
                    <x-table-column>
                        <x-action-button-table></x-action-button-table>
                    </x-table-column>
                </tr>
            @endforeach
        </tboby>
        <x-table-footer :page=$users ></x-table-footer>
    </table>
    </x-app-layout>