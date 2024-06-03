@extends('layouts.master')
@section('css')
   
@section('title')
    {{ trans('Stagaire_trans.title_page') }}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{ trans('Stagaire_trans.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if(session()->has('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>{{ session()->get('error') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="col-xs-12">
                        <div class="col-md-12">
                            <br>
                            <form action="{{route('Stagaire.store')}}" method="post" enctype="multipart/form-data">
                             @csrf
                            <div class="form-row">
                                               <div class="col">
                                    <label for="Name">Full Name</label>
                                    <input type="text" name="Name" class="form-control">
                                    @error('Name')
                                    <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
            <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="Email">Email</label>
                                    <input type="Email" name="Email" class="form-control">
                                    @error('Email')
                                    <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
            <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="Address">Address</label>
                                    <input type="text" name="Address" class="form-control">
                                    @error('Address')
                                    <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
            <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="password">password</label>
                                    <input type="password" name="password" class="form-control">
                                    @error('password')
                                    <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
            <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Departement</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                        <option selected disabled>Departement...</option>
                                        @foreach($departements as $departement)
                                            <option value="{{$departement->id}}">{{$departement->nom}}</option>
                                        @endforeach
                                    </select>
                                    @error('Specialization_id')
                                    <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
            <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Gender</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                        <option selected disabled>Gender...</option>
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}">{{$gender->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Gender_id')
                                    <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
            <label class="text-danger">{{ $message }}</label>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                               


                                    <div class="col">
        <label for="Date_debut">Start Date</label>
        <input type="date" class="form-control" id="Date_debut" name="Date_debut" >
        @error('Date_debut')
                <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
        <label class="text-danger">{{ $message }}</label>
    
        @enderror
                                </div>
                                 <div class="col">
        <label for="Date_fin">End Date</label>
        <input type="date" class="form-control" id="Date_fin" name="Date_fin" >
        @error('Date_fin')
                <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
        <label class="text-danger">{{ $message }}</label>
    
        @enderror
                                </div>
                                <div class="col">
        <label for="Telephone">Phone</label>
        <input type="text" class="form-control" id="Telephone" name="Telephone" placeholder="06 - - - - - - - -">
        @error('Telephone')   
        <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
            <label class="text-danger">{{ $message }}</label>
        @enderror

                                </div>
                                 <div class="col">
                            <label for="photo"
                                                   class="label-control">trainee Photo</label>
                                        <br>
                                                   <input type="file" name="photo" class="form-control">
                                        </div>
                            </div>
                                
                            </div>
                            <br>
                            

                            

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Add trainee</button>
                    </form>
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
    <script>
     $(document).ready(function(){
    $('#datepicker-action').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
    });
});
/script>
@endsection
