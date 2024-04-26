@extends('layouts.master_employe')
@section('css')
<style>
    
   
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
<!-- breadcrumb  times-->
@endsection
@section('content')
    <!-- row -->
    
<div class="container-fluid">
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
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
                    Ajouter une Tache
                </button>
                <button type="button" class="btn-info btn-sm" id="btn_delete_all" data-toggle="modal" >
                    Supprimer la sélection
                </button>
                <br><br>

               

             

                <!-- Tableau des classes -->
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>Tache</th>
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
                                               Edit tache
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
                                                               class="mr-sm-2">tache Name
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

<!-- Modale d'ajout -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    Ajouter une tache
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
                            <label for="name" class="">Tache Name</label>
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
                            <button type="button" data-repeater-delete class="btn btn-danger">Supprimer</button>
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
                    <button type="button" data-repeater-create class="btn btn-primary">Ajouter</button>
                </div>
            </div>

        </div>
    </div>

    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Enregistrer</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
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
