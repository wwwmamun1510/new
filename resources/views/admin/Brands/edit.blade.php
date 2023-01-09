@extends('layouts.starlight')

@section('brand')
active
@endsection

@section('title')
Edit brand
@endsection

@section('content')
 <!-- ########## START: MAIN PANEL ########## -->
 <div class="sl-mainpanel">
 <nav class="breadcrumb sl-breadcrumb">
 <a class="breadcrumb-item" href="{{url('/brand')}}">Brand</a>
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
                    <h4 class="text-center">Edit Brand Information
                        <a href="{{ url('/brand') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                     <form action="{{ url('update-brand/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Brand Image</label>
                            <input type="file" name="brand_image" class="form-control">
                            <img src="{{ asset('public/uploads/brands/'.$brand->brand_image) }}" width="70px" height="70px" alt="Brand Image">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Brand</button>
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