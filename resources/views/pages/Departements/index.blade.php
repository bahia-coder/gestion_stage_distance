@extends('layouts.master')

@section('title')
    {{trans('main_trans.list_students')}}
@stop
@section('css')
<style>
    .modal input:focus {
        border: 2px solid #4CAF50; /* Couleur de la bordure en focus */
        outline: none; /* Supprime la bordure par défaut sur focus */
        transition: border-color 0.2s ease; /* Animation fluide de la couleur de la bordure */
        border-radius: 5px; /* Coins arrondis */
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5); /* Légère ombre */
    }

    /* Style pour le texte d'aide */
    .input-help {
        font-size: 12px;
        color: #999;
    }
    .photo-upload-container {
        margin-bottom: 20px;
    }

    /* Style pour le label */
    .photo-upload-container label {
        display: block;
        margin-bottom: 5px;
    }

    /* Style pour le champ de téléchargement de fichier */
    .photo-upload-container input[type="file"] {
        display: block;
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
</style>
    @endsection
@section('content')
<div class="container-fluid">
<div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a  href="#" data-toggle="modal" data-target="#exampleModal" class="btn btn-info btn-sm" role="button"
                                   aria-pressed="true">Add Departement</a><br><br>
                                <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Operations</th> <!-- Ajout d'une colonne pour les opérations -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departements as $departement)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td><img src="{{asset('storage/imgs/'.$departement->path) }}" alt="" width="40px" height="40px"> </td>

                                    <td>{{ $departement->nom }}</td>
                                    <td>{{ $departement->description }}</td>
                                    <td>
                                           <a href="#"  class="btn btn-outline-info btn-sm" store data-toggle="modal" data-target="#edit{{ $departement->id }}">edit</a>
                                           <a href="#"class="btn btn-outline-danger btn-sm" data-toggle="modal"data-target="#delete{{ $departement->id }}">delete</a>
                                   </td>
                                   
                                </tr>
                                <div class="modal fade" id="delete{{ $departement->id }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                                                        delete departement
                                                 </h5>
                                                <button type="button" class="close"data-dismiss="modal"aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                 <form action="{{ route('Departement.destroy', 'testt') }}" method="post">
                                                     @method('DELETE')
                                                     @csrf
                                                     Are you sure you want to delete  departement ::{{$departement->nom}}
                                                      <input id="id" type="hidden" name="id" class="form-control" value="{{ $departement->id }}">
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn btn-secondary"  data-dismiss="modal">close</button>
                                                             <button type="submit"  class="btn btn-danger">delete</button>
                                                         </div>
                                              </form>
                                      </div>
                                   </div>
                               </div>
                             </div>
                             <div class="modal fade" id="edit{{ $departement->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel"> edit departemen </h5>
                                        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                               <div class="modal-body">

                             <form action="{{ route('Departement.update', 'test') }}" method="POST" enctype="multipart/form-data">

                                 @csrf
                                  <div class="col">
                                   <label for="Name" class="control-label">Name</label>
                                   <input type="text" name="Name"  class="form-control" value="{{ $departement->nom }}">
                                </div>
                                <div class="col">
                                     <label for="Description"class="control-label">Description</label>
                                     <input type="text" name="Description" class="form-control" value="{{ $departement->description }}">
                                      <input id="id" type="hidden" name="id" class="form-control" value="{{ $departement->id }}">
                             </div>
                             <br>
                             <div class="col lg-4">
                                        <label for="photo"
                                                   class="control-label">Department Photo</label>
                             <br>
                                                   <input type="file" name="photo" class="form-control" width="150">
                                        <br>
                                        <img src="{{asset('storage/imgs/'.$departement->path) }}" alt="" width="40px" height="40px">
                             
                     
                                        </div>
                                       
                          </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-danger">Update</button>
                      </div>
                    </form>
                 </div>
               </div>
             </div>
           @endforeach
          </tbody>
         </table>
        </div>
     </div>
    </div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        Add Departement</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('Departement.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                            <div class="col">
                                            <label for="Name"
                                                   class="control-label">Department Name</label>
                                                <input type="text" name="Name" class="form-control"
                                                       placeholder="Departement Name">
                                            </div>
                                        <br>


                                        <div class="col">
                                            <label for="Description"
                                                   class="control-label">Description</label>
                                                 
                                                <input type="text" name="Description" class="form-control"
                                                       placeholder="Description">
                                           
                                        </div>
                                        <br>
                                        <div class="col lg-4">
                                        <label for="photo"
                                                   class="control-label">Department Photo</label>
                                        <br>
                                                   <input type="file" name="photo" class="form-control" width="150">
                                        </div>
                                        <br>

                                     


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">close</button>
                                    <button type="submit"
                                            class="btn btn-success">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>



                    

@endsection

@section('js')
<!-- Script pour DataTables -->
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js"></script>


<!-- Script pour ApexCharts file -->
<script src="{{ URL::asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

<script>
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
        "hideMethod": "fadeOut"
    }

    @if(Session::has('msg'))
        toastr.success("{{ Session::get('msg') }}");
    @endif
</script>


@endsection
