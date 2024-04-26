@extends('layouts.master')
@section('css')
   
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
                            <form action="{{route('Employe.update','test')}}" method="post" enctype="multipart/form-data">
                            @method('PUT') 
                            @csrf
                            <div class="form-row">
                                               <div class="col">
                                    <label for="Name">Name</label>
                                    <input type="text" name="Name" class="form-control" value="{{$employe->FullName}}">
                                    <input type="hidden" name="id" value="{{$employe->id}}">
                                    @error('Name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="Email">Email</label>
                                    <input type="Email" name="Email" class="form-control" value="{{$employe->email}}">
                                    @error('Email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="Address">Address</label>
                                    <input type="text" name="Address" class="form-control" value="{{$employe->Address}}">
                                    @error('Address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="password"  >password</label>
                                    <input disabled  type="password" name="password" class="form-control" value="{{$employe->password}}">
                                    @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">Departement</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                        @foreach($departements as $departement)
                                            <option value="{{$departement->id}}" {{$departement->id == $employe->Departement_id ? "selected":""}}>{{$departement->nom}}</option>
                                        @endforeach
                                    </select>
                                    @error('Specialization_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group col">
                                    <label for="inputState">Gender</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Gender_id">
                                        @foreach($genders as $gender)
                                            <option value="{{$gender->id}}" {{$gender->id == $employe->Gender_id ? "selected":""}}>{{$gender->Name}}</option>
                                        @endforeach
                                    </select>
                                    @error('Gender_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                               


                                    <div class="col">
        <label for="Joining_Date">Joining_Date</label>
        <input type="date" class="form-control" id="Joining_Date" name="Joining_Date" value="{{$employe->Joining_Date}}">
        @error('Joining_Date')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

                                </div>
                                <div class="col">
        <label for="Telephone">Telephone</label>
        <input type="text" class="form-control" id="Telephone" value="{{$employe->telephone}}" name="Telephone" placeholder="06 - - - - - - - -">
        @error('Telephone')   
        <i class="fa fa-exclamation-circle text-danger"></i> <!-- Icône d'erreur FontAwesome -->
            
            <label class="text-danger">{{ $message }}</label>
        @enderror

                                </div>
                                <div class="col">
                                    
                            <label for="photo"
                                                   class="control-label">Department Photo</label>
                                        <br>
                                                   <input class="form-control" type="file" name="photo" value="{{asset('storage/imgs/'.$employe->photo) }}">
                                    
                            </div>
                            </div>
                            <br>

                            

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Save</button>
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
