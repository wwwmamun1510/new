@extends('layouts.starlight')

@section('experience')
active
@endsection

@section('title')
Edit experience
@endsection

@section('content')
 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">
 <nav class="breadcrumb sl-breadcrumb">
 <a class="breadcrumb-item" href="{{url('/home')}}">Home</a>
 </nav>
 <div class="sl-pagebody">
  <div class="">
        <div class="row">
            <div class="col-lg-6 m-auto">
              @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
               @endif
              <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Edit Experience Information
                        <a href="{{ url('/experience') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-experience/'.$experience->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Duration</label>
                            <input type="text" name="duration" value="{{$experience->duration}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Company Name</label>
                            <input type="text" name="company_name" value="{{$experience->company_name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Designation</label>
                            <input type="text" name="designation" value="{{$experience->designation}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Details</label>
                            <input type="text" name="details" value="{{$experience->details}}" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Update Experience</button>
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