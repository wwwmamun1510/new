@extends('layouts.starlight')

@section('banner')
active
@endsection

@section('title')
Edit banner
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
                    <h4 class="text-center">Edit Banner Information
                        <a href="{{ url('/banner') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-banner/'.$banner->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Introduction</label>
                            <input type="text" name="introduction" value="{{$banner->introduction}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" value="{{$banner->description}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                            <img src="{{ asset('public/uploads/banners/'.$banner->banner_image) }}" width="70px" height="70px" alt="Banner Image">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Button Name</label>
                            <input type="text" name="btn" value="{{$banner->btn}}" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Update Banner</button>
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