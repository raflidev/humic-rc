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
                        <div class="flex space-x-4">
                            <img src="{{ URL::asset('images/humic.png') }}" class="w-10" alt=""
                                srcset="">
                            <img src="{{ URL::asset('images/telu.png') }}" class="w-10" alt="" srcset="">
                        </div>
                        <h1 class="text-xl font-semibold text-center">
                            Register
                        </h1>

                        <form action="{{ route('register.action') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="text" class="block mb-2 text-sm font-medium ">Nama</label>
                                <input type="text" id="name" name="name" placeholder="Nama"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    placeholder="" required="">
                                @if ($errors->first('nama'))
                                    <div class="text-sm text-red-500">*{{ $errors->first('nama') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="nip" class="block mb-2 text-sm font-medium ">NIP</label>
                                <input type="number" name="nip" id="nip" placeholder="NIP"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    placeholder="" required="">
                                @if ($errors->first('nip'))
                                    <div class="text-sm text-red-500">*{{ $errors->first('nip') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="block mb-2 text-sm font-medium ">Password</label>
                                <input type="password" name="password" placeholder="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    required="">
                                @if ($errors->first('password'))
                                    <div class="text-sm text-red-500">*{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="password" class="block mb-2 text-sm font-medium ">Confirm Password</label>
                                <input type="password" name="confirmed_password" placeholder="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                                    required="">
                                @if ($errors->first('confirmed_password'))
                                    <div class="text-sm text-red-500">*{{ $errors->first('confirmed_password') }}</div>
                                @endif
                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
