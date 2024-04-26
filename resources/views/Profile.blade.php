@extends('layouts.master')
@section('title')
 Home

@endsection
@section('css')


@endsection


@section('content')

<div class="container-fluid ">
    <div class="card mt-60">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="profile-avatar">
                        <img src="{{URL::asset('assets/images/Admin.png')}}" alt="avatar" class="rounded-circle img-fluid">
                    </div>
                    <center>
                    <h5 class="profile-name">{{$information->name}}</h5>
                    <p class="profile-email text-muted">{{$information->email}}</p>
                    
                    <h4><p class="profile-role text-muted">Admin</p></h3>
                    </center>
                </div>
                <div class="col-md-8">
                    <form action="{{route('profile.update',$information->id)}}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" name="Name_ar" value="{{ $information->name}}" class="form-control" id="fullName">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="Name_en" value="{{ $information->email }}" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="showPassword">
                            <label class="form-check-label" for="showPassword">Show Password</label>
                        </div>
                        <button type="submit" class="btn btn-success">Modifier les informations</button>
                    </form>
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
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
@endsection

