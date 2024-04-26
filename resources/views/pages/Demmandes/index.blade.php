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
                <button type="button" class="button x-small" id="btn_delete_all">
                    Supprimer la sélection
                </button>
                <br><br>
                <form action="{{ route('Filter_Departements_demmandes') }}" method="POST">
                    @csrf
                    <select class="custom-select my-1 mr-sm-2" data-style="btn-info" name="Departement_id" required
                            onchange="this.form.submit()"style="width: 200px;">
                        <option value="" selected disabled>Search By Departement</option>
                        @foreach ($Departements as $departement)
                            <option value="{{ $departement->id }}">{{ $departement->nom }}</option>
                        @endforeach
                    </select>
                </form>
                               <!-- Tableau file des classes -->
                               <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox" onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Telephone</th>
                                <th>Address</th>
                                <th>Date_Debut</th>
                                <th>Date_fin</th>
                                <th>CV</th>
                                <th>Process</th>
                                
                            </tr>
                        </thead>
                        <tbody>



@if (isset($details))

    <?php $List_stagaires = $details; ?>
@else

    <?php $List_stagaires = $demmandes; ?>
@endif

    <?php $i = 0; ?>

    @foreach ($List_stagaires as $stagaire)
        <tr>
            <?php $i++; ?>
            <td><input type="checkbox"  value="{{ $stagaire->id }}" class="box1" ></td>
            <td>{{ $i }}</td>
            <td>{{$stagaire->FullName}}</td>
                                        <td>{{$stagaire->email}}</td>
                                        <td>{{$stagaire->telephone}}</td>
                                        <td>{{$stagaire->Address}}</td>
                                        <td>{{$stagaire->Date_debut}}</td>
                                        <td>{{$stagaire->Date_fin}}</td>
                                        <td><a href="{{asset('storage/imgs/'.$stagaire->cv) }}" class="fas fa-file-download text-success" style='font-size:24px'></a> </td>                                   </td>
                                        <td>                        
           @if($stagaire->status=='current')
           
            <a href="{{ route('confirm_demmande', $stagaire->id) }}" class="btn btn-success btn-sm" title="edit">
    <i class="fas fa-check-circle"></i>
</a>
    <a href="{{ route('annuler_demmande', $stagaire->id) }}" class="btn btn-danger btn-sm" title="edit">
    <i class="fas fa-ban"></i>
</a>

            @endif
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                    data-target="#delete{{ $stagaire->id }}"
                    title="delete"><i
                        class="fa fa-trash"></i></button>
            </td>
        </tr>

         <!-- edit_modal_Grade -->
  <div class="modal fade" id="delete{{ $stagaire->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                Delete Demmande
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('Demmande.destroy', 'test') }}"
                                                  method="post">
                                                  @method('DELETE')
                                                @csrf
                                                Are you sure you want to delete this Demmande?
                                                <input id="id" type="hidden" name="id" class="form-control"
                                                       value="{{ $stagaire->id }}">
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


<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    delete Demmandes
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            

            <form action="{{ route('delete_all_demmandes') }}" method="POST">
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

</script>
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js"></script>

@endsection
