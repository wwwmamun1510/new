@extends('layouts.starlight')

@section('logo')
active
@endsection

@section('title')
Edit logo
@endsection

@section('content')
 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">
 <nav class="breadcrumb sl-breadcrumb">
 <a class="breadcrumb-item" href="{{url('/home')}}">Home</a>
 </nav>
 <div class="sl-pagebody">
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Edit Logo Information
                        <a href="{{ url('/logo') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                     <form action="{{ url('update-logo/'.$logo->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Logo Image</label>
                            <input type="file" name="logo_image" class="form-control">
                            <img src="{{ asset('public/uploads/logos/'.$logo->logo_image) }}" width="70px" height="70px" alt="Logo Image">
                        </div>
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-primary">Update Logo</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection