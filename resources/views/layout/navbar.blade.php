@guest
    <a href="/login" class="rounded-md bg-blue-500 hover:bg-blue-700 px-5 py-2">
        Login
    </a>
@endguest
@auth
    @if (Auth::user())
        <div class="flex space-x-3 items-center">
            <a href="{{route('user.profile')}}" class="hover:underline mr-4">
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

    @if (Auth::user()->status == false)
        <div id="error" class="bg-red-700 absolute mx-auto inset-x-0 w-2/6 p-3 rounded-xl">
            <div class="float-right" onclick="closePopup()">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor"
                    class="w-6 h-6  hover:rounded-full text-white hover:bg-red-800 hover:cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div>
                Akun anda masih pada tahap verifikasi oleh admin, silakan hubungi admin untuk memverifikasi akun anda.
            </div>
        </div>
    @endif
@endauth
