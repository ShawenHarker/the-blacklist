<form method="GET" action="#">
    <input 
        type="text"
        name="search"
            placeholder="Search..."
            class="w-96 text-sm text-left text-gray-500 dark:text-gray-400 border-8 border-gray-500"
            value="{{ request('search') }}"
        >
</form>
