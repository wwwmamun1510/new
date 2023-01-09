@extends('layouts.starlight')

@section('about')
active
@endsection

@section('title')
about
@endsection
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
<nav class="breadcrumb sl-breadcrumb">
<a class="breadcrumb-item" href="{{url('/home')}}">Home</a>
</nav>
<div class="sl-pagebody">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card">
             <h1 class="text-center">“Live as if you were to die tomorrow. Learn as if you were to live forever.” ― Mahatma Gandhi</h1>
             <p1 class="text-center">Spread the light of knowledge</p1>
          </div>
       </div>
     </div>
  </div>
 </div>
 </div><!-- sl-pagebody -->
</div><!-- sl-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection