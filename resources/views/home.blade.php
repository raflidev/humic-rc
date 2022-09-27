<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
        integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <title>HUMAN RC - DASHBOARD</title>
</head>

<body class="font-poppins">
    <div class="flex">
        <div class="w-2/12 bg-gray-50" id="sidebar">
            HUMIC RC
        </div>
        <div class="w-10/12 bg-slate-600 px-16 py-10 text-white" id="sidebar">
            <div class="" id="navbar">
                <div class="flex justify-between items-center">
                    <h1 class="font-semibold uppercase">Dashboard</h1>
                    <div class="rounded-md bg-blue-500 px-5 py-2">
                        Login
                    </div>
                </div>
            </div>

            <div>
                <div class="grid grid-cols-4 gap-5">
                    <div class="px-5 py-3 bg-white rounded-md text-black">
                        <div class="flex items-center">
                            <div class="w-5/6 space-y-5">
                                <div>
                                    <div class="text-gray-500 text-sm uppercase">Penelitian Nasional</div>
                                    <div class="text-2xl font-semibold">
                                        20
                                    </div>
                                </div>
                                <div>
                                    <div class="text-gray-500 text-sm uppercase">Dana Penelitian 3 tahun terakhir</div>
                                    <div class="font-semibold">
                                        Rp.300.000.000
                                    </div>
                                </div>

                            </div>
                            <div class="w-1/6">
                                <div class="flex justify-center">
                                    <div class="bg-orange-400 p-3 flex justify-center rounded-full">
                                        <i class="far fa-chart-bar text-white text-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-3 bg-white rounded-md text-black">
                        <div class="flex items-center">
                            <div class="w-5/6 space-y-5">
                                <div>
                                    <div class="text-gray-500 text-sm uppercase">Penelitian Internasional</div>
                                    <div class="text-2xl font-semibold">
                                        5
                                    </div>
                                </div>
                                <div>
                                    <div class="text-gray-500 text-sm uppercase">Dana Penelitian 3 tahun terakhir</div>
                                    <div class="font-semibold">
                                        Rp.300.000.000
                                    </div>
                                </div>

                            </div>
                            <div class="w-1/6">
                                <div class="flex justify-center">
                                    <div class="bg-orange-400 p-3 flex justify-center rounded-full">
                                        <i class="far fa-chart-bar text-white text-lg"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="flex mt-10">
                    <div class="bg-white p-3 w-4/6">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>

</html>
