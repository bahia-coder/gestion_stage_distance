@extends('layouts.master_stagaire')
@section('title')
    Home
@endsection
@section('css')
    <style>
  .signature {
    text-align: right; /* Alignement à droite */
    margin-top: 10px; /* Marge supérieure */
  }

  .signature img {
    width: 150px; /* Largeur de l'image */
    height: auto; /* Hauteur automatique pour conserver les proportions */
  
  }
</style>
<style>
            @import url('https://fonts.googleapis.com/css?family=Open+Sans|Pinyon+Script|Rochester');

.cursive {
  font-family: 'Pinyon Script', cursive;
}

.sans {
  font-family: 'Open Sans', sans-serif;
}

.bold {
  font-weight: bold;
}

.block {
  display: block;
}

.underline {
  border-bottom: 1px solid #777;
  padding: 5px;
  margin-bottom: 15px;
}

.margin-0 {
  margin: 0;
}

.padding-0 {
  padding: 0;
}

.pm-empty-space {
  height: 40px;
  width: 100%;
}



.pm-certificate-container {
  margin: 20px auto;
  position: relative;
  width: 800px;
  margin-top:20px;
  height: 600px;
  background-color: #618597;
  padding: 30px;
  
  color: #333;
  font-family: 'Open Sans', sans-serif;
  box-shadow: 0 0 5px rgba(0, 0, 0, .5);
  /*background: -webkit-repeating-linear-gradient(
    45deg,
    #618597,
    #618597 1px,
    #b2cad6 1px,
    #b2cad6 2px
  );
  background: repeating-linear-gradient(
    90deg,
    #618597,
    #618597 1px,
    #b2cad6 1px,
    #b2cad6 2px
  );*/
  
  .outer-border {
    width: 794px;
    height: 594px;
    position: absolute;
    left: 50%;
    margin-left: -397px;
    top: 50%;
    margin-top:-297px;
    border: 2px solid #fff;
  }
  
  .inner-border {
    width: 730px;
    height: 530px;
    position: absolute;
    left: 50%;
    margin-left: -365px;
    top: 50%;
    margin-top:-265px;
    border: 2px solid #fff;
  }

  .pm-certificate-border {
    position: relative;
    width: 720px;
    height: 520px;
    padding: 0;
    border: 1px solid #E1E5F0;
    background-color: rgba(255, 255, 255, 1);
    background-image: none;
    left: 50%;
    margin-left: -360px;
    top: 50%;
    margin-top: -260px;

    .pm-certificate-block {
      width: 650px;
      height: 200px;
      position: relative;
      left: 50%;
      margin-left: -325px;
      top: 70px;
      margin-top: 0;
    }

    .pm-certificate-header {
      margin-bottom: 10px;
    }

    .pm-certificate-title {
      position: relative;
      top: 40px;

      h2 {
        font-size: 34px !important;
      }
    }

    .pm-certificate-body {
      padding: 20px;

      .pm-name-text {
        font-size: 20px;
      }
    }

    .pm-earned {
      margin: 15px 0 20px;
      .pm-earned-text {
        font-size: 20px;
      }
      .pm-credits-text {
        font-size: 15px;
      }
    }

    .pm-course-title {
      .pm-earned-text {
        font-size: 20px;
      }
      .pm-credits-text {
        font-size: 15px;
      }
    }
  p{
      font-family: Arial, sans-serif;
      font-size:12px;
      font-weight: bold;
  }
    .pm-certified {
      font-size: 12px;

      .underline {
        margin-bottom: 5px;
      }
    }

    .pm-certificate-footer {
      width: 650px;
      height: 100px;
      position: relative;
      left: 50%;
      margin-left: -325px;
      bottom: -70px;
    }
  }
}
</style>
<style>
    /* Styles for the testimonial form */
    .testimonial-image {
        width: 400px;
        margin-bottom: 30px; /* Augmenter l'espacement sous l'image */
        animation: up-down 2s ease-in-out infinite;
    }

    @keyframes up-down {
        0% {
            transform: translateY(0); /* Début de l'animation : pas de translation */
        }
        50% {
            transform: translateY(-10px); /* À mi-chemin de l'animation : translation vers le haut */
        }
        100% {
            transform: translateY(0); /* Fin de l'animation : retour à la position initiale */
        }
    }

    .testimonial-form {
       
        max-width: 700px; /* Réduire légèrement la largeur du formulaire */
        padding: 20px; /* Ajouter de l'espace intérieur */
        border-radius: 10px; /* Rendre les coins plus arrondis */
        background-color: white; /* Couleur de fond */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Ajouter une ombre */
        transition: all 0.3s ease; /* Ajouter une transition pour une apparence plus fluide */
    }

    .testimonial-form h5 {
        font-size: 18px; /* Réduire légèrement la taille de la police */
        color: black; /* Couleur du texte */
        margin-bottom: 20px; /* Ajouter de l'espace sous le titre */
    }

    .testimonial-form label {
        font-weight: bold;
        color: #007bff;
    }

    textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

    .testimonial-submit {
        margin-top: 20px;
        text-align: right;
    }

    .testimonial-submit button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease; /* Ajouter une transition pour l'animation au survol */
    }

    .testimonial-submit button:hover {
        background-color: #0056b3; /* Couleur au survol */
    }
    h5{
      margin-top:30px;
      margin-left:30px;
      margin-right:30px;
    }
    h5 strong p{
     
      font-family: Georgia, serif;
      font-size:20px;
}
</style>
<style>
    * {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}



#notfound {
  position: relative;
  height: 100vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 410px;
  width: 100%;
  text-align: center;
}

.notfound .notfound-404 {
  height: 280px;
  position: relative;
  z-index: -1;
}

.notfound .notfound-404 h1 {
  font-family: 'Montserrat', sans-serif;
  font-size: 200px;
  margin: 0px;
  padding-top:80px;
  height:100%;
  font-weight: 900;
  position: absolute;
  left: 50%;
  -webkit-transform: translateX(-50%);
      -ms-transform: translateX(-50%);
          transform: translateX(-50%);
  background: url({{ URL::asset('assets/images/bg.jpg') }}) no-repeat;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-size: cover;
  background-position: center;
}


.notfound h2 {
  font-family: 'Montserrat', sans-serif;
  color: #000;
  font-size: 24px;
  font-weight: 700;
  text-transform: uppercase;
  margin-top: 0;
}

.notfound p {
  font-family: 'Montserrat', sans-serif;
  color: #000;
  font-size: 14px;
  font-weight: 400;
  margin-bottom: 20px;
  margin-top: 0px;
}

.notfound a {
  font-family: 'Montserrat', sans-serif;
  font-size: 14px;
  text-decoration: none;
  text-transform: uppercase;
  background: #0046d5;
  display: inline-block;
  padding: 15px 30px;
  border-radius: 40px;
  color: #fff;
  font-weight: 700;
  -webkit-box-shadow: 0px 4px 15px -5px #0046d5;
          box-shadow: 0px 4px 15px -5px #0046d5;
}


@media only screen and (max-width: 767px) {
    .notfound .notfound-404 {
      height: 142px;
    }
    .notfound .notfound-404 h1 {
      font-size: 112px;
    }
}

</style>
@endsection

@section('content')
<div class="container-fluid" >
  @if($user->date_fin < date('Y-m-d'))
  <div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
			</div>
			<h2> INTERNSHIP CERTIFICATE UNAVAILABLE</h2>
			<p>The certificate you are looking for is currently unavailable. It's possible that your internship period has not yet ended, or other circumstances prevent its access at the moment. Please try again later.</p>
			<a href="/stagaire/dashboard">Go To Homepage</a>
		</div>
	</div>
@else

@if($testimonial==null)
    <div class="row justify-content-center align-items-center">
    <center><h5><strong> <p>We're constantly striving to enhance our services,</p>
                         <p>and your feedback is immensely important to us.</p> 
                         <p>Would you mind taking a moment to share</p>
                         <p> your experience as a testimonial before</p>
                         <p>  we display your certificate?</p>

 </strong></h5></center>
     <!-- Utilisation de la classe 'justify-content-center' pour centrer horizontalement et 'align-items-center' pour centrer verticalement -->
        <div class="col-md-6"> <!-- Utilisation d'une colonne Bootstrap pour l'image -->
            <center>
                <img src="{{ URL::asset('assets/images/test.png') }}" alt="" class="testimonial-image img-fluid animated">
            </center>
        </div>
        <div class="col-md-6"> <!-- Utilisation d'une colonne Bootstrap pour le formulaire -->
            
            <div class="testimonial-form">
                
                <form action="{{ route('Testimonial.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="testimonial">Your Testimonial:</label>
                        <textarea class="form-control" id="testimonial" name="testimonial" rows="5" placeholder="Write your testimonial here..." required></textarea>
                    </div>
                    <div class="testimonial-submit">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
            </div>
           @else
           <div>
  <a href="/download_certificat" > <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Icons8_flat_download.svg/2048px-Icons8_flat_download.svg.png" alt="" style="width:80px;height:80px;"></a>

</div>
           <div class=" pm-certificate-container">
    <div class="outer-border"></div>
    <div class="inner-border"></div>
    
    <div class="pm-certificate-border col-xs-12">
      <div class="row pm-certificate-header">
        <div class="pm-certificate-title cursive col-xs-12 text-center">
          <h2>Internship Certificate</h2>
        </div>
      </div>

      <div class="row pm-certificate-body">
        
        <div class="pm-certificate-block">
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="pm-certificate-name underline margin-0 col-xs-8 text-center">
                  <span class="pm-name-text bold">{{$user->FullName}}</span>
                </div>
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
              </div>
            </div>          

            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="pm-earned col-xs-8 text-center">
                  <span class="pm-earned-text padding-0 block cursive">successfully completed</span>
                  <span class="pm-credits-text block bold sans">Remote Internship</span>
                </div>
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="col-xs-12"></div>
              </div>
            </div>
            
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="pm-course-title col-xs-8 text-center">
                  <span class="pm-earned-text block cursive">in the department of:</span>
                </div>
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
              </div>
            </div>

            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                <div class="pm-course-title underline col-xs-8 text-center">
                  <span class="pm-credits-text block bold sans">{{$user->departements->nom}}</span>
                </div>
                <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
              </div>
            </div>
        </div>       

        <!-- Script for the internship certificate -->
        <div class="col-xs-12">
          <div class="row">
            <div class="pm-certificate-footer">
                <div class="col-xs-12 pm-certified text-center">
                  <p>
                    I, Abd ljalile aglagane, Director of [Company Name], certify that {{$user->FullName}} has completed an internship at our company from {{$user->Date_debut}} to {{$user->Date_fin}}. During this period, the intern has demonstrated exemplary commitment and professionalism.
                  </p>
                  <p>
                  We wish @if($user->Gender_id==1) him @else her @endif every success in @if($user->Gender_id==1) his @else her @endif future endeavors.
                  </p>
                  <p>
                    
                    <div class="signature">
                    <span class="bold">Signature</span>
                    <img src="https://assets-global.website-files.com/61d7de73eec437f52da6d699/62161cf7328ad280841f653f_esignature-signature.png" alt="Signature">
    </div>
                  </p>
                </div>
            </div>
          </div>
        </div>
        <!-- End of script -->

      </div>

    </div>
  </div>
            @endif
            @endif
    </div>
</div>
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection
