@extends('layouts.starlight')

@section('experience')
active
@endsection

@section('title')
experience
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
                    <h4 class="text-center">Add Experience Information</h4>
                  </div>
                <div class="card-body">
                   <form action="{{ url('add-experience') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Duration</label>
                            <input type="text" name="duration" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Company Name</label>
                             <input type="text" name="company_name" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Designation</label>
                            <input type="text" name="designation" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Details</label>
                            <input type="text" name="details" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Add Experience</button>
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
                    <h4 class="text-center">Experience Information Details</h4>
                </div>
                <div class="card-body">
                 <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Duration</th>
                                <th>Company Name</th>
                                <th>Designation</th>
                                <th>Details</th>
                                <th>Action Button</th>
                                <th>Action Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($experience as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $item->duration }}</td>
                                <td>{{ $item->company_name }}</td>
                                <td>{{ $item->designation}}</td>
                                <td>{{ $item->details}}</td>
                                <td>
                                    <a href="{{ url('edit-experience/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                    {{-- <a href="{{ url('delete-experience/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form action="{{ url('delete-experience/'.$item->id) }}" method="POST">
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