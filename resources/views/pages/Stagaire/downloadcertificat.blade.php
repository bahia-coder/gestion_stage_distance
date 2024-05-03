<!DOCTYPE html>
<html lang="en">
<head>
<style>

  .signature {
    text-align: right; /* Alignement à droite */
    margin-top: 0; /* Marge supérieure */
  }

  .signature img {
    margin-top: 20px;
    width: 120px; /* Largeur de l'image réduite */
    height: auto; /* Hauteur automatique pour conserver les proportions */
  }
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
    margin-bottom: 5px;
    width:80%;
    margin-left:10%;
  }

  .margin-0 {
    margin: 0;
  }

  .padding-0 {
    padding: 0;
  }

  .pm-empty-space {
    height: 0px;
    width: 100%;
  }

  .pm-certificate-container {
    position: relative;
    max-width: 700px; /* Utiliser max-width à la place de width */
    margin: 0 auto; /* Centre le certificat horizontalement */
    
    height: 600px; /* Ajustement de la taille du conteneur */
    background-color: #618597;
    padding: 30px;
    color: #333;
    font-family: 'Open Sans', sans-serif;
    box-shadow: 0 0 5px rgba(0, 0, 0, .5);
  }

  .outer-border {
      width: 100%; /* Utilisez 100% de la largeur du conteneur parent */
      height: 100%; /* Utilisez 100% de la hauteur du conteneur parent */
      position: absolute;
      left: 0;
      top: 0;
      border: 2px solid #fff;
      box-sizing: border-box; /* Assurez-vous que la largeur inclut les bordures */
  }

  .inner-border {
      width: 90%; /* Calculez la largeur en soustrayant la taille des bordures */
      height: 80% ; /* Calculez la hauteur en soustrayant la taille des bordures */
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%); /* Centre le border-box */
      border: 2px solid #fff;
      box-sizing: border-box; /* Assurez-vous que la largeur inclut les bordures */
  }

  .pm-certificate-border {
    position: relative;
    width: 650px; /* Ajustement de la largeur du certificat */
    height: 600px; /* Ajustement de la hauteur du certificat */
    padding: 0;
    border: 1px solid #E1E5F0;
    background-color: rgba(255, 255, 255, 1);
    background-image: none;
    left: 50%;
    margin-left: -325px; /* Ajustement de la marge gauche */
    top: 50%;
    margin-top: -300px; /* Ajustement de la marge supérieure */
  }


  .pm-certificate-block {
      width: 650px; /* Ajustement de la largeur du bloc de contenu underline*/
      height: 200px; /* Ajustement de la hauteur du bloc de contenu */
      position: relative;
      left: 50%;
      margin-left: -325px; /* Ajustement de la marge gauche */
      top: 70px;
      margin-top: 0;
  }

  

  .pm-certificate-title h2 {
      font-size: 34px !important;
  }

  .pm-certificate-body {
      padding: 10px;
  }

  .pm-name-text {
      font-size: 20px;
  }

  .pm-earned {
      margin: 15px 0 20px;
  }

  .pm-earned-text {
      font-size: 20px;
  }

  .pm-credits-text {
      font-size: 15px;
  }

  .pm-course-title .pm-earned-text {
      font-size: 20px;
  }

  .pm-course-title .pm-credits-text {
      font-size: 15px;
  }

  p {
      font-family: Arial, sans-serif;
      font-size: 12px;
      font-weight: bold;
  }

  .pm-certified {
      font-size: 12px;
  }

  .underline {
      margin-bottom: 5px;
  }

  .pm-certificate-footer {
      width: 650px;
      height: 100px;
      position: relative;
      left: 50%;
      margin-left: -325px;
      bottom: -70px;
  }

</style>
</head>
<body>
  <center>
  <div class="container pm-certificate-container">
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
                <div class="col-xs-2"></div>
                <div class="pm-certificate-name underline  col-xs-8 text-center">
                  <span class="pm-name-text bold">{{$user->FullName}}</span>
                </div>
                <div class="col-xs-3"></div>
              </div>
            </div>          

            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"></div>
                <div class="pm-earned col-xs-8 text-center">
                  <span class="pm-earned-text padding-0 block cursive">successfully completed</span>
                  <span class="pm-credits-text block bold sans">Remote Internship</span>
                </div>
                <div class="col-xs-2"></div>
                <div class="col-xs-12"></div>
              </div>
            </div>
            
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"></div>
                <div class="pm-course-title col-xs-8 text-center">
                  <span class="pm-earned-text block cursive">in the department of :</span>
                </div>
                <div class="col-xs-2"></div>
              </div>
            </div>
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-2"></div>
                <div class="pm-course-title underline col-xs-8 text-center">
                  <span class="pm-credits-text block bold sans">{{$user->departements->nom}}</span>
                </div>
                <div class="col-xs-2"></div>
              </div>
            </div>
        </div>       

        <!-- Script pour le certificat de stage -->
        <div class="col-xs-12">
          <div class="row">
            <div class="pm-certificate-footer">
                <div class="col-xs-12 pm-certified text-center">
                  <p>I, Abd ljalile aglagane, Director of [Company Name], certify that {{$user->FullName}} has completed an internship at our company from {{$user->Date_debut}} To {{$user->Date_fin}}. During this period, the intern has demonstrated exemplary commitment and professionalism.
                    
                  </p>
                  <p>
                  We wish @if($user->Gender_id==1) him @else her @endif every success in @if($user->Gender_id==1) his @else her @endif future endeavors.
                    
                  </p>
                  <div class="signature">
                    <img src="https://assets-global.website-files.com/61d7de73eec437f52da6d699/62161cf7328ad280841f653f_esignature-signature.png" alt="Signature">
                      
                    </div>
                  
                </div>
            </div>
          </div>
        </div>
        <!-- Fin du script -->

      </div>

    </div>
  </div>
  </center>
</body>
</html>
