<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <title>HUMAN RC - LOGIN</title>
</head>

<body>
    <div class="flex h-screen w-screen bg-gray-700 font-poppins">
        <div class="m-auto w-full">
            <div class="flex justify-center">
                <div class="w-full lg:w-3/12 bg-gray-200 rounded-md">
                    <div class="p-10 space-y-5">
                        @if ($errors->first('wrong'))
                            <div id="error" class="px-5 bg-red-500 text-white py-3 rounded items-center">
                                {{ $errors->first('wrong') }}
                                <div class="float-right" onclick="closePopup()">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor"
                                        class="w-6 h-6  hover:rounded-full text-white hover:bg-red-800 hover:cursor-pointer">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </div>
                            </div>
                        @endif
                        <div class="flex space-x-4">
                            <img src="{{ URL::asset('images/humic.png') }}" class="w-10" alt=""
                                srcset="">
                            <img src="{{ URL::asset('images/telu.png') }}" class="w-10" alt="" srcset="">
                        </div>
                        <h1 class="text-xl font-semibold text-center">
                            Login
                        </h1>
                        <form method="POST" action="{{ route('login.action') }}">
                            @csrf
                            <div class="mb-6">
                                <label for="nip" class="block mb-2 text-sm font-medium ">NIP</label>
                                <input type="text" id="nip" name="nip"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    placeholder="NIP" required="">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="block mb-2 text-sm font-medium ">Password</label>
                                <input type="password" name="password" placeholder="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    required="">
                            </div>
                            <p class="py-3 text-right">
                                Belum punya akun? <a href="{{ route('register') }}"
                                    class="underline hover:text-orange-500">Daftar</a>
                            </p>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function closePopup() {
            document.getElementById('error').classList.add('hidden');
        }

        function loading() {
            document.getElementById('loading').classList.remove('hidden');
            document.getElementById('masuk').classList.add('hidden');
        }
    </script>
</body>

</html>
