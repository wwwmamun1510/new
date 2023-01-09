@extends('layouts.starlight')

@section('banner')
active
@endsection

@section('title')
banner
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Home</a>
</nav>
<div class="sl-pagebody">
<section>
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Add Banner Information</h4>
                  </div>
                <div class="card-body">
                   <form action="{{ url('add-banner') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Introduction</label>
                            <input type="text" name="introduction" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Banner Image</label>
                            <input type="file" name="banner_image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label form="">Button Name</label>
                            <input type="text" name="btn" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Add Banner</button>
                        </div>
                      </form>
                 </div>
            </div>
        </div>
    </div>
</div>
    <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center">Banner Information Details</h4>
                </div>
                <div class="card-body">
                 <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Introduction</th>
                                <th>Description</th>
                                <th>Banner Image</th>
                                <th>Button Name</th>
                                <th>Status Button</th>
                                <th>Action Button</th>
                                <th>Action Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banner as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $item->introduction }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/banners/'.$item->banner_image) }}" width="70px" height="70px" alt="Banner Image">
                                </td>
                                <td>{{ $item->btn }}</td>
                                <td>
                                   <a class="btn btn-danger btn-sm" href="{{ url('change-status/'.$item->id) }}">Active Status</a>
                                 </td>
                                  <td>
                                    <a href="{{ url('edit-banner/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                  </td>
                                   <td>
                                    {{-- <a href="{{ url('delete-banner/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form action="{{ url('delete-banner/'.$item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>
</section>
</div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection