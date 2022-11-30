<!DOCTYPE html>
<html>
<head>
    <title>Laravel Datatables with Relationship Example - NiceSnippets.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <style type="text/css">
        .paginate_button{
            padding: 0px !important;
        }
    </style>
</head>
<body>
<div class="container" style="margin-top: 100px;margin-bottom: 100px; ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white">Laravel Datatables with Relationship Example - NiceSnippets.com</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                     <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Auther</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
   $(document).ready(function() {
        $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('barang.index') }}",
            columns: [
                {data: 'barang_id', name: 'barang_id'},
                {data: 'nama_barang', name: 'nama_barang'},
                {data: 'nama_satuan', name: 'Satuan.nama_satuan'},
            ]
        });
    });
</script>
</body>
</html>
It will help you...
