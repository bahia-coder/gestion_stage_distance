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
          <h1>Bettter Digital Experience With BrightStar Solutions,</h1>
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

        <div class="section-header">
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
              <h4>Experienced Team</h4>
              <p>We have a team of experienced professionals dedicated to delivering exceptional results.</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="200">
              <i class="bx bx-cube-alt"></i>
              <h4>Efficient Workflow</h4>
              <p>Our streamlined workflow ensures timely delivery without compromising quality.</p>
            </div>
            <div class="icon-box mt-5" data-aos="fade-up" data-aos-delay="300">
              <i class="bx bx-images"></i>
              <h4>Quality Assurance</h4>
              <p>We adhere to the highest standards of quality assurance to exceed customer expectations.</p>
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
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Meet the talented individuals who make up our team! With a diverse range of skills and expertise, our team is dedicated to delivering exceptional results and exceeding expectations. Get to know us better:</p>
        </div>

        <div class="row">

          @foreach($list_Employes as $employe)
          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="{{asset('storage/imgs/'.$employe->photo) }}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>{{$employe->FullName}}</h4>
                  <span>{{$employe->departements->nom}}</span>
                </div>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
          @endforeach

          

          

          

        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Testimonials</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="{{ URL::asset('assets/img/testimonials/testimonials-1.jpg')}}" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
              </div>
            </div><!-- End testimonial item -->



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
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.030469799705!2d-7.585481425218134!3d33.37027585343363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda63a975723fb01%3A0x36a43ade39731673!2sA%C3%A9roport%20international%20Mohammed%20V%20de%20Casablanca!5e1!3m2!1sfr!2sma!4v1713128307661!5m2!1sfr!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                  <input type="text" name="Name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="Email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-6 form-group mt-3">
                  <input type="text" name="Address" class="form-control" id="Address" placeholder="Your Address" required>
                </div>
                <div class="col-md-6 form-group  mt-3 md-0">
                  <input type="test" class="form-control" name="Telephone" id="phone" placeholder="Your Phone" required>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-6 form-group">
                <label for="date-debut">date-debut</label>
                  <input type="date" name="Date_debut" class="form-control" id="debut" placeholder="Date_debut" required>
                </div>
                
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="date_fin">date_fin</label>
                  <input type="date" class="form-control" name="Date_fin" id="date_fin" placeholder="Date_fin" required>
                </div>
              </div>
              <div class="row ">
                <div class="col-md-6 form-group">
                <label for="inputState">Departement</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                        <option selected disabled>Departement...</option>
                                        @foreach($list_Departements as $departement)
                                            <option value="{{$departement->id}}">{{$departement->nom}}</option>
                                        @endforeach
                                    </select>
                </div>
                <div class="col-md-6 form-group">
                <label for="inputState">Gender</label>
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
                <label for="photo">Photo</label>
                  <input type="file" name="photo" class="form-control" id="photo"  required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                <label for="cv">Your CV</label>
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
    font-size: 16px;">Send Demmande</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
 
  
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

 

  @include('page_index.footer-scripts')
</body>

</html>