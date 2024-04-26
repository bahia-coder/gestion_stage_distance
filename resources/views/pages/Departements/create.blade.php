@extends('layouts.master')

@section('title')
    {{trans('main_trans.list_students')}}
@stop

@section('content')
<div class="row">
        <div class="col-md-12 mb-30">
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
                            <form action="{{route('Departement.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">

                                    <div class="col">
                                        <label for="title"> Name of Department</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>

                                </div>
                                <br>
                                <div class="form-row">

<div class="col">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control">
</div>

</div>
<br>
                                <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">Add Department </button>
                            </form>
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

@endsection


       <!--تعديل قسم جديد -->
                                                                  <!--   <div class="modal fade"
                                                                         id="edit{{ $list_Employes->id }}"
                                                                         tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title"
                                                                                        style="font-family: 'Cairo', sans-serif;"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('Employe_trans.edit_Section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">

                                                                                    <form
                                                                                        action="{{ route('Employe.update', 'test') }}"
                                                                                        method="POST">
                                                                                        {{ method_field('patch') }}
                                                                                        {{ csrf_field() }}
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="Name_Section_Ar"
                                                                                                       class="form-control"
                                                                                                       value="{{ $list_Employes->getTranslation('Name_Section', 'ar') }}">
                                                                                            </div>

                                                                                            <div class="col">
                                                                                                <input type="text"
                                                                                                       name="Name_Section_En"
                                                                                                       class="form-control"
                                                                                                       value="{{ $list_Employes->getTranslation('Name_Section', 'en') }}">
                                                                                                <input id="id"
                                                                                                       type="hidden"
                                                                                                       name="id"
                                                                                                       class="form-control"
                                                                                                       value="{{ $list_Employes->id }}">
                                                                                            </div>

                                                                                        </div>
                                                                                        <br>


                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('Employe_trans.Name_Grade') }}</label>
                                                                                            <select name="Grade_id"
                                                                                                    class="custom-select"
                                                                                                    onclick="console.log($(this).val())">
                                                                                               
                                                                                                <option
                                                                                                    value="{{ $Grade->id }}">
                                                                                                    {{ $Grade->Name }}
                                                                                                </option>
                                                                                                @foreach ($list_Grades as $list_Grade)
                                                                                                    <option
                                                                                                        value="{{ $list_Grade->id }}">
                                                                                                        {{ $list_Grade->Name }}
                                                                                                    </option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <label for="inputName"
                                                                                                   class="control-label">{{ trans('Employe_trans.Name_Class') }}</label>
                                                                                            <select name="Class_id"
                                                                                                    class="custom-select">
                                                                                                <option
                                                                                                    value="{{ $list_Employes->My_classs->id }}">
                                                                                                    {{ $list_Employes->My_classs->Name_Class }}
                                                                                                </option>
                                                                                            </select>
                                                                                        </div>
                                                                                        <br>

                                                                                        <div class="col">
                                                                                            <div class="form-check">

                                                                                                @if ($list_Employes->Status === 1)
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        checked
                                                                                                        class="form-check-input"
                                                                                                        name="Status"
                                                                                                        id="exampleCheck1">
                                                                                                @else
                                                                                                    <input
                                                                                                        type="checkbox"
                                                                                                        class="form-check-input"
                                                                                                        name="Status"
                                                                                                        id="exampleCheck1">
                                                                                                @endif
                                                                                                <label
                                                                                                    class="form-check-label"
                                                                                                    for="exampleCheck1">{{ trans('Employe_trans.Status') }}</label><br>

                                                                                                    <div class="col">
                                                                                                        <label for="inputName" class="control-label">{{ trans('Employe_trans.Name_Teacher') }}</label>
                                                                                                        <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                                                                            @foreach($list_Employes->teachers as $teacher)
                                                                                                                <option selected value="{{$teacher['id']}}">{{$teacher['Name']}}</option>
                                                                                                            @endforeach

                                                                                                            @foreach($teachers as $teacher)
                                                                                                                <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                            </div>
                                                                                        </div>


                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                            class="btn btn-secondary"
                                                                                            data-dismiss="modal">{{ trans('Employe_trans.Close') }}</button>
                                                                                    <button type="submit"
                                                                                            class="btn btn-danger">{{ trans('Employe_trans.submit') }}</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->


                                                                    <!-- delete_modal_Grade -->
                                                                   <!--  <div class="modal fade"
                                                                         id="delete{{ $list_Employes->id }}"
                                                                         tabindex="-1" role="dialog"
                                                                         aria-labelledby="exampleModalLabel"
                                                                         aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 style="font-family: 'Cairo', sans-serif;"
                                                                                        class="modal-title"
                                                                                        id="exampleModalLabel">
                                                                                        {{ trans('Employe_trans.delete_Section') }}
                                                                                    </h5>
                                                                                    <button type="button" class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                    <span
                                                                                        aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <form
                                                                                        action="{{ route('Employe.destroy', 'test') }}"
                                                                                        method="post">
                                                                                        {{ method_field('Delete') }}
                                                                                        @csrf
                                                                                        {{ trans('Employe_trans.Warning_Section') }}
                                                                                        <input id="id" type="hidden"
                                                                                               name="id"
                                                                                               class="form-control"
                                                                                               value="{{ $list_Employes->id }}">
                                                                                        <div class="modal-footer">
                                                                                            <button type="button"
                                                                                                    class="btn btn-secondary"
                                                                                                    data-dismiss="modal">{{ trans('Employe_trans.Close') }}</button>
                                                                                            <button type="submit"
                                                                                                    class="btn btn-danger">{{ trans('Employe_trans.submit') }}</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div> -->




                                                               














                                                                     <!--اضافة قسم جديد -->
                    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        {{ trans('Employe_trans.add_section') }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{ route('Employe.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" name="Name_Section_Ar" class="form-control"
                                                       placeholder="{{ trans('Employe_trans.Section_name_ar') }}">
                                            </div>

                                            <div class="col">
                                                <input type="text" name="Name_Section_En" class="form-control"
                                                       placeholder="{{ trans('Employe_trans.Section_name_en') }}">
                                            </div>

                                        </div>
                                        <br>


                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('Employe_trans.Name_Grade') }}</label>
                                            <select name="Grade_id" class="custom-select"
                                                    onchange="console.log($(this).val())">
                                                
                                                <option value="" selected
                                                        disabled>{{ trans('Employe_trans.Select_Grade') }}
                                                </option>
                                                @foreach ($list_Grades as $list_Grade)
                                                    <option value="{{ $list_Grade->id }}"> {{ $list_Grade->Name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>

                                        <div class="col">
                                            <label for="inputName"
                                                   class="control-label">{{ trans('Employe_trans.Name_Class') }}</label>
                                            <select name="Class_id" class="custom-select">

                                            </select>
                                        </div><br>

                                        <div class="col">
                                            <label for="inputName" class="control-label">{{ trans('Employe_trans.Name_Teacher') }}</label>
                                            <select multiple name="teacher_id[]" class="form-control" id="exampleFormControlSelect2">
                                                @foreach($teachers as $teacher)
                                                    <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                @endforeach
                                            </select>
                                        </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">{{ trans('Employe_trans.Close') }}</button>
                                    <button type="submit"
                                            class="btn btn-danger">{{ trans('Employe_trans.submit') }}</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div> -->