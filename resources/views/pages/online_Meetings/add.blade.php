@extends('layouts.master_employe')


@section('content')
<div class="container-fluid">
    <!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('online_classes.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Grade_id">Stagaire : <span
                                        class="text-danger">*</span></label>
                                <select class="custom-select mr-sm-2" name="Stagaire_id">
                                    <option selected disabled>{{ trans('Parent_trans.Choose') }}...</option>
                                    @foreach ($Stagaires as $Stagaire)
                                        <option value="{{ $Stagaire->id }}">{{ $Stagaire->FullName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label> Meeting Topic : <span class="text-danger">*</span></label>
                                <input class="form-control" name="topic" type="text">
                            </div>
                        </div>
                        
                    </div><br>

                    <div class="row">

                       

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>  Start Meeting Date : <span class="text-danger">*</span></label>
                                <input class="form-control" type="datetime-local" name="start_time">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>  Duration of meeting : <span class="text-danger">*</span></label>
                                <input class="form-control" name="duration" type="text">
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                        type="submit">create</button>
                </form>

            </div>
        </div>
    </div>
</div>
<!-- row closed -->
</div>
@endsection
@section('js')
@toastr_js
@toastr_render

@endsection
