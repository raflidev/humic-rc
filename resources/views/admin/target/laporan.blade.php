<!DOCTYPE html>
<html>

<head>
    <title>RC HUMIC - DASHBOARD</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="font-poppins">
    <style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
    <center>
		<h5 class="my-4">Laporan Target RC HUMIC</h5>
	</center>
    <div class="">
        <table class='table table-bordered'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tahun</th>
                    <th>Sumber</th>
                    <th>Indikator</th>
                    <th>Target</th>
                    <th>Capaian</th>
                    <th>Gap</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $nomor = 1; ?>
                @foreach ($data as $r)
                    <tr>
                        <td>{{ $nomor }}</td>
                        <td>{{ $r->tahun }}</td>
                        <td>{{ $r->sumber }}</td>
                        <td>{{ $r->indikator }}</td>
                        <td>{{ $r->target }}</td>
                        <td>{{ $r->capaian }}</td>
                        <td>{{ $r->capaian - $r->target }}</td>
                        <td>{{ $r->keterangan }}</td>
                    </tr>
                    <?php $nomor++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
    <style>
        div.dataTables_wrapper {
            width: 100%;
        }
    </style>
    <script src="/js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                scrollX: true,
            });
        });
        function closePopup() {
            document.getElementById('error').classList.add('hidden');
        }
    </script>
    @yield('scripts')
</body>

</html>
