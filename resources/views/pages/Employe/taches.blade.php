@extends('layouts.master_employe')
@section('css')
<style>
    /* Styles pour améliorer l'apparence de la page */
.container-fluid {
    margin-top: 20px;
    margin-bottom: 20px;
}
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
.table {
    width: 100%;
    border-collapse: collapse; /* Ajouter des coins arrondis aux bords du tableau */
    overflow: hidden; /* Cacher tout contenu débordant du tableau */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ajouter une légère ombre pour un effet de profondeur */
}

.table th,
.table td {
    padding: 12px;
    border:  solid #ddd;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
    text-align: center; /* Centrer le texte dans les cellules de l'en-tête */
}

.table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.table tbody tr:hover {
    background-color: #ddd;
}

.table thead th:first-child,
.table tbody td:first-child {
    text-align: center;
}

.table thead th:last-child,


.table tbody td {
    text-align: center; /* Centrer le texte dans les cellules du corps du tableau */
    vertical-align: middle; /* Aligner le contenu verticalement au centre */
}

/* Ajouter une transition douce pour les couleurs de fond au survol */
.table tbody tr {
    transition: background-color 0.3s ease;
}

/* Ajouter une bordure inférieure aux cellules de l'en-tête */
.table th {
    border-bottom:  solid #ddd;
}

/* Styler la barre de défilement horizontale */
.table-responsive::-webkit-scrollbar {
    width: 10px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background-color: #ccc;
}

.table-responsive::-webkit-scrollbar-track {
    background-color: transparent;
}

</style>
@section('title')
    {{ trans('Employe_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Employe_trans.title_page') }}
@stop
<!-- breadcrumb i++  times-->
@endsection
@section('content')
    <!-- row -->
    
<div class="container-fluid">





<div class="row">
    <div class="col-xl-9 mb-30" >
        <div class="card card-statistics h-100">
            <div class="card-body ">
                <!-- Gestion des erreurs -->
                
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <!-- Boutons d'ajout et de suppression -->
                <button type="button" class=" btn-info btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Add new task
                </button>
                <button type="button" class="btn-info btn-sm" id="btn_delete_all" data-toggle="modal" >
                Delete the selection
                </button>
                <br><br>

               

             

                <!-- Tableau des classes -->
                <div class="table-responsive">
    <table id="datatable" class="table table-hover table-sm table-bordered p-0 " data-page-length="50" style="text-align: center;">
        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>Task</th>
                                <th>start_date</th>
                                <th>end_date</th>
                                <th>assignment</th>
                                <th>Processes</th>
                            </tr>
                        </thead>
                        <tbody>

@if (isset($details))

    <?php $List_Taches = $details; ?>
@else

    <?php $List_Taches = $Taches; ?>
@endif

    <?php $i = 0; ?>

    @foreach ($List_Taches as $tache)
        <tr>
            <?php $i++; ?>
            <td><input type="checkbox"  value="{{ $tache->id }}" class="box1" ></td>
            <td>{{ $i }}</td>
            <td>{{ $tache->Title }}</td>
            <td>{{ $tache->start}}</td>
            <td>{{ $tache->end}}</td>
            @if( $tache->assignment==null)
            <td>----------</td>
            @else
            <td><a href="{{asset('storage/imgs/'.$tache->assignment) }}" class="fas fa-file-download text-success" style='font-size:24px'></a></td>
            @endif
            <td>
                
                        @if( $tache->assignment==null)
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#edit{{ $tache->id }}"
                    title="edit"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete{{ $tache->id }}"
                    title="delete"><i
                        class="fa fa-trash "></i></button>
                        
                        @else
                        <a href="/Note/Totale/{{ $tache->id }}/{{ $id }}" > <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                    data-target="#noter{{ $tache->id }}"
                    title="100%"><i
                        class="	fa fa-star"></i></button></a>
                        <a href="/Note/Half/{{ $tache->id }}/{{ $id }}" ><button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                    data-target="#noter{{ $tache->id }}"
                    title="50%"><i
                        class="fa fa-star-half-empty"></i></button></a>
                        
                        <a href="/Note/Nothing/{{ $tache->id }}/{{ $id }}" >   <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                    data-target="#noter{{ $tache->id }}"
                    title="0%"><i
                        class="fa fa-star-o"></i></button></a>
            @endif
            </td>
        </tr>

         <!-- edit_modal_Grade -->
         <div class="modal fade" id="edit{{ $tache->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                               Edit Task
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('Tache.update', 'test') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">Task Name
                                                            :</label>
                                                        <input id="Name" type="text" name="Name"
                                                               class="form-control"
                                                               value="{{ $tache->Title}}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $tache->id }}">
                                                               <input  type="hidden" name="id_project" class="form-control"
                                                               value="{{ $id }}">
                                                    </div>
                                                    <div class="col">
        
        <label for="Date_Expire">Date_Start</label>
                                                <input type="date" class="form-control" id="start" name="start"  value="{{$tache->start}}">
       
                                </div>
                                <div class="col">
        
        <label for="Date_Expire">Date_End</label>
                                                <input type="date" class="form-control" id="end" name="end"  value="{{$tache->end}}">
       
                                </div>
                                                    
                                                </div>
                                                </div>


                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                            class="btn btn-success">Update</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
        
       
                                     <!-- delete_modal_Grade -->
               <div class="modal fade" id="delete{{ $tache->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Delete tache
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                                         <div class="modal-body">
                                            <form action="{{ route('Tache.destroy', 'test') }}"
                                                  method="post">
                                                  @method('DELETE')
                                                @csrf
                                                Are you sure you want to delete this tache?
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{ $tache->id }}">
                                                       <input type="hidden" class="form-control" name="project_id" value="{{$id}}">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">Yes!</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
       
                        @endforeach

       
 

                    </table>
            </div>
            
            
       </div>

  </div>
 
</div>
<div class="col-xl-3">
                <!-- Yearly Breakup -->
                <div class="card overflow-hidden">
                  <div class="card-body " style="max-height:200px;">
                    <h5 class="card-title  fw-semibold">Project Task Statistics</h5>
                    <div class="row align-items-center">
                    <div class="col-6">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                      <div class="col-6">
                        <h4 class="fw-semibold mb-3">{{$somme}} Tasks</h4>
                        <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">completed</span>
                          </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                          <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">current</span>
                          </div>
                          
                          <div>
                          <span class="round-8  rounded-circle me-2 d-inline-block" style="background-color:#F9F9FD;"></span>
                            <span class="fs-2">expired</span>
                            
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                <img src="{{ URL::asset('assets/images/img2.png') }}" alt="" class="testimonial-image" style="max-width:300px;height:200px;">
       
              </div>
<!-- <div class="col-xl-3 mt-60">
            <img src="{{ URL::asset('assets/images/img2.png') }}" alt="" class="testimonial-image" style="max-width:300px;">
        </div> -->
<!-- Modale d'ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Add task
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <!-- Formulaire avec repeater -->
                <form class="row mb-30" action="{{ route('Tache.store') }}" method="POST">
    @csrf
    
    <div class="card-body">
        <div class="repeater">
            <div data-repeater-list="projects">
                <div data-repeater-item>
                    <div class="row">
                        <div class="col">
                        <input type="hidden" class="form-control" name="id" value="{{$id}}">
                            <label for="name" class="">Task Name</label>
                            <div class="">
                                <input type="text" class="form-control" name="nom" placeholder=" Project Name ">
                                

                            </div>
                        </div>
                        <div class="col">
                            <label for="Date_Expire">Date_Start</label>
                            <input type="date" class="form-control" id="Date_Expire" name="Date_Start" >

                        </div>
                        <div class="col">
                            <label for="Date_Expire">Date_End</label>
                            <input type="date" class="form-control" id="Date_Expire" name="Date_End" >

                        </div>
                        <div class="col-sm-3 mt-30">
                            <button type="button" data-repeater-delete class="btn btn-danger">Delete</button>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col mt-30">

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="button" data-repeater-create class="btn btn-primary">Add</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>


        <!-- حذف مجموعة صفوف Action-->
</div>
</div>
<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    delete Departements
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            

            <form action="{{ route('delete_all_Tache') }}" method="POST">
               @csrf
                <div class="modal-body">
                    are you sure you want to delete all selected?
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
                    <input class="text" type="hidden"  name="id" value='{{$id}}'>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div> 

</div>


@endsection

@section('js')
<script>
     var en_cours = {{ $en_cours }};
var termine = {{ $termine }};
var overdue = {{ $overdue }}; 

var breakup = {
  color: "#adb5bd",
  series: [termine,en_cours,overdue],
  labels: ["completed", "in progress", "expired"],
  chart: {
      width: 180,
      type: "donut",
      fontFamily: "Plus Jakarta Sans', sans-serif",
      foreColor: "#adb0bb",
  },
  plotOptions: {
      pie: {
          startAngle: 0,
          endAngle: 360,
          donut: {
              size: '75%',
          },
      },
  },
  stroke: {
      show: false,
  },
  dataLabels: {
      enabled: false,
  },
  legend: {
      show: false,
  },
  colors: ["#5D87FF", "#ecf2ff", "#F9F9FD"],
  responsive: [{
      breakpoint: 991,
      options: {
          chart: {
              width: 150,
          },
      },
  }],
  tooltip: {
      theme: "dark",
      fillSeriesColor: false,
  },
};

var chart = new ApexCharts(document.querySelector("#breakup"), breakup);
chart.render();




</script>

<!-- Ajoutez vos scripts JavaScript ici -->
<script type="text/javascript">
    $(document).ready(function () {
        $('.repeater').repeater({
            show: function () {
                $(this).slideDown();
            },
            hide: function (deleteElement) {
                $(this).slideUp(deleteElement);
            }
        });
    });
</script>

<script type="text/javascript">
    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });

            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });

</script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js"></script>

@endsection
