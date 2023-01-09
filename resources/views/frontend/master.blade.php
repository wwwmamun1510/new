<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Richard. - Easy Onepage Personal Template">
    <meta name="author" content="Paul">
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend_asset/css/style.css')}}">

    <title>Richard. - Easy Onepage Personal Template</title>
  </head>
<body>
<!-- Header Start -->
   <!-- Loader -->
   <div class="loader">
    <div class="spinner"><div class="double-bounce1"></div><div class="double-bounce2"></div></div>
   </div>
  
    <!-- Click capture -->
   <div class="click-capture d-lg-none"></div>

    <!-- Navbar -->  
    <nav id="scrollspy" class="navbar navbar-desctop">
        
      <div class="d-flex position-relative w-100">

        <!-- Brand-->
        @foreach($all_logos as $logo)
        <a class="navbar-brand" href="#">
           <img alt="" width="50px" height="50px" src="{{asset('public/uploads/logos/')}}/{{$logo->logo_image}}">
         </a>
        @endforeach
          <ul class="navbar-nav-desctop mr-auto d-none d-lg-block">
            <li><a class="nav-link" href="#home">Home</a></li>
            <li><a class="nav-link" href="#about">About</a></li>
            <li><a class="nav-link" href="#experience">Experience</a></li>
            <li><a class="nav-link" href="#projects">Projects</a></li>
            <li><a class="nav-link" href="#testimonials">Testimonials</a></li>
          </ul>

        <!-- Social -->
        @foreach($all_brands as $brand)
        <div class="social-side mb-30">
          <img alt="" width="30px" height="30px" src="{{asset('public/uploads/brands/')}}/{{$brand->brand_image}}">
        </div>
        @endforeach
        <!-- Toggler -->
        <button class="toggler d-lg-none ml-auto">
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
          <span class="toggler-icon"></span>
        </button>
      </div>
    </nav>


    <!-- Navbar Mobile -->  
    <nav id="navbar-mobile" class="navbar navbar-mobile d-lg-none">
      <ion-icon class="close" name="close-outline"></ion-icon>

      <!-- Social -->
      <ul class="social-icons mr-auto mr-lg-0">
         <li><a href="#"><ion-icon name="logo-facebook"></ion-icon></a></li>
         <li><a href="#"><ion-icon name="logo-twitter"></ion-icon></a></li>
         <li><a href="#"><ion-icon name="logo-linkedin"></ion-icon></a></li>
         <li><a href="#"> <ion-icon name="logo-instagram"></ion-icon></a></li>
      </ul>

      <ul class="navbar-nav navbar-nav-mobile">
        <li><a class="nav-link" href="#home">Home</a></li>
        <li><a class="nav-link" href="#about">About</a></li>
        <li><a class="nav-link" href="#experience">Experience</a></li>
        <li><a class="nav-link" href="#projects">Projects</a></li>
        <li><a class="nav-link" href="#testimonials">Testimonials</a></li>
       </ul>
       <div class="navbar-mobile-footer">
        <p>© 2020 Richard. All Rights Reserved.</p>
       </div>
    </nav>
    @foreach($all_banners as $banner)
    <main id="home" class="masthead jarallax" role="main" style="background-image:url('{{asset('public/uploads/banners/')}}/{{$banner->banner_image}}');">
      <div class="opener">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-lg-5">
              <h1>{{$banner->introduction}}</h1>
              <p class="lead mt-4 mb-5">{{$banner->description}}</p>
              <button type="button" class="btn" data-toggle="modal" data-target="#send-request">Let's talk</button>
          </div>
          </div>
          @endforeach
        </div>
      </div>
   </main>
   <!-- Header End -->
   @yield('content')
    <!-- Footer -->  
    <footer>
      <div class="section bg-dark py-5 pb-0">
        <div class="container">
          <div class="row">
          @foreach($all_contacts as $contact)
            <div class="col-md-6 col-lg-3">
             <h6 class="text-white mb-4">Email:</h6>
             <p class="text-white mb-4">{{$contact->email}}</p>
            </div>
            <div class="col-md-6 col-lg-3">
             <h6 class="text-white mb-4">Phone:</h6>
             <p class="text-white mb-4">{{$contact->phone}}</p>
            </div>
            <div class="col-md-6 col-lg-3">
              <h6 class="text-white mb-4">Follow me:</h6>
              <img alt="" width="80px" height="80px" src="{{asset('public/uploads/contacts/')}}/{{$contact->icon_image}}">
            </div>
            <div class="col-md-6 col-lg-3">
              <h6 class="text-white mb-4">Subscribe:</h6>
              <form class="js-subscribe-form">
                <div class="input-group">
                  <input id="mc-email" type="email" class="form-control" placeholder="{{$contact->email}}">
                  <div class="input-group-append">
                    <button class="btn" type="submit">Go</button>
                  </div>
                </div>
                <label class="mc-label" for="mc-email" id="mc-notification"></label>
              </form>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <div class="footer-copy section-sm">
        <div class="container">© Copyright 2020 Richard. All Rights Reserved</div>
       </div>
    </footer>
     
    <!-- Modal -->
    <div class="modal fade" id="send-request">
    @foreach($all_politelies as $politely)
      <div class="modal-dialog modal-dialog-centered" role="document">
       <div class="modal-content">
          <div class="modal-header">
          <h2 class="modal-title mt-0">Send request</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Leave your contacts and our managers
            will contact you soon.</p>
           <form class="form-request js-ajax-form">
             <div class="form-group">
               <input type="text" name="name" class="form-control" placeholder="{{$politely->name}}">
            </div>
             <div class="form-group">
               <input type="email" name="email"  class="form-control" required="" placeholder="{{$politely->email}}*">
             </div>
             <div class="form-group">
              <textarea rows="3" name="message"  class="form-control" placeholder="{{$politely->message}}"></textarea>
             </div>
             <div class="message" id="success-message">Your message is successfully sent...</div>
             <div class="message" id="error-message">Sorry something went wrong</div>
             <div class="form-group mb-0 text-right">
               <button type="submit" class="btn">Submit</button>
             </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  
    
<!-- Optional JavaScript -->
<script src="{{asset('frontend_asset/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend_asset/js/popper.min.js')}}" ></script>
<script src="{{asset('frontend_asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend_asset/https://unpkg.com/ionicons@5.0.0/dist/ionicons.js')}}"></script>
<script src="{{asset('frontend_asset/js/jarallax.min.js')}}"></script>
<script src="{{asset('frontend_asset/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('frontend_asset/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('frontend_asset/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('frontend_asset/js/aos.js')}}"></script>
<script src="{{asset('frontend_asset/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend_asset/js/interface.js')}}"></script>
</body>
</html>