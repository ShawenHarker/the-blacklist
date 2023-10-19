<style>
    h1 {
        font-weight: 900;
        font-size: 2.5rem;
    }

    .black-list {
        text-decoration: line-through red 5px
    }
</style>

<div class="flex justify-between p-6 border-b-2">
    <h1>The <span class="black-list">Blacklisted</span> Students</h1>

    @if (Route::has('login'))
        <div >
            @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            @endauth
        </div>
    @endif
</div>
