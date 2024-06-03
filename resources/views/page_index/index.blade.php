<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @include('page_index.head')
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
 

  <!-- =======================================================
  * Template Name: Techie
  * Template URL: https://bootstrapmade.com/techie-free-skin-bootstrap-3/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  @include('page_index.main-header')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container-fluid" data-aos="fade-up">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 pt-3 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>REAL TECH:</h1>
          <h2> "Through our remote internship management platform, interns are assigned projects to work on, gaining valuable hands-on experience. Upon completion of the program, they receive online certificates to validate their acquired skills."</h2>
          <div><a href="/selection" class="btn-get-started scrollto">Se connecter</a></div>
        </div>
        <div class="col-xl-4 col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">
          <img src="{{ URL::asset('assets/img/hero-img.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="150">
            <img src="{{ URL::asset('assets/img/about.jpg')}}" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>About Us</h3>
            <p class="fst-italic">
            {{ $setting['about'] }}
          
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
       <!-- ======= Services Section ======= -->
       <section id="departements" class="departements">
      <div class="container" data-aos="fade-up">

        <div class="section-title" data-aos="fade-up">
          <h2>Our Departements</h2>
          <p>our organization, we house a variety of specialized departments, each playing a crucial role in our overall mission:</p>
        </div>

        <div class="row gy-5">
        @foreach($list_Departements as $departement)
          <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
            <div class="departement-item">
              <div class="img">
                <img src="{{asset('storage/imgs/'.$departement->path)}}" width="400" height="200" alt="">
              </div>
              <div class="details position-relative">
                <div class="icon">
                  <i class="bi bi-activity"></i>
                </div>
                <a href="#" class="stretched-link">
                  <h3>{{$departement->nom}}</h3>
                </a>
                <p>{{$departement->description}}</p>
              </div>
            </div>
          </div><!-- End departement Item -->
@endforeach
          

         

        </div>

      </div>
    </section><!-- End departements Section -->

     <!-- ======= Services Section ======= -->
     <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p> Our internship program offers practical and engaging experiences, along with exceptional support and resources to ensure our interns' success.</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Remote Training:</a></h4>
              <p class="description"> Our program includes virtual training sessions led by industry experts to help you acquire the necessary skills in your field of interest.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Personalized Tracking:</a></h4>
              <p class="description"> Our dedicated supervisors will offer regular check-ins to discuss your progress, address your queries, and provide necessary guidance to help you achieve your goals.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Assessments and Feedback:</a></h4>
              <p class="description"> We'll provide regular assessments and constructive feedback to help you identify strengths and areas for improvement.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Online Platform for Internship Management: </a></h4>
              <p class="description">We've developed a user-friendly digital platform where you can access all essential internship information, submit your work, and interact with your colleagues and supervisors.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->
   

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Features</h2>
          <p>Discover the key features that make our company stand out from the rest.</p>
        </div>

        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column align-items-lg-center">
            <div class="icon-box mt-5 mt-lg-0" data-aos="fade-up" data-aos-delay="100">
              <i class="bx bx-receipt"></i>
              <h4>Remote Mentorship Programs</h4>
              <p>
Get tailored support from seasoned pros, boosting your skills no matter where you are.</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-cube-alt"></i>
              <h4>Flexible Remote Work Environment</h4>
              <p>
Enjoy the flexibility of remote work arrangements while gaining valuable hands-on experience.</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-images"></i>
              <h4>Virtual Performance Evaluation</h4>
              <p>
Receive constructive feedback and performance evaluations through virtual platforms, ensuring transparency and growth opportunities in your remote internship.</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="400">
              <i class="bx bx-shield"></i>
              <h4>Professional Development</h4>
              <p>Enhance your skills and expand your knowledge through hands-on projects and mentorship.</p>
            </div>
          </div>
          <div class="image col-lg-6 order-1 order-lg-2 " data-aos="zoom-in" data-aos-delay="100">
            <img src="{{ URL::asset('assets/img/features.svg')}}" alt="" class="img-fluid">
          </div>
        </div>

      </div>
    </section><!-- End Features Section -->
       

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>
Discover the Inspiring Testimonials from Our Former Trainees.</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            @foreach($testimonials as $testimonial)
            <div class="swiper-slide">
            
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                 {{$testimonial->testimonial}}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{asset('storage/imgs/'.$testimonial->Stagaire->photo) }}" class="testimonial-img" alt="">
                <h3>{{$testimonial->Stagaire->FullName}}</h3>
                <h4>{{$testimonial->Stagaire->Departements->nom}}</h4>
              </div>
            </div><!-- End testimonial item -->
            
@endforeach
            

            
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
          <p>Welcome to our remote internship management platform. We're here to assist you in your professional journey. Feel free to reach out to us with any questions or concerns. Please fill out the form below to apply for an internship, and we'll get back to you as soon as possible.</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>{{$setting['address']}}</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>{{$setting['societe_email']}}</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>{{$setting['phone']}}</p>
            </div>
          </div>

        </div>

        <div class="row">

          <div class="col-lg-6 ">
          <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3323.350324365663!2d-7.650848625207412!3d33.59621374167399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sBD%20BOURGOGNE%20RUE%20JAAFAR%20IBNOU%20HABIB%20RESIDENCE%20AL%20MACHRIK%20II%201%C3%A9r%20ETAGE%20N%C2%B0%203%2020050%20CASABLANCA!5e0!3m2!1sfr!2sma!4v1716545843023!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="col-lg-6">
            <form  action="{{route('Demmande.store')}}" method="post" style=" 
    margin: 0 auto;
    height: 400px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #fff;"   enctype="multipart/form-data">
            @csrf  
            <div class="row">
                <div class="col-md-6 form-group">
                  
                <label for="date-debut" style="color:blue;">Full Name</label>
                  <input type="text" name="Name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  
                <label for="date-debut" style="color:blue;">Email</label>
                  <input type="email" class="form-control" name="Email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-6 form-group mt-3">
                  
                <label for="date-debut" style="color:blue;">Address</label>
                  <input type="text" name="Address" class="form-control" id="Address" placeholder="Your Address" required>
                </div>
                <div class="col-md-6 form-group  mt-3 md-0">
                  
                <label for="date-debut" style="color:blue;">Phone</label>
                  <input type="test" class="form-control" name="Telephone" id="phone" placeholder="Your Phone" required>
                </div>
              </div>
              <div class="row " >
                <div class="col-md-6 form-group">
                <label for="date-debut" style="color:blue;">Start date</label>
                  <input type="date" name="Date_debut" class="form-control" id="debut" placeholder="Date_debut" required>
                </div>
                
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="date_fin" style="color:blue;">End date</label>
                  <input type="date" class="form-control" name="Date_fin" id="date_fin" placeholder="Date_fin" required>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-6 form-group">
                <label for="inputState" style="color:blue;">Departement</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                        <option selected disabled>Departement...</option>
                                        @foreach($list_Departements as $departement)
                                            <option value="{{$departement->id}}">{{$departement->nom}}</option>
                                        @endforeach
                                    </select>
                </div>
                <div class="col-md-6 form-group">
                <label for="inputState" style="color:blue;">Gender</label>
                <br>
                                    <select class="custom-select my-1 mr-sm-2 w-100" name="Gender_id">
                                     
                                        <option selected disabled>Gender...</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                        @endforeach
                                    </select>
                                   </div>
              </div>
              <div class="row ">
                <div class="col-md-6 form-group">
                <label for="photo" style="color:blue;">Photo</label>
                  <input type="file" name="photo" class="form-control" id="photo"  required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="cv" style="color:blue;">Your CV</label>
                  <input type="file" class="form-control" name="cv" id="cv"  required>
                </div>
              </div>

              <!-- <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div> -->
              <div class="text-center"><button type="submit" style=" background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    margin:10px;
    border-radius: 3px;
    cursor: pointer;
    font-size: 16px;">Send internship application</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
 <!-- ======= Footer ======= -->
 <footer id="footer" height="100px">

<center>
<div class="footer-top">
  <div class="container">
    <div class="row">
    <div class="col-lg-4 col-md-6 footer-newsletter">
      <img style="color:white;" width="200" height="200"  src="{{asset('storage/imgs/attachments/logo/'. \App\Models\Setting::where('key', 'logo')->value('value') )}}"  alt="" />
      <div class="social-links ">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>  
    </div>
      

      <div class="col-lg-2 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto active" href="#hero">Home</a></li>
      <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto" href="#about">About</a></li>
      <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto" href="#departements">Departements</a></li>
      <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto" href="#services">Services</a></li>
      <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto " href="#features">Features</a></li>
      <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
      <li><i class="bx bx-chevron-right"></i><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
      </div>
      <div class="col-lg-5 col-md-6 footer-contact">
        <h3>Contact</h3>
        <p>
        <i class="material-icons"  style="font-size:14px">&#xe0c8;</i>
        
        BD BOURGOGNE RUE JAAFAR  <br>
        IBNOU HABIB RESIDENCE AL MACHRIK II <br>
        1ér ETAGE N° 3 20050 CASABLANCA<br><br>
          <strong> <span>
              <i class="fa fa-phone" style="font-size:14px"></i>
            </span></strong> {{$setting['phone']}}<br>
          <strong> <span>
              <i class="fa fa-envelope" style="font-size:14px"></i>
            </span></strong> {{$setting['societe_email']}}<br>

        </p>
      </div>
      

      

    </div>
  </div>
</div>
</center>

</footer><!-- End Footer -->
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

 

  @include('page_index.footer-scripts')
  
</body>

</html>