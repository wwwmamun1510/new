@extends('layouts.starlight')

@section('skill')
active
@endsection

@section('title')
Edit skill
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
                    <h4 class="text-center">Edit Skill Information
                        <a href="{{ url('/skill') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                   <form action="{{ url('update-skill/'.$skill->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       <div class="form-group mb-3">
                            <label for="">Skill Type</label>
                            <input type="text" name="skill_type" value="{{$skill->skill_type}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Percentage</label>
                            <input type="text" name="percentage" value="{{$skill->percentage}}" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Update Skill</button>
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