@extends('layouts.starlight')

@section('contact')
active
@endsection

@section('title')
contact
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
                    <h4 class="text-center">Add Contact Information</h4>
                  </div>
                <div class="card-body">
                   <form action="{{ url('add-contact') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="form-group mb-3">
                            <label for="">Phone</label>
                             <input type="text" name="phone" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Icon Image</label>
                            <input type="file" name="icon_image" class="form-control">
                        </div>
                        <div class="form-group mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Add Contact</button>
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
                    <h4 class="text-center">Contact Information Details</h4>
                </div>
                <div class="card-body">
                 <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Icon Image</th>
                                <th>Action Button</th>
                                <th>Action Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $item)
                            <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{ $item->phone}}</td>
                                <td>{{ $item->email}}</td>
                                <td>
                                    <img src="{{ asset('public/uploads/contacts/'.$item->icon_image) }}" width="70px" height="70px" alt="Icon Image">
                                </td>
                                <td>
                                    <a href="{{url('edit-contact/'.$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    </td>
                                    <td>
                                    {{-- <a href="{{ url('delete-contact/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                                    <form action="{{ url('delete-contact/'.$item->id) }}" method="POST">
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