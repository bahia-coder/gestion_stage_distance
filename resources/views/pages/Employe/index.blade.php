@extends('layouts.master')
@section('css')
   <style>
.acd-heading.active {
        background-color: #6faad6 !important; /* Couleur de fond bleu clair pour l'en-tête du département actif */
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
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 mb-30 ">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('Employe.create')}}" method="get">
                <button type="submit" class="btn-info btn-sm" >
                    Add new supervisor </button>
</form>
                    
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="card card-statistics h-100 ml-30 mr-30">
                    <div class="card-body">
                        <div class="accordion gray plus-icon round">

                            @foreach ($Departements as $departement)

                                <div class="acd-group">
                                    <a href="#" class="acd-heading ">{{ $departement->nom }}</a>
                                    <div class="acd-des">

                                        <div class="row">
                                            <div class="col-xl-12 mb-30">
                                                <div class="card card-statistics h-100">
                                                    <div class="card-body">
                                                        <div class="d-block d-md-flex justify-content-between">
                                                            <div class="d-block">
                                                            </div>
                                                        </div>
                                                        <div class="table-responsive mt-15 table-container">
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-dark">
                <th>Profile</th>
                <th>FullName</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Date of Joining</th>
                <th>Operations</th>
            </tr>
        </thead>
        <tbody>
            @php $i = 0; @endphp
            @foreach ($departement->Employes as $list_Employes)
            <tr>
                @php $i++; @endphp
                <td><img src="{{asset('storage/imgs/'.$list_Employes->photo) }}" alt="" width="40px" height="40px" style="border-radius:50%;"> </td>
                <td>{{ $list_Employes->FullName}}</td>
                <td>{{ $list_Employes->email}}</td>
                <td>{{ $list_Employes->Address}}</td>
                <td>{{ $list_Employes->telephone}}</td>
                <td>{{ $list_Employes->Joining_Date}}</td>
                <td>
                    <a href="{{route('Employe.edit',$list_Employes->id)}}" class="btn btn-outline-warning btn-sm">edit</a>
                    <a href="#"class="btn btn-outline-danger btn-sm" data-toggle="modal"data-target="#delete{{ $list_Employes->id }}">delete</a>
                </td>
            </tr>
            <div class="modal fade" id="delete{{ $list_Employes->id }}"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                             <div class="modal-header">
                                                  <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                                                                                        delete supervisor
                                                 </h5>
                                                <button type="button" class="close"data-dismiss="modal"aria-label="Close">
                                                     <span aria-hidden="true">&times;</span>
                                                </button>
                                             </div>
                                             <div class="modal-body">
                                                 <form action="{{ route('Employe.destroy', 'testt') }}" method="post">
                                                     @method('DELETE')
                                                     @csrf
                                                     Are you sure you want to delete  supervisor :{{$list_Employes->FullName}}
                                                      <input id="id" type="hidden" name="id" class="form-control" value="{{ $list_Employes->id }}">
                                                         <div class="modal-footer">
                                                             <button type="button" class="btn btn-secondary"  data-dismiss="modal">close</button>
                                                             <button type="submit"  class="btn btn-danger">delete</button>
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
                                    @endforeach
                                </div>
                        </div>
                    </div>

                   

                </div>
            </div>
        </div>
        </div>
        <!-- row closed -->
        @endsection
        @section('js')
        @toastr_js
    @toastr_render

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.acd-heading').click(function(){
                // Retirez la classe active de tous les en-têtes du département
                $('.acd-heading').removeClass('active');
                // Ajoutez la classe active à l'en-tête du département cliqué
                $(this).addClass('active');
            });
        });
    </script>
            <script>
                $(document).ready(function () {
                    $('select[name="Grade_id"]').on('change', function () {
                        var Grade_id = $(this).val();
                        if (Grade_id) {
                            $.ajax({
                                url: "{{ URL::to('classes') }}/" + Grade_id,
                                type: "GET",
                                dataType: "json",
                                success: function (data) {
                                    $('select[name="Class_id"]').empty();
                                    $.each(data, function (key, value) {
                                        $('select[name="Class_id"]').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                },
                            });
                        } else {
                            console.log('AJAX load did not work');
                        }
                    });
                });


                $(document).ready(function(){
                    $(document).ready(function(){
    // Masquer tous les contenus par défaut
    $('.acd-des').hide();

    $('.acd-heading').click(function(){
        // Toggle class active et afficher ou masquer le contenu au clic
        $(this).next('.acd-des').toggleClass('active').slideToggle(); 
        // Fermer les autres sections
        $('.acd-des').not($(this).next('.acd-des')).removeClass('active').slideUp(); 
    });
});

});
 
            </script>


@endsection
