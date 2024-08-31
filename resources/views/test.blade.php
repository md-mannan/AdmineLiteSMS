@extends('admin.layout.Master')

@section('title', 'List | Fee Structure')
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
                        <h1>Fee Structure</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('fee-structure.create') }}" class="btn btn-primary btn-sm mr-5">Add</a>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Fees Structure List</li>
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
                                                <th>Class Name</th>
                                                <th>Fee Name</th>
                                                <th>Year</th>
                                                <th>Jan</th>
                                                <th>Feb</th>
                                                <th>Mar</th>
                                                <th>Apr</th>
                                                <th>May</th>
                                                <th>Jun</th>
                                                <th>Jul</th>
                                                <th>Aug</th>
                                                <th>Sep</th>
                                                <th>Oct</th>
                                                <th>Nov</th>
                                                <th>Dec</th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->id }}</td>
                                                    <td>{{ $item->class->name }}</td>
                                                    <td>{{ $item->feeHead->name }}</td>
                                                    <td>{{ $item->academicYear->name }}</td>
                                                    <td>{{ $item->january }}</td>
                                                    <td>{{ $item->february }}</td>
                                                    <td>{{ $item->march }}</td>
                                                    <td>{{ $item->april }}</td>
                                                    <td>{{ $item->may }}</td>
                                                    <td>{{ $item->june }}</td>
                                                    <td>{{ $item->july }}</td>
                                                    <td>{{ $item->august }}</td>
                                                    <td>{{ $item->september }}</td>
                                                    <td>{{ $item->october }}</td>
                                                    <td>{{ $item->november }}</td>
                                                    <td>{{ $item->december }}</td>

                                                    <td>
                                                        <div class="btn-group" role="group">

                                                            <form action="{{ route('fee-structure.edit') }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('GET')
                                                                <input type="hidden" name="id"
                                                                    value="{{ $item->id }}">
                                                                <button type="submit" class="btn btn-primary btn-sm"
                                                                    style="border-radius: .25rem 0rem 0rem .25rem;"><i
                                                                        class="fa-solid fa-pen-to-square"></i></button>
                                                            </form>

                                                            <form action="{{ route('fee-structure.delete') }}"
                                                                method="POST" style="display: inline" id="deleteform">
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
