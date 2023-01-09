@extends('layouts.starlight')

@section('contact')
active
@endsection

@section('title')
Edit contact
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
                    <h4 class="text-center">Edit Contact Information
                        <a href="{{ url('/contact') }}" class="btn btn-success float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                   <form action="{{ url('update-contact/'.$contact->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                       <div class="form-group mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{$contact->phone}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{$contact->email}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Icon Image</label>
                            <input type="file" name="icon_image" class="form-control">
                            <img src="{{ asset('public/uploads/contacts/'.$contact->icon_image)}}" width="70px" height="70px" alt="Icon Image">
                        </div>
                       
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Update Contact</button>
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