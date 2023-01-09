@extends('layouts.starlight')

@section('testimonial')
active
@endsection

@section('title')
testimonial
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
                    <h4 class="text-center">Add Testimonial Information</h4>
                  </div>
                <div class="card-body">
                   <form action="{{ url('add-testimonial') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Testimonial Name</label>
                             <input type="text" name="testimonial_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Designation</label>
                            <input type="text" name="designation" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Add Testimonial</button>
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
                    <h4 class="text-center">Testimonial Information Details</h4>
                </div>
                <div class="card-body">
                 <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Description</th>
                                <th>Testimonial Name</th>
                                <th>Designation</th>
                                <th>Action Button</th>
                                <th>Action Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonial as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->testimonial_name }}</td>
                                <td>{{ $item->designation}}</td>
                                <td>
                                    <a href="{{ url('edit-testimonial/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                    {{-- <a href="{{ url('delete-testimonial/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form action="{{ url('delete-testimonial/'.$item->id) }}" method="POST">
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