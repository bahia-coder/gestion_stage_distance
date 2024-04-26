@extends('layouts.master')

@section('title')
    {{trans('main_trans.list_students')}}
@stop
@section('css')
<style>
    #clear-button{
        margin-left:20px;
    }
    #signature-pad{
        border: 2px solid #4CAF50;
        margin-left:20px;
    }
    .modal textarea:focus{
        border: 2px solid #4CAF50; /* Title Couleur de la bordure en focus */
        outline: none; /* Supprime la bordure par défaut sur focus */
        transition: border-color 0.2s ease; /* Animation fluide de la couleur de la bordure */
        border-radius: 5px; /* Coins arrondis */
        box-shadow: 0 0 5px rgba(76, 175, 80, 0.5); /* Légère ombre */
    }
    .modal input:focus {
        border: 2px solid #4CAF50; /* Title Couleur de la bordure en focus */
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
                                   aria-pressed="true">Add Annonce</a><br><br>
                                <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center ">
                                        <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>options</th><!-- Ajout d'une colonne pour les opérations -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($annonces as $annonce)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $annonce->Title }}</td>
                                    <td>
                                           <a href="#"  class="btn btn-outline-info btn-sm" store data-toggle="modal" data-target="#edit{{ $annonce->id }}">edit</a>
                                           <a href="#"class="btn btn-outline-danger btn-sm" data-toggle="modal"data-target="#delete{{ $annonce->id }}">delete</a>
                                           <a class="btn btn-outline-success danger btn-sm"
class="btn btn-outline-success btn-sm" href="{{route('annonce.pdf',$annonce->id)}}">Download<i class="	fa fa-download" style="color:green"></i></a>
                                   </td>
                                   
                                </tr>
                                <div class="modal fade" id="delete{{ $annonce->id }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                                                        delete Annonce
                                                 </h5>
                                                <button type="button" class="close"data-dismiss="modal"aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                 <form action="{{ route('annonce.destroy', 'testt') }}" method="post">
                                                     @method('DELETE')
                                                     @csrf
                                                     Are you sure you want to delete  annonce ::{{$annonce->Title}}
                                                      <input id="id" type="hidden" name="id" class="form-control" value="{{ $annonce->id }}">
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn btn-secondary"  data-dismiss="modal">close</button>
                                                             <button type="submit"  class="btn btn-danger">delete</button>
                                                         </div>
                                              </form>
                                      </div>
                                   </div>
                               </div>
                             </div>
                             <div class="modal fade" id="edit{{ $annonce->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                 <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel"> edit departemen </h5>
                                        <button type="button" class="close" data-dismiss="modal"  aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                     </button>
                                 </div>
                               <div class="modal-body">

                             <form action="{{ route('annonce.update', 'test') }}" method="POST" enctype="multipart/form-data">

                                 @csrf
                                  <div class="col">
                                   <label for="Title" class="control-label">Title</label>
                                   <input type="text" name="Title"  class="form-control" value="{{ $annonce->Title }}">
                                </div>
                                <div class="col">
                                     <label for="Body"class="control-label">Content</label>
                                     <input type="text" name="Body" class="form-control" value="{{ $annonce->Body }}">
                                      <input id="id" type="hidden" name="id" class="form-control" value="{{ $annonce->id }}">
                             </div>
                             <br>
                                       
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
                                        Add annonce</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('annonce.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                            <div class="col">
                                            <label for="Title"
                                                   class="control-label">Body Title</label>
                                                <input type="text" name="Title" class="form-control"
                                                       placeholder="Annonce Title">
                                            </div>
                                        <br>


                                        <div class="col">
                                            <label for="Body"
                                                   class="control-label">Body</label>
                                                 <textarea class="form-control"  name="Body"cols="60" rows="6"  placeholder="Annonce Content"></textarea>
                                               
                                           
                                        </div>
                                        <br>
                                        <h5>Signez ci-dessous</h5>
                                        <canvas id="signature-pad" width="400" height="200"></canvas>
                                        <button type="button" id="clear-button" class="btn btn-outline-danger btn-sm">Effacer</button>
<!-- Champ caché pour stocker les données de la signature -->
<input type="hidden" id="signatureData" name="signatureData">

                                       

                                     


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">close</button>
                                    <button type="submit"
                                            class="btn btn-success" id="submitBtn">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>



                    

@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
<!-- Script pour DataTables -->
<script src="https://cdn.datatables.net/v/bs4/dt-1.10.24/b-1.7.0/b-colvis-1.7.0/b-html5-1.7.0/b-print-1.7.0/r-2.2.7/datatables.min.js"></script>
<script>
      var canvas = document.getElementById('signature-pad');
    var signaturePad = new SignaturePad(canvas);

    // Écoutez l'événement de soumission du formulaire
    document.getElementById('submitBtn').addEventListener('click', function() {
        // Obtenez les données de la signature sous forme d'image base64
        var signatureData = signaturePad.toDataURL();

        // Mettez les données de la signature dans le champ caché
        document.getElementById('signatureData').value = signatureData;
    });
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
    document.getElementById('clear-button').addEventListener('click', function() {
            signaturePad.clear();
        });
</script>

<!-- Script pour ApexCharts -->
<script src="{{ URL::asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script>

</script>
@endsection
