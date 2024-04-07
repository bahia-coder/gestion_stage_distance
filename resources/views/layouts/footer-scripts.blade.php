<!-- Inclure jQuery -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="{{ URL::asset('assets/js/dashboard.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL::asset('assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
  <script src="{{ URL::asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>


<!-- Inclure Popper.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Inclure Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<!-- Inclure les autres scripts -->
<script src="{{ URL::asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="{{ URL::asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.min.js') }}"></script>


<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

</script>
@yield('js')
