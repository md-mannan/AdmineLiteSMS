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
                        <h1>Fee Structure</h1>
                    </div>
                    <div class="col-sm-6">

                        <ol class="breadcrumb float-sm-right">
                            <a href="{{ route('fee-structure.index') }}" class="btn btn-primary btn-sm mr-5">Back</a>
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Add</li>
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
                                <h3 class="card-title">Add New Fee Structure</h3>
                            </div>


                            <form action="{{ route('fee-structure.store') }}" method="POST">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-4">
                                            <label for="exampleInputEmail1">Class Name</label>
                                            <select class="form-control select2bs4 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true"
                                                name="class">
                                                <option selected="selected" value="">Select Class</option>
                                                @foreach ($class as $id => $name)
                                                    <option value="{{ $id }}">
                                                        {{ $name }}</option>
                                                @endforeach

                                            </select>
                                            @error('class')
                                                <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>


                                        <div class="form-group col-4">
                                            <label for="exampleInputEmail1">Fee Name</label>
                                            <select class="form-control select2bs4 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true"
                                                name="fee_head_id">
                                                <option selected="selected" value="">Select Fee Name</option>
                                                @foreach ($feename as $id => $name)
                                                    <option value="{{ $id }}">
                                                        {{ $name }}</option>
                                                @endforeach

                                            </select>
                                            @error('fee_head_id')
                                                <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group col-4">
                                            <label for="exampleInputEmail1">Academic Year</label>
                                            <select class="form-control select2bs4 select2-hidden-accessible"
                                                style="width: 100%;" data-select2-id="17" tabindex="-1" aria-hidden="true"
                                                name="academic_year_id">
                                                <option selected="selected" value="">Select Year</option>
                                                @foreach ($year as $id => $name)
                                                    <option value="{{ $id }}">
                                                        {{ $name }}</option>
                                                @endforeach

                                            </select>
                                            @error('academic_year_id')
                                                <p class="text-danger"> {{ $message }}</p>
                                            @enderror
                                        </div>




                                    </div>
                                    <div class="row">
                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">April</label>
                                            <input type="text" class="form-control" id="name" name="april"
                                                placeholder="Fee Amount ">

                                        </div>

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">May</label>
                                            <input type="text" class="form-control" id="name" name="may"
                                                placeholder="Fee Amount ">

                                        </div>

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">June</label>
                                            <input type="text" class="form-control" id="name" name="june"
                                                placeholder="Fee Amount ">

                                        </div>


                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">July</label>
                                            <input type="text" class="form-control" id="name" name="july"
                                                placeholder="Fee Amount ">

                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">August</label>
                                            <input type="text" class="form-control" id="name" name="august"
                                                placeholder="Fee Amount ">

                                        </div>

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">September</label>
                                            <input type="text" class="form-control" id="name" name="september"
                                                placeholder="Fee Amount ">
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">October</label>
                                            <input type="text" class="form-control" id="name" name="october"
                                                placeholder="Fee Amount ">
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">November</label>
                                            <input type="text" class="form-control" id="name" name="november"
                                                placeholder="Fee Amount ">
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">December</label>
                                            <input type="text" class="form-control" id="name" name="december"
                                                placeholder="Fee Amount ">

                                        </div>

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">January</label>
                                            <input type="text" class="form-control" id="name" name="January"
                                                placeholder="Fee Amount ">
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">February</label>
                                            <input type="text" class="form-control" id="name" name="february"
                                                placeholder="Fee Amount ">
                                        </div>

                                        <div class="form-group col-3">
                                            <label for="exampleInputEmail1">March</label>
                                            <input type="text" class="form-control" id="name" name="march"
                                                placeholder="Fee Amount ">
                                        </div>

                                    </div>





                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <input class="btn btn-secondary" type="reset" value="Clear">
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
