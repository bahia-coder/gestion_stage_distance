 <!-- Vendor JS Files -->
 <script src="{{ URL::asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ URL::asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ URL::asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<script src="{{ URL::asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
   
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
  <!-- Template Main JS File -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="{{ URL::asset('assets/js/main.js') }}"></script>
<!-- Inclure le fichier toastr.min.js -->


<!-- Appeler la fonction d'initialisation du Toastr après le chargement complet de la page -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        function afficherError() {
            @php
                if (Session::has('error')) {
                    $error = Session::get('error');
                }
            @endphp
            @isset($error)
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "toastClass": "toast-error",
                    "hideMethod": "fadeOut"
                };
                toastr.error("{{ $error }}");
            @endisset
        }

        // Appeler la fonction pour afficher les erreurs
        afficherError();

        // Fonction pour afficher le Toastr si un message est présent dans la session
        function afficherToastr() {
            @php
                if (Session::has('message')) {
                    $message = Session::get('message');
                }
            @endphp

            // Si le message existe, afficher le message Toastr
            @isset($message)
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut",
                    "toastClass": "toast-success" // Ajouter la classe pour la couleur verte
                };
                toastr.success('{{ $message }}');
            @endisset
        }

        // Appeler la fonction pour afficher le Toastr
        afficherToastr();
    });
</script>


  @yield('js')