@extends('admin.layout.Master')

@section('title', 'List | Fee Head')
@section('CustomCSS')
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">







    <link rel="stylesheet" href="vendor/libs/animate-css/animate.css" />
    <link rel="stylesheet" href="vendor/libs/sweetalert2/sweetalert2.css" />



@endsection
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Fee Head</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('fee-head.create') }}" class="btn btn-primary btn-sm mr-5">Add</a>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Fees Category List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 mb-5">


                        <div class="card">


                            <div class="card-body">
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        @if (Session::has('success'))
                                            Swal.fire({
                                                toast: true,
                                                position: 'top-end',
                                                icon: 'success',
                                                title: '{{ Session::get('success') }}',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                background: '#fff', // Background color
                                                color: '#333' // Text color
                                            });
                                        @elseif (Session::has('error'))
                                            Swal.fire({
                                                toast: true,
                                                position: 'top-end',
                                                icon: 'error',
                                                title: '{{ Session::get('error') }}',
                                                showConfirmButton: false,
                                                timer: 3000,
                                                background: '#fff', // Background color
                                                color: '#333' // Text color
                                            });
                                        @endif
                                    });
                                </script>
                                @if ($data->total() > 0)
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID#</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->name }}</td>

                                                    <td>
                                                        <div class="btn-group" role="group">

                                                            <form action="{{ route('fee-head.edit') }}" method="POST">
                                                                @csrf
                                                                @method('GET')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <button type="submit" class="btn btn-primary btn-sm"
                                                                    style="border-radius: .25rem 0rem 0rem .25rem;"><i
                                                                        class="fa-solid fa-pen-to-square"></i></button>
                                                            </form>

                                                            <form action="{{ route('fee-head.delete') }}" method="POST"
                                                                style="display: inline" id="deleteform">
                                                                @csrf
                                                                @method('GET')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <button style="border-radius: 0rem .25rem .25rem 0rem;"
                                                                    type="button" class="btn btn-danger btn-sm"
                                                                    id="confirm-color" data-id="{{ $item->id }}">
                                                                    <i class="fa-regular fa-trash-can"></i></button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                    <div class="mt-2">
                                        {{ $data->links() }}
                                    </div>
                                @else
                                    <h2 class="alert border-warning">Fee Structure data available in table</h2>
                                @endif

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>
@endsection

@section('CustomJS')
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>




    <!-- Jquery JS -->
    <script src="vendor/libs/jquery/jquery.js"></script>


    <!-- endbuild -->

    <!-- Vendors JS -->
    {{-- <script src="vendor/libs/sweetalert2/sweetalert2.js"></script> --}}

    <!-- Main JS -->
    <script src="js/main.js"></script>


    <!-- Page JS -->


    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "paging": false,
                "info": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", ]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');


        });
    </script>

@endsection
