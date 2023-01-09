@extends('layouts.starlight')

@section('testimonial')
active
@endsection

@section('title')
Edit testimonial
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
                    <h4 class="text-center">Edit Testimonial Information
                        <a href="{{ url('/testimonial') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-testimonial/'.$testimonial->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{$testimonial->description}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Testimonial Name</label>
                            <input type="text" name="testimonial_name" value="{{$testimonial->testimonial_name}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Designation</label>
                            <input type="text" name="designation" value="{{$testimonial->designation}}" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Update Testimonial</button>
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