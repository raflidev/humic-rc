@guest
    <a href="/login" class="rounded-md bg-blue-500 hover:bg-blue-700 px-5 py-2">
        Login
    </a>
@endguest
@auth
    @if (Auth::user()->status == true)
        <div class="flex space-x-3 items-center">
            <a href="profile" class="hover:underline mr-4">
                Halo, {{ Auth::user()->name }}
            </a>
            <div class="rounded-md bg-blue-500 hover:bg-blue-700 px-5 py-2">
                <form action="{{ route('user.logout') }}" method="POST">
                    @csrf
                    <button>Logout</button>
                </form>
            </div>
        </div>
    @endif
@endauth
