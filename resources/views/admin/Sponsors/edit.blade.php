@extends('layouts.starlight')

@section('sponsor')
active
@endsection

@section('title')
Edit sponsor
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
                    <h4 class="text-center">Edit Sponsor Information
                        <a href="{{ url('/sponsor') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                     <form action="{{ url('update-sponsor/'.$sponsor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Sponsor Image</label>
                            <input type="file" name="sponsor_image" class="form-control">
                            <img src="{{ asset('public/uploads/sponsors/'.$sponsor->sponsor_image) }}" width="70px" height="70px" alt="Sponsor Image">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Update Sponsor</button>
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