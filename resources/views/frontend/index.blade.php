@extends('frontend.master')

@section('content') 
 <!-- About -->
    <section id="about" class="section">
     <div class="container">
     @foreach($all_introductions as $introduction)
    <h2 data-aos="fade-up">{{$introduction->title}}</h2>
       <section class="mt-4">
          <div class="row">
            <div class="col-md-6 col-lg-5 mb-5 mb-md-0" data-aos="fade-up">
              <p>{{$introduction->description}}</p>
              <div class="experience d-flex align-items-center">
                <div class="experience-number text-parallax">{{$introduction->year}}</div><div class="text-dark mt-3 ml-4">{{$introduction->details}}</div>
              </div>
              @endforeach
            </div>
            <div class="col-md-5 offset-lg-2" data-aos="fade-in" data-aos-delay="50">
            @foreach($all_skills as $skill)
              <h6>{{$skill->skill_type}}</h6>
              <div class="progress mb-5">
                <div class="progress-bar" role="progressbar" data-aos="width" style="width: {{$skill->percentage}}%" aria-valuenow="{{$skill->percentage}}" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
              @endforeach
            </div>
          </div>
        </section>
      </div>
    </section>
    
    <section class="section bg-dark">
     <div class="container">
        <div class="container">
          <div class="row">
          @foreach($all_fronts as $front)
            <div class="col-md-4 mb-4 mb-md-0" data-aos="fade-in" data-aos-delay="150">
              <img src="{{asset('public/uploads/fronts/')}}/{{$front->image}}" width="50px" height="50px" alt="Image">
              <h6 class="text-white">{{$front->title}}</h6>
              <p>{{$front->description}}</p>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
      
     <!-- Experience -->
     <section id="experience" class="section pb-0">
      <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Experience</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="my-0 text-gray"><a href="{{asset('public/uploads/cv/cv.pdf')}}">Dwonload My CV...If You Can</a></h6></div>
        </div>
        <div class="mt-5 pt-5">
        @foreach($all_experiences as $experience)
          <div class="row-experience row justify-content-between" data-aos="fade-up">
            <div class="col-md-4">
              <div class="h6 my-0 text-gray">{{$experience->duration}}</div>
              <h5 class="mt-2 text-primary text-uppercase">{{$experience->company_name}}</h5>
            </div>
            <div class="col-md-4">
              <h5 class="mb-3 mt-0 text-uppercase">{{$experience->designation}}</h5>
            </div>
            <div class="col-md-4">
              <p>{{$experience->details}}</p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    
    <!-- Projects -->
    <section id="projects" class="section">
     <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Featured projects</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="my-0 text-gray"><a href="#">View all projects</a></h6></div>
        </div>
        <div class="mt-5 pt-5" data-aos="fade-in">
          <div class="carousel-project owl-carousel">
          @foreach($all_projects as $project)
           <div class="project-item">
              <a href="#project1" class="popup-with-zoom-anim">
                <figure class="position-relative">
                <img src="{{asset('public/uploads/projects/')}}/{{$project->image}}" alt="" class="w-100">
                  <figcaption class="text-white">
                    <h3 class="mb-2 text-white">{{$project->title}}</h3>
                    <p>{{$project->category}}</p>
                  </figcaption>
                </figure>
              </a>
           </div>
         </div>
        </div>
      </div>
    </section>
    <!-- Project Modal Dialog 1 -->
    <div id="project1" class="container mfp-hide zoom-anim-dialog">
      <h2 class="mt-0">{{$project->title}}</h2>
      <div class="mt-5 pt-2 text-dark">
        <div class="row">
          <div class="mb-5 col-md-6 col-lg-3">
            <h6 class="my-0">Clients:</h6>
            <span>{{$project->client}}</span>
          </div>
          <div class="mb-5 col-md-6 col-lg-3">
            <h6 class="my-0">Completion:</h6>
            <span>{{$project->completion}}</span>
          </div>
          <div class="mb-5 col-md-6 col-lg-3">
            <h6 class="my-0">Project Type:</h6>
            <span>{{$project->type}}</span>
          </div>
          <div class="mb-5 col-md-6 col-lg-3">
            <h6 class="my-0">Authors</h6>
            <span>{{$project->author}}</span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6 class="my-0">Budget:</h6>
            <span>{{$project->budget}}</span>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6 class="my-0">Authors</h6>
            <span>{{$project->author}}</span>
          </div>
        </div>
      </div>
      <img src="{{asset('public/uploads/projects/')}}/{{$project->image}}" alt="" class="mt-5 pt-2 w-100">
    </div>
    @endforeach
    </div>  
    <!-- Testimonials -->
    <section id="testimonials" class="testimonials section">
      <div class="container">
         <div class="carousel-testimonials owl-carousel">
         @foreach($all_testimonials as $testimonial)
           <div class="col-testimonial" data-aos="fade-up">
              <span class="quiote">"</span>
              <p data-aos="fade-up">{{$testimonial->descripotion}}</p>
              <p class="mt-5 text-dark" data-aos="fade-up"><strong>{{$testimonial->testimonial_name}}</strong> - {{$testimonial->designation}}</p>
           </div>
           @endforeach
         </div>
       </div>
    </section>

     <!-- News -->
    <section id="news" class="section bg-light">
     <div class="container">
        <div class="row align-items-end">
          <div class="col-md-6" data-aos="fade-up"><h2 class="mb-3 mb-md-0">Latest news</h2></div>
          <div class="col-md-5 offset-md-1 text-md-right"><h6 class="text-gray my-0"><a href="#">View all news</a></h6></div>
        </div>
        <div class="mt-5 pt-5">
          <div class="row-news row">
          @foreach($all_newses as $news)
            <div class="col-news col-md-6 col-lg-4" data-aos="fade-in" data-aos-delay="0">
              <figure class="position-relative">
                <div class="position-relative">
                  <a href=""><img alt="" class="w-100 d-block" src="{{asset('public/uploads/newses/')}}/{{$news->image}}"></a>
                  <mark class="date">{{$news->created_at}}</mark>
                </div>
                <figcaption><h5><a href="">{{$news->title}}</a></h5>{{$news->description}}
                </figcaption>
              </figure>
            </div>
            @endforeach
         </div>
        </div>
      </div>
    </section>

    <!-- Partners -->
    <section class="section-sm">
       <div class="container">
         <div class="row-partners row">
         @foreach($all_sponsors as $sponsor)
         <div class="col-partner col-md-6 col-lg-3" data-aos="fade-in" data-aos-delay="50">
              <img alt="" width="80px" height="80px" src="{{asset('public/uploads/sponsors/')}}/{{$sponsor->sponsor_image}}">
           </div>
           @endforeach
         </div>
       </div>
    </section>

@endsection