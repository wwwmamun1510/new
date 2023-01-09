@extends('layouts.starlight')

@section('project')
active
@endsection

@section('title')
Edit project
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
                    <h4 class="text-center">Edit Project Information
                        <a href="{{ url('/project') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-project/'.$project->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$project->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <input type="text" name="category" value="{{$project->category}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Client</label>
                            <input type="text" name="client" value="{{$project->client}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Completion</label>
                            <input type="text" name="completion" value="{{$project->completion}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Type</label>
                            <input type="text" name="type" value="{{$project->type}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Author</label>
                            <input type="text" name="author" value="{{$project->author}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Budget</label>
                            <input type="text" name="budget" value="{{$project->budget}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('public/uploads/projects/'.$project->image) }}" width="70px" height="70px" alt="Image">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Update Project</button>
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