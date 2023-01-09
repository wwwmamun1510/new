@extends('layouts.starlight')

@section('project')
active
@endsection

@section('title')
project
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
                    <h4 class="text-center">Add Project Information</h4>
                  </div>
                <div class="card-body">
                   <form action="{{ url('add-project') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Category</label>
                             <input type="text" name="category" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Client</label>
                            <input type="text" name="client" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Completion</label>
                            <input type="text" name="completion" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Type</label>
                            <input type="text" name="type" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Author</label>
                            <input type="text" name="author" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Budget</label>
                            <input type="text" name="budget" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Add Project</button>
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
                    <h4 class="text-center">Project Information Details</h4>
                </div>
                <div class="card-body">
                 <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Client</th>
                                <th>Completion</th>
                                <th>Type</th>
                                <th>Author</th>
                                <th>Budget</th>
                                <th>Image</th>
                                <th>Action Button</th>
                                <th>Action Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->category }}</td>
                                <td>{{ $item->client}}</td>
                                <td>{{ $item->completion}}</td>
                                <td>{{ $item->type}}</td>
                                <td>{{ $item->author}}</td>
                                <td>{{ $item->budget}}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/projects/'.$item->image)}}" width="70px" height="70px" alt="Image">
                                </td>
                                <td>
                                    <a href="{{ url('edit-project/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                    {{-- <a href="{{ url('delete-project/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form action="{{ url('delete-project/'.$item->id) }}" method="POST">
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