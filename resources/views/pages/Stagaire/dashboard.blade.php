@extends('layouts.master_stagaire')

@section('title', 'Dashboard')

@section('css')
<style>
    /* Styles for the dashboard */
    .dashboard-container {
        padding: 20px;
    }

    .card {
        background-color: #f8f9fa;
        border: 1px solid #dee2e6;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
        height: 100%;
        transition: box-shadow 0.3s ease;
    }

    .card:hover {
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
    }

    .card-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .card-content {
        font-size: 16px;
    }

    .card-content p {
        margin-bottom: 10px;
    }

    .card-footer {
        margin-top: auto;
        text-align: center;
    }

    .card-footer a {
        color: #007bff;
        text-decoration: none;
        font-weight: bold;
    }

    .card-footer a:hover {
        text-decoration: underline;
    }

    .welcome {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        text-align: center;
    }

    .welcome i {
        color: #007bff;
    }
</style>
@endsection

@section('content')
<div class="container-fluid dashboard-container">
    <!-- Dashboard Header -->
    <h1 class="welcome">Welcome Back! <i class="far fa-grin"></i></h1>

    <!-- Dashboard Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-title">Tasks</div>
                <div class="card-content">
                    <p>You have <strong>{{ collect($events)->count() }} pending tasks</strong>.</p>
                    <p>Check your tasks to see what you need to do next.</p>
                </div>
                <div class="card-footer">
                    <a href="/tasks">View Tasks</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-title">Messages</div>
                <div class="card-content">
                    <p>You have <strong>2 new messages</strong>.</p>
                    <p>Check your inbox to see the latest messages.</p>
                </div>
                <div class="card-footer">
                    <a href="#">View Messages</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-title">Online Meetings</div>
                <div class="card-content">
                    <p>You have <strong>{{ collect($events)->count() }}</strong> online meetings scheduled for today.</p>
                    <p>Check your schedule to see what meetings you have.</p>
                </div>
                <div class="card-footer">
                    <a href="#">View Online Meetings</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Project Details -->
    @if($project != null)
    <div class="row mt-20">
        <div class="col-md-6">
            <div class="card">
                <div class="card-title">Your Project Details</div>
                <div class="card-content">
                    <p><strong style="font-size:17px;">Project Name:</strong> <strong style="color:black;font-size:15px;">{{ $project->nom }}</strong></p>
                    <p ><strong style="font-size:17px;">Expiration Date:</strong> <strong style="color:red;">{{ $project->Date_Expire }}</strong></p>
                    <p><strong style="font-size:17px;">Supervisor Name:</strong> <strong style="color:black;">{{ $project->Stagaires->FullName }}</strong> </p>
                    <p><strong style="font-size:17px;">Supervisor Email:</strong> <strong style="color:black;">{{ $project->Stagaires->email }}</strong> </p>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row mt-20">
        <div class="col-md-6">
            <div class="card">
            <div class="card-title">Oops! No Project Found</div>
<div class="card-content">
    <p>It seems that you haven't been assigned any project yet.</p>
</div>

            </div>
        </div>
    </div>
@endif

</div>
@endsection
