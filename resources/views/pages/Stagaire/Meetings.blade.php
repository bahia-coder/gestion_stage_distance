




@extends('layouts.master_stagaire')

@section('title', 'Dashboard')

@section('css')
<style>
        .card {
  width: 300px; /* Adjust width as needed */
  background-color: #fff;
  box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  border-radius: 5px;
  margin: 10px;
  display: flex;
  flex-direction: column;
}

.card img {
  width: 100%;
  height: 150px; /* Adjust height as needed */
  object-fit: cover;
  
}

.card-content {
  padding: 15px;
  text-align: center;
}

.card-content h3 {
  font-size: 18px;
  margin-bottom: 5px;
}

.card-content p {
  font-size: 14px;
  margin-bottom: 10px;
}

.card-content button {
  background-color: #3498db; /* Adjust button color */
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 3px;
  cursor: pointer;
}
    </style>
@endsection

@section('content')
<div class="container-fluid dashboard-container">
    <div class="row">
@foreach($meetings as $meeting)
<div class="col-md-4">
        <div class="card">
        <img src="{{URL::asset('assets/images/meeting.png')}}" alt="Card image">
        <div class="card-content">
            <h3>{{$meeting->topic}}</h3>
            <p>A meeting is scheduled under the following title: "{{$meeting->topic}}"</p>
            <div class="row">
            <div class="col-md-6" style="position: relative;">
            <i class="far fa-calendar-alt fa-2x" style="color: blue; margin-right: 5px; vertical-align: middle;"></i>
            <h6 style="">{{$meeting->start_at}}</h6>
        </div>

        <div class="col-md-6" style="position: relative;">
            <i class="fas fa-clock fa-2x" style="color: blue; margin-right: 5px; vertical-align: middle;"></i>
            <h6 style="">duration: <br>{{$meeting->duration}}  minutes</h6>
        </div>
            </div>
            <a href="{{$meeting->join_url}}"><button>Join Now</button></a>
        </div>
        </div>
</div>


@endforeach
</div>
</div>
@endsection