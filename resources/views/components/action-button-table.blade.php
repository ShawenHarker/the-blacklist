@props(['viewRoute', 'updateRoute'])

<button x-data="{ open: false }" class="dropdown-button">
    <i class="fa-solid fa-ellipsis-vertical" @click="open = !open"></i>
    <ul x-show="open" @click.away="open = false" class="dropdown-options">
        <li><a href="{{ $viewRoute }}" class="px-6">View</a></li>
        <li><a href="{{ $updateRoute }}" class="px-6">Edit</a></li>
    </ul>
</button>