@extends('layouts.master')

@section('title')
    {{trans('main_trans.list_students')}}
@stop

@section('content')
<div class="container-fluid">
<div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">
                                <a href="{{route('Departement.create')}}" class="btn btn-success btn-sm" role="button"
                                   aria-pressed="true">{{trans('main_trans.add_departement')}}</a><br><br>
                                <div class="table-responsive">
                                <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="50"
                                           style="text-align: center">
                                        <thead>

                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('Departements_trans.nom') }}</th>
                                    <th>{{ trans('Departements_trans.description') }}</th>
                                    <th>{{ trans('main_trans.operations') }}</th> <!-- Ajout d'une colonne pour les opérations -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($departements as $departement)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $departement->nom }}</td>
                                    <td>{{ $departement->description }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success btn-sm dropdown-toggle" type="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ trans('main_trans.operations') }}
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{ route('Departement.show', $departement->id) }}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp;  {{ trans('main_trans.view_student_data') }}</a>
                                                <a class="dropdown-item" href="{{ route('Departement.edit', $departement->id) }}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  {{ trans('main_trans.edit_student_data') }}</a>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#Delete_Student{{ $departement->id }}"><i style="color: red" class="fa fa-trash"></i>&nbsp;  {{ trans('main_trans.delete_student_data') }}</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
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


@endsection

@section('js')
<!-- Script pour DataTables -->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>

<!-- Script pour ApexCharts -->
<script src="{{ URL::asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script>

</script>
@endsection
