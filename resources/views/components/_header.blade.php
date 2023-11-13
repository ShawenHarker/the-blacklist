<div class="flex justify-between p-6 border-b-2">
    <x-logo />

    <x-nav-bar />

    @if (Route::has('login'))
        <div >
            {{-- @auth
                <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>
            @endauth --}}
            @auth
                <form method="POST" action="/logout"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    @csrf
                    <button type="submit"
                        class="ml-3 text-xs font-semibold uppercase py-3 px-5">
                        Logout
                    </button>
                </form>

                @else
                    <a href="/login" class="text-xs mr-3 font-bold uppercase m-auto">Log In</a>
                    <a href="/register" class="text-xs font-bold uppercase m-auto">Register</a>
            @endauth
        </div>
    @endif
</div>
