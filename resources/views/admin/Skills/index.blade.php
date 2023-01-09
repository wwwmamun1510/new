@extends('layouts.starlight')

@section('skill')
active
@endsection

@section('title')
skill
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
                    <h4 class="text-center">Add Skill Information</h4>
                  </div>
                <div class="card-body">
                   <form action="{{ url('add-skill') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Skill Type</label>
                            <input type="text" name="skill_type" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Percentage</label>
                            <input type="text" name="percentage" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Add Skill</button>
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
                    <h4 class="text-center">Skill Information Details</h4>
                </div>
                <div class="card-body">
                 <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Skill Type</th>
                                <th>Percentage</th>
                                <th>Action Button</th>
                                <th>Action Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($skill as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $item->skill_type}}</td>
                                <td>{{ $item->percentage}}</td>
                                <td>
                                    <a href="{{url('edit-skill/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                    {{-- <a href="{{ url('delete-skill/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form action="{{ url('delete-skill/'.$item->id) }}" method="POST">
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