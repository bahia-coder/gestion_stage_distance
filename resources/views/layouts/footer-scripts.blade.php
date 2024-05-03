<script src="{{ URL::asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>

<script src="{{ URL::asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
   
    <script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>
<script src="{{ URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    // Activer l'affichage des logs de Pusher dans la console
    Pusher.logToConsole = true;

    // Initialiser Pusher avec votre clé d'application et le cluster approprié
    var pusher = new Pusher('ba72c80e67d1f5460b3d', {
        cluster: 'mt1'
    });

    // Souscrire au canal "my-channel"
    var channel = pusher.subscribe('my-channel');

    // Définir un rappel pour l'événement "pusher:subscription_succeeded"
    channel.bind('pusher:subscription_succeeded', function(data) {
        console.log('Souscription au canal réussie :', data);
        // Vous pouvez effectuer des actions supplémentaires ici si nécessaire
    });

    // Définir un rappel pour l'événement "my-event" sur le canal "my-channel"
    channel.bind('my-event', function(data) {
        console.log('Événement reçu sur le canal :', data);
        // Vous pouvez effectuer des actions supplémentaires ici si nécessaire
    });
</script>
<script src="{{ URL::asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<script type="text/javascript">var plugin_path = '{{ asset('assets/js') }}/';</script>
<script src="{{ URL::asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
@livewireScripts
  <script>
    
  </script>
 
 



<!-- Inclure les autres scripts -->
<script src="{{ URL::asset('assets/js/sidebarmenu.js') }}"></script>
<script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="{{ URL::asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="{{ URL::asset('assets/js/dashboard.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

<!-- Inclure Popper.js ltr-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Inclure Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

@if(session()->has('success'))
    <script>

        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: '{{ session()->get('success') }}',
            showConfirmButton: false,
            timer: 1500,
            customClass: {
                popup: 'swal2-small', // Apply custom CSS class for small size
            }
        });
    </script>
@endif


<script src="{{ asset('js/app.js') }}"></script>




<script>
    $('#demmande').click(function(e) {
  e.preventDefault(); // Empêche le comportement de clic par défaut pour ne pas suivre le lien ApexCharts 
  $(this).next('.sidebar-submenu').slideToggle(); // Basculez la visibilité de l'élément suivant avec la classe 'sidebar-submenu'
});

/* */
$(document).ready(function() {
    var table = $('#datatable').DataTable({
        "lengthMenu": [ [10, 25, 100], [10, 25, 100] ],
        "dom": 'Bfrtip',
        "buttons": [
            {
                extend: 'copy',
                text: '<i class="fas fa-copy text-primary"></i>',
                titleAttr: 'Copy'
            },
            {
                extend: 'excel',
                text: '<i class="fas fa-file-excel text-success"></i>',
                titleAttr: 'Excel'
            },
            {
                extend: 'csv',
                text: '<i class="fas fa-file-csv text-warning"></i>',
                titleAttr: 'CSV'
            },
            {
                extend: 'pdf',
                text: '<i class="fas fa-file-pdf text-danger"></i>',
                titleAttr: 'PDF'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print text-info"></i>',
                titleAttr: 'Print'
            },
            {
                extend: 'colvis',
                text: '<i class="fas fa-columns text-light"></i>',
                titleAttr: 'Column Visibility'
            }
        ]
    });

    // Forcer l'option pageLength à 10 datatable
    table.page.len(10).draw();
}); 



    $(document).ready(function() {
    $('#datepicker-action').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});

</script>
</script>


<script>
    $(document).ready(function () {
        $('select[name="Grade_id"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id"]').empty();
                        $('select[name="Classroom_id"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('select[name="Classroom_id"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>





<script>
    $(document).ready(function () {
        $('select[name="Grade_id_new"]').on('change', function () {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('Get_classrooms') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="Classroom_id_new"]').empty();
                        $('select[name="Classroom_id_new"]').append('<option selected disabled >{{trans('Parent_trans.Choose')}}...</option>');
                        $.each(data, function (key, value) {
                            $('select[name="Classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>


<script>
    $(document).ready(function () {
        $('select[name="Classroom_id_new"]').on('change', function () {
            var Classroom_id = $(this).val();
            if (Classroom_id) {
                $.ajax({
                    url: "{{ URL::to('Get_Sections') }}/" + Classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="section_id_new"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });

                    },
                });
            }

            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>



@yield('js')
