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
     <!-- row -->
     <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('online_classes.create')}}" class="btn btn-info mb-10" role="button" aria-pressed="true"> Create New Online Meeting  </a>
                                
                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>
                                        <tr class="alert-success">
                                        <th>#</th>
                                        <th>Trainee</th>
                                        <th>Topic</th>
                                        <th>Start Date</th>
                                        <th>Duration</th>
                                        <th>Meeting Link</th>
                                        <th>Actions</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($online_classes as $online_classe)
    @php
        // Convertir la date de début en objet DateTime
        $startDateTime = new DateTime($online_classe->start_at);
        
        // Ajouter la durée à la date de début
        $endDateTime = clone $startDateTime;
        $endDateTime->add(new DateInterval('PT'.$online_classe->duration.'M')); // 'M' signifie minutes

        // Obtenir la date actuelle
        $currentDateTime = new DateTime();
        
        // Vérifier si la date de fin est supérieure à la date actuelle
        $isFutureMeeting = $endDateTime > $currentDateTime;
    @endphp

    @if($isFutureMeeting)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$online_classe->stagaire->FullName}}</td>
            <td>{{$online_classe->topic}}</td>
            <td>{{$online_classe->start_at}}</td>
            <td>{{$online_classe->duration}}</td>
            <td class="text-danger"><a href="{{$online_classe->join_url}}" target="_blank"> Join Now</a></td>
            <td>
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#Delete_receipt{{$online_classe->meeting_id}}" ><i class="fa fa-trash"></i></button>
            </td>
        </tr>
      
    @endif
    @include('pages.online_Meetings.delete')
@endforeach

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
