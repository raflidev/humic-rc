<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 7pt;
		}
        table td {
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        @media print {
            #printPageButton {
                display: none;
            }
        }
	</style>
        <center>
            <div class="form-group px-4">
                <div>
                    <h3>Laporan HUMIC @yield('title') RC</h3>
                </div>
                <button class="btn btn-primary float-left" onclick="window.print()" id="printPageButton">Print</button>
                @yield('content')
            </div>
        </center>
</body>
<script>
    // settimeout
    setTimeout(function() {
        window.print();
    }, 1500);
</script>

@yield('script')
</html>
