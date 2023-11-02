@props(['url'])

<div class="search-add">
    <x-search-bar />
    <x-add-button :url="$url"/>
</div>