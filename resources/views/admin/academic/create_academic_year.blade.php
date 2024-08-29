@extends('admin.layout.Master')
@section('title', 'Academic Year || Create')
@section('CustomCSS')

@endsection
@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Academic Year</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Academic Year</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Create Academic Year</h3>
                            </div>


                            <form action="{{ route('academic-year.store') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        @if (Session::has('success'))
                                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                                        @endif
                                        @if (Session::has('error'))
                                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                                        @endif
                                        <label for="exampleInputEmail1">Academic Year Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Academic Year">
                                    </div>


                                    @error('name')
                                        <p class="text-danger"> {{ $message }}</p>
                                    @enderror ()


                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>




                    </div>




                </div>

            </div>
        </section>

    </div>
@endsection
@section('CustomJS')
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endsection
