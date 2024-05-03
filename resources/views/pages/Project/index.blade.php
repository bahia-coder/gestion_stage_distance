@extends('layouts.master')
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
                    Ajouter un Project
                </button>
                <button type="button" class="btn-info btn-sm" id="btn_delete_all">
                    Supprimer la sélection
                </button>
                <br><br>

                 <form action="{{ route('Filter_Departements') }}" method="POST">
                    @csrf
                    <select class="custom-select my-1 mr-sm-2" data-style="btn-info" name="Departement_id" required
                            onchange="this.form.submit()"style="width: 200px;">
                        <option value="" selected disabled>Search By Departement</option>
                        @foreach ($Departements as $departement)
                            <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                        @endforeach
                    </select>
                </form> 

             

                <!-- Tableau des classes -->
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>Project_Name</th>
                                <th>Encadranre</th>
                                <th>Stagaire</th>
                                <th>Processes</th>
                            </tr>
                        </thead>
                        <tbody>

@if (isset($details))

    <?php $List_Projects = $details; ?>
@else

    <?php $List_Projects = $projects; ?>
@endif

    <?php $i = 0; ?>

    @foreach ($List_Projects as $project)
        <tr>
            <?php $i++; ?>
            <td><input type="checkbox"  value="{{ $project->id }}" class="box1" ></td>
            <td>{{ $i }}</td>
            <td>{{ $project->nom }}</td>
            <td>{{ $project->Stagaires->FullName }}</td>
            <td>{{ $project->Employes->FullName }}</td>
            <td>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                    data-target="#edit{{ $project->id }}"
                    title="edit"><i class="fa fa-edit"></i></button>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete{{ $project->id }}"
                    title="delete"><i
                        class="fa fa-trash"></i></button>
            </td>
        </tr>

         <!-- edit_modal_Grade -->
         <div class="modal fade" id="edit{{ $project->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                               Edit Project
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- edit_form -->
                                            <form action="{{ route('Project.update', 'test') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name"
                                                               class="mr-sm-2">Project Name
                                                            :</label>
                                                        <input id="Name" type="text" name="Name"
                                                               class="form-control"
                                                               value="{{ $project->nom}}"
                                                               required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                               value="{{ $project->id }}">
                                                    </div>
                                                    <div class="col">
        
        <label for="Date_Expire">Date_Expire</label>
                                                <input type="date" class="form-control" id="Date_Expire" name="Date_Expire"  value="{{$project->Date_Expire}}">
       
                                </div>
                                                    
                                                </div><br>
             <div class="row">
             <div class="form-group col">
                                                    <label
                                                        for="exampleFormControlTextarea1">Stagaire
                                                        :</label>
                                                    <select class="custom-select my-1 mr-sm-2"
                                                            id="exampleFormControlSelect1" name="Stagaire_id">
                                                        <option value="{{ $project->Stagaires->id }}">
                                                            {{ $project->Stagaires->FullName }}
                                                        </option>
                                                        @foreach ($Stagaires as $Stagaire)
                                                            <option value="{{ $Stagaire->id }}">
                                                                {{ $Stagaire->FullName }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <br>
                                                <div class="form-group col">
                                                    <label
                                                        for="exampleFormControlTextarea1">Encadrant
                                                        :</label>
                                                    <select class="custom-select my-1 mr-sm-2"
                                                            id="exampleFormControlSelect1" name="Employe_id">
                                                        <option value="{{ $project->Employes->id }}">
                                                            {{ $project->Employes->FullName }}
                                                        </option>
                                                        @foreach ($Employes as $Employe)
                                                            <option value="{{ $Employe->id }}">
                                                                {{ $Employe->FullName }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="form-group col">
                                                    <label
                                                        for="exampleFormControlTextarea1">Departement
                                                        :</label>
                                                    <select class="custom-select my-1 mr-sm-2"
                                                            id="exampleFormControlSelect1" name="Departement_id">
                                                        <option value="{{ $project->Departements->id }}">
                                                            {{ $project->Departements->nom }}
                                                        </option>
                                                        @foreach ($Departements as $Departement)
                                                            <option value="{{ $Departement->id }}">
                                                                {{ $Departement->nom }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                   
       
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
               <div class="modal fade" id="delete{{ $project->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Delete Project
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                                     <form action="{{ route('Project.destroy', 'test') }}"
                                                  method="post">
                                                  @method('DELETE')
                                                @csrf
                                                Are you sure you want to delete this project?
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{ $project->id }}">
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
                    Ajouter une classe
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <!-- Formulaire avec repeater -->
                <form class="row mb-30" action="{{ route('Project.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="repeater">
                            <div data-repeater-list="projects">
                                <div data-repeater-item>
                                    <div class="row">
                                        <div class="col">
                                        <label for="name" class="">Project Name</label>
                                        <div class="">
                                            <input type="text" class="form-control" name="nom" placeholder=" Project Name ">
                                        </div>
                                        </div>
                                        <div class="col">
                                            <label for="departement"
                                                class="mr-sm-2">Departement_Name
                                                :</label>

                                            <div class="box ">
                                                <select class="custom-select my-1 mr-sm-2 " name="Departement_id" >
                                                    @foreach ($Departements as $Departement)
                                                        <option class="form-control" value="{{ $Departement->id }}">{{ $Departement->nom }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                       
                                    </div>
                                    <div class="row">
                                    <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">Stagaire_Name
                                                :</label>

                                            <div class="box">
                                                <select class="custom-select my-1 mr-sm-2 " name="Stagaire_id">
                                                    @foreach($Stagaires as $Stagaire)
                                                    
                                                    <option value="{{ $Stagaire->id }}">{{ $Stagaire->FullName }}</option>
                                                   
                                                        
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col">
                                            <label for="Name_en"
                                                class="mr-sm-2">Employe Name
                                                :</label>

                                            <div class="box">
                                                <select class="custom-select my-1 mr-sm-2 " name="Employe_id">
                                                    @foreach ($Employes as $Employe)
                                                    @if( $Employe->projects->count() < 4)
                                                        <option value="{{ $Employe->id }}">{{ $Employe->FullName }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>

                                        </div>
                                        <div class="col">
        <label for="Date_Expire">Date_Expire</label>
        <input type="date" class="form-control" id="Date_Expire" name="Date_Expire" >
       
                                </div>
                                        <div class="col mt-30">
                                        <div class="col-sm-1">
                                            <button type="button" data-repeater-delete class="btn btn-danger">Supprimer</button>
                                        </div>
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
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Enregistrer</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            </div>
        </div>
        </form>
        <!-- حذف مجموعة صفوف -->

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
            

            <form action="{{ route('delete_all') }}" method="POST">
               @csrf
                <div class="modal-body">
                    are you sure you want to delete all selected?
                    <input class="text" type="hidden" id="delete_all_id" name="delete_all_id" value=''>
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
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js"></script>
@endsection
