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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css ">
    <title>RC HUMIC - DASHBOARD</title>
</head>

<body class="font-poppins">
    <div class="flex">
        @yield('content')
    </div>
    <style>
        div.dataTables_wrapper {
            width: 100%;
        }
    </style>
    <script src="{{ mix('/js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollX: true,
            });
        });
        // document.addEventListener('DOMContentLoaded', function() {
        //     let table = new DataTable('#example', {
        //         "scrollX": true
        //     });
        // });
        function closePopup() {
            document.getElementById('error').classList.add('hidden');
        }
    </script>
    @yield('scripts')
</body>

</html>
