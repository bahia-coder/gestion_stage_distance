@extends('layouts.master_stagaire')

@section('title', 'Dashboard')

@section('css')

<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
<style>
    
        img {
        vertical-align: middle;
        border-style: none; }
        .ftco-section {
        padding: 7em 0; }

        .ftco-no-pt {
        padding-top: 0; }

        .ftco-no-pb {
        padding-bottom: 0; }

        .heading-section {
        font-size: 28px;
        color: #000; }

        .img {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center center; }

        .elegant-calencar {
        max-width: 300px;
        max-height: 290px;
        text-align: center;
        overflow: hidden;
        border-radius: 5px;}

        .wrap-header {
        position: relative;
        width: 100%;
        background: #39cb75; }
        @media (max-width: 767.98px) {
            .wrap-header {
            width: 100%;
            padding: 20px 0; } }

        #header {
        width: 100%;
        position: relative; }
        #header .pre-button, #header .next-button {
            cursor: pointer;
            width: 1em;
            height: 1em;
            line-height: 1em;
            border-radius: 50%;
            position: absolute;
            top: 26%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            font-size: 18px; }
            #header .pre-button i, #header .next-button i {
            color: #fff; }

        .pre-button {
        left: 0px; }

        .next-button {
        right: 0px; }

        .head-day {
        font-size: 2em;
        line-height: 1;
        color: #fff; }

        .head-month {
        font-size: 1em;
        line-height: 1;
        color: #fff;
        font-size: 18px;
        text-transform: uppercase; }

        .calendar-wrap {
        width: 100%;
        background: #fff;
        
        padding: 20px  25px; }

        #calendar {
        width: 100%;
        margin:10px; }

        #calendar tr {
        height: 3em; }

        thead tr {
        color: #000;
        font-weight: 500; }

        tbody tr {
        color: #000; }

        tbody td {
        width: 10%;
        border-radius: 50%;
        cursor: pointer;
        -webkit-transition: all 0.2s ease-in;
        -o-transition: all 0.2s ease-in;
        transition: all 0.2s ease-in;
        position: relative;
        z-index: 0; }
        tbody td:after {
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            width: 20px;
            height: 20px;
            margin: 0 auto;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            border-radius: 50%;
            -webkit-transition: 0.3s;
            -o-transition: 0.3s;
            transition: 0.3s;
            z-index: -1; }
            @media (prefers-reduced-motion: reduce) {
            tbody td:after {
                -webkit-transition: none;
                -o-transition: none;
                transition: none; } }

      
        

        tbody td:active {
        -webkit-transform: scale(0.7);
        -ms-transform: scale(0.7);
        transform: scale(0.7); }

        #today {
        color: #fff; }
        #today:after {
            background: #39cb75; 
            
        
        }

        #disabled {
        cursor: default;
        background: #fff; }

        #disabled:hover {
        background: #fff;
        color: #c9c9c9; }
        #disabled:hover:after {
            background: transparent; }

        #reset {
        display: block;
        position: absolute;
        right: 0.5em;
        top: 0.5em;
        z-index: 999;
        color: rgba(255, 255, 255, 0.7);
        cursor: pointer;
        padding: 0 0.5em;
        border: 1px solid rgba(255, 255, 255, 0.4);
        border-radius: 4px;
        -webkit-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        transition: all 0.3s ease;
        text-transform: uppercase;
        font-size: 11px; }

        #reset:hover {
        color: #fff;
        border-color: #fff; }

        #reset:active {
        -webkit-transform: scale(0.8);
        -ms-transform: scale(0.8);
        transform: scale(0.8); }

</style>
            <!-- Icon Font Stylesheet -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" rel="stylesheet">
        <!-- FullCalendar CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.9.0/main.min.css" rel="stylesheet">

       
<style>
            /* Styles for the dashboard list*/
            .dashboard-container {
                padding: 20px;
            }

            
            .card-img-top{
                width:100%;
                height:155px;
        }
        .card{
            border-radius: 30px;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
            
        }
        .card-body{
            padding: 25px;
            margin-top: -15px;
        
        }
        .card-text{
        
        }
        .btn-primary{
            border-radius: 50px;
            width: 120px;
            margin:0px;
        }
        .btn-primary:hover{
            background-color: black;
            border: none;
        }
        h3,h5{
            color: rgb(0, 91, 228);
        }

                    .card:hover {
                        box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
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

<style>



        .pd-ltr-20 {
            padding: 10px;
        }
        .card-box{
            max-height:290px;
}
        .container-fluid {
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }
        .pt-4 {
            padding-top: 1.5rem;
        }
        .px-4 {
            padding-right: 1.5rem;
            padding-left: 1.5rem;
        }
        #calender {
            background-color:green;
        }

        .card-box {
            padding: 20px;
            background-color: #fff;
            border: 1px solid #e6e6e6;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
        }
        .mb-30 {
            margin-bottom: 30px;
        }
        .align-items-center {
            align-items: center;
        }
        .col-md-4 {
            flex: 0 0 33.333333%;
            max-width: 33.333333%;
        }
        .col-md-8 {
            flex: 0 0 66.666667%;
            max-width: 66.666667%;
        }
        .font-20 {
            font-size: 20px;
        }
        .weight-500 {
            font-weight: 500;
        }
        .mb-10 {
            margin-bottom: 10px;
        }
        .text-capitalize {
            text-transform: capitalize;
        }
        .font-30 {
            font-size: 30px;
        }
        .text-blue {
            color: blue;
        }
        .font-18 {
            font-size: 18px;
        }
        .max-width-600 {
            max-width: 600px;
        }
</style>

@endsection

@section('content')
<div class="container-fluid dashboard-container">
    <!-- Dashboard Header -->
    <div class="pd-ltr-20">
    <div class="container-fluid  px-4">
        <div class="card-box pd-20 mb-15">
            <div class="row align-items-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <img src="{{URL::asset('assets/images/banner-img.png')}}" alt="" class="img-fluid">
                </div>
                <div class="col-md-8">
                    <h4 class="font-20 weight-500 mb-10 text-capitalize">
                        Welcome back 
                        <div class="weight-600 font-30 text-blue mt-20">{{auth('stagaire')->user()->FullName}}!</div>
                    </h4>
                    @if($project!=null)
                    <div class="card-title mb-3" > <strong style="margin-left:150px;">Your Project Details</strong> </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong style="font-size:17px;">Project Name:</strong><br><strong style="color:black;font-size:15px;">{{ $project->nom }}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong style="font-size:17px;">Expiration Date:</strong><br><strong style="color:red;">{{ $project->Date_Expire }}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong style="font-size:17px;">Supervisor Name:</strong><br><strong style="color:black;">{{ $project->Employes->FullName }}</strong></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong style="font-size:17px;">Supervisor Email:</strong><br><strong style="color:black;">{{ $project->Employes->email }}</strong></p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="card-title">Oops! No Project Found</div>
                    <div class="card-content">
                        <p>It seems that you haven't been assigned any project yet.</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <div class="container-fluid  px-4">
<div class="container-fluid">
    <div class="row g-4">
        <div class="col-sm-12 col-md-6 col-xl-3 mb-20">
            <!-- <div class="card">
                <div class="card-body">
                    @if($tachess)
                    <h5 class="card-title">Upcoming Meetings</h5>
                    <p class="card-text">You have {{$meetings->count()}} upcoming meetings scheduled.</p>
                    <a href="#" class="btn btn-primary mt-10">More info</a>
                    @else
                    <h5 class="card-title">No Scheduled Meetings</h5>
                    <p class="card-text">You don't have any meetings scheduled at the moment.</p>
                    @endif
                </div>
            </div> -->
            <div class="card">
            <img src="https://www.cpomagazine.com/wp-content/uploads/2023/08/zoom-ai-data-collection-catching-users-by-surprise-may-face-regulatory-action-in-eu_1500.jpg" class="card-img-top" alt="...">
                    
                    <div class="card-body">
                        
                        <p class="card-text">You have {{$meetings->count()}} upcoming meetings scheduled.</p>
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        
                      <a href="/Meetings"><button class="btn btn-primary">More info</button></a>  
                    </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-3 mb-20">
           <!--  <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Assignment Notes</h5>
                    <p class="card-text">Your Assignment notes are available for review.</p>
                    <a href="#" class="btn btn-primary mt-10">More info</a>
                </div>
            </div> -->
            <div class="card">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbYmCB0Y__3lgM0PsEEXaTaGQsWIN4iu2vg1Q0Pb-22UucY2TRJ5v1LBfvC116Xg7lnS8&usqp=CAU" class="card-img-top" alt="...">
                    
                    <div class="card-body ">
                        <p class="card-text d-flex justify-content-around">Your Assignment notes are available for review.</p>
                    </div>
                    <div class="mb-5 d-flex justify-content-around">
                        
                      <a href="/Notes"><button class="btn btn-primary">More info</button></a>  
                    </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-xl-3 mb-20">
            <div class="card h-100 bg-white rounded p-4" style="max-height:290px;">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h6 class="mb-0"><strong>To Do List</strong></h6>
                    <a href="/Tasks" style="color:blue;"><strong>Show More</strong></a>
                </div>
                <div class="d-flex flex-column">
                    @foreach($tachess as $tache)
                    @if((new DateTime($tache->end))->format('Y-m-d') < (new DateTime('today'))->format('Y-m-d'))
                    <div class="d-flex align-items-center border-bottom py-2">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span><del>{{$tache->Title}}.</del></span>
                                <span><del>{{$tache->end}}.</span>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="d-flex align-items-center border-bottom py-2">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 align-items-center justify-content-between">
                                <span>{{$tache->Title}}</span>
                                <span style="color:red;">{{$tache->end}}</span>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-3 mb-20">
					<div class="card-box  ">
						<h2 class="h4 ">Completed Tasks</h2>
						<div id="chart6"></div>
					</div>
				</div>
        <div class="col-sm-12 col-md-6 col-xl-3 mb-20">
        <div class="">
            <div class="">
                <div class="">
                    <div class="elegant-calencar d-md-flex">
                        <div class="wrap-header d-flex align-items-center">
                            <p id="reset">reset</p>
                            <div id="header" class="p-0">
                                <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
                                <div class="head-info">
                                    <div class="head-day"></div>
                                    <div class="head-month"></div>
                                </div>
                                <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
                            </div>
                        </div>
                        <div class="calendar-wrap">
                            <table id="calendar">
                                <thead>
                                    <tr>
                                        <th>Su</th>
                                        <th>Mo</th>
                                        <th>Tu</th>
                                        <th>We</th>
                                        <th>Th</th>
                                        <th>Fr</th>
                                        <th>Sa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                    
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	              
                                    <!-- Repeat rows for calendar -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
	

</div>
</div>
</div>
      

</div>
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
      var seriesValue = {{ $pourcentage }};
var options6 = {
	series: [seriesValue],
	chart: {
	  height: 300,
	  type: 'radialBar',
	  offsetY: 0
	},
	colors: ['#0B132B', '#222222'],
	plotOptions: {
	  radialBar: {
		startAngle: -135,
		endAngle: 135,
		dataLabels: {
		
		  value: {
			offsetY: 76,
			fontSize: '22px',
			color: undefined,
			formatter: function (val) {
			  return val + "%";
			}
		  }
		}
	  }
	},
	fill: {
	  type: 'gradient',
	  gradient: {
		  shade: 'dark',
		  shadeIntensity: 0.15,
		  inverseColors: false,
		  opacityFrom: 1,
		  opacityTo: 1,
		  stops: [0, 50, 65, 91]
	  },
	},
	stroke: {
	  dashArray: 4
	},
	labels: ['Achieve Goals'],
};

var chart6 = new ApexCharts(document.querySelector("#chart6"), options6);
chart6.render();
    (function($) {

	"use strict";

	document.addEventListener('DOMContentLoaded', function(){
    var today = new Date(),
        year = today.getFullYear(),
        month = today.getMonth(),
        monthTag =["January","February","March","April","May","June","July","August","September","October","November","December"],
        day = today.getDate(),
        days = document.getElementsByTagName('td'),
        selectedDay,
        setDate,
        daysLen = days.length;
// options should like '2014-01-01'
    function Calendar(selector, options) {
        this.options = options;
        this.draw();
    }
    
    Calendar.prototype.draw  = function() {
        this.getCookie('selected_day');
        this.getOptions();
        this.drawDays();
        var that = this,
            reset = document.getElementById('reset'),
            pre = document.getElementsByClassName('pre-button'),
            next = document.getElementsByClassName('next-button');
            
            pre[0].addEventListener('click', function(){that.preMonth(); });
            next[0].addEventListener('click', function(){that.nextMonth(); });
            reset.addEventListener('click', function(){that.reset(); });
        while(daysLen--) {
            days[daysLen].addEventListener('click', function(){that.clickDay(this); });
        }
    };
    
    Calendar.prototype.drawHeader = function(e) {
        var headDay = document.getElementsByClassName('head-day'),
            headMonth = document.getElementsByClassName('head-month');

            e?headDay[0].innerHTML = e : headDay[0].innerHTML = day;
            headMonth[0].innerHTML = monthTag[month] +" - " + year;        
     };
    
    Calendar.prototype.drawDays = function() {
        var startDay = new Date(year, month, 1).getDay(),
//      下面表示这个月总共有几天
            nDays = new Date(year, month + 1, 0).getDate(),
    
            n = startDay;
//      清除原来的样式和日期
        for(var k = 0; k <42; k++) {
            days[k].innerHTML = '';
            days[k].id = '';
            days[k].className = '';
        }

        for(var i  = 1; i <= nDays ; i++) {
            days[n].innerHTML = i; 
            n++;
        }
        
        for(var j = 0; j < 42; j++) {
            if(days[j].innerHTML === ""){
                
                days[j].id = "disabled";
                
            }else if(j === day + startDay - 1){
                if((this.options && (month === setDate.getMonth()) && (year === setDate.getFullYear())) || (!this.options && (month === today.getMonth())&&(year===today.getFullYear()))){
                    this.drawHeader(day);
                    days[j].id = "today";
                }
            }
            if(selectedDay){
                if((j === selectedDay.getDate() + startDay - 1)&&(month === selectedDay.getMonth())&&(year === selectedDay.getFullYear())){
                days[j].className = "selected";
                this.drawHeader(selectedDay.getDate());
                }
            }
        }
    };
    
    Calendar.prototype.clickDay = function(o) {
        var selected = document.getElementsByClassName("selected"),
            len = selected.length;
        if(len !== 0){
            selected[0].className = "";
        }
        o.className = "selected";
        selectedDay = new Date(year, month, o.innerHTML);
        this.drawHeader(o.innerHTML);
        this.setCookie('selected_day', 1);
        
    };
    
    Calendar.prototype.preMonth = function() {
        if(month < 1){ 
            month = 11;
            year = year - 1; 
        }else{
            month = month - 1;
        }
        this.drawHeader(1);
        this.drawDays();
    };
    
    Calendar.prototype.nextMonth = function() {
        if(month >= 11){
            month = 0;
            year =  year + 1; 
        }else{
            month = month + 1;
        }
        this.drawHeader(1);
        this.drawDays();
    };
    
    Calendar.prototype.getOptions = function() {
        if(this.options){
            var sets = this.options.split('-');
                setDate = new Date(sets[0], sets[1]-1, sets[2]);
                day = setDate.getDate();
                year = setDate.getFullYear();
                month = setDate.getMonth();
        }
    };
    
     Calendar.prototype.reset = function() {
         month = today.getMonth();
         year = today.getFullYear();
         day = today.getDate();
         this.options = undefined;
         this.drawDays();
     };
    
    Calendar.prototype.setCookie = function(name, expiredays){
        if(expiredays) {
            var date = new Date();
            date.setTime(date.getTime() + (expiredays*24*60*60*1000));
            var expires = "; expires=" +date.toGMTString();
        }else{
            var expires = "";
        }
        document.cookie = name + "=" + selectedDay + expires + "; path=/";
    };
    
    Calendar.prototype.getCookie = function(name) {
        if(document.cookie.length){
            var arrCookie  = document.cookie.split(';'),
                nameEQ = name + "=";
            for(var i = 0, cLen = arrCookie.length; i < cLen; i++) {
                var c = arrCookie[i];
                while (c.charAt(0)==' ') {
                    c = c.substring(1,c.length);
                    
                }
                if (c.indexOf(nameEQ) === 0) {
                    selectedDay =  new Date(c.substring(nameEQ.length, c.length));
                }
            }
        }
    };
    var calendar = new Calendar();
    
        
}, false);

})(jQuery);

</script>
<script>
    (function($) {

"use strict";

document.addEventListener('DOMContentLoaded', function(){
var today = new Date(),
    year = today.getFullYear(),
    month = today.getMonth(),
    monthTag =["January","February","March","April","May","June","July","August","September","October","November","December"],
    day = today.getDate(),
    days = document.getElementsByTagName('td'),
    selectedDay,
    setDate,
    daysLen = days.length;
// options should like '2014-01-01'
function Calendar(selector, options) {
    this.options = options;
    this.draw();
}

Calendar.prototype.draw  = function() {
    this.getCookie('selected_day');
    this.getOptions();
    this.drawDays();
    var that = this,
        reset = document.getElementById('reset'),
        pre = document.getElementsByClassName('pre-button'),
        next = document.getElementsByClassName('next-button');
        
        pre[0].addEventListener('click', function(){that.preMonth(); });
        next[0].addEventListener('click', function(){that.nextMonth(); });
        reset.addEventListener('click', function(){that.reset(); });
    while(daysLen--) {
        days[daysLen].addEventListener('click', function(){that.clickDay(this); });
    }
};

Calendar.prototype.drawHeader = function(e) {
    var headDay = document.getElementsByClassName('head-day'),
        headMonth = document.getElementsByClassName('head-month');

        e?headDay[0].innerHTML = e : headDay[0].innerHTML = day;
        headMonth[0].innerHTML = monthTag[month] +" - " + year;        
 };

Calendar.prototype.drawDays = function() {
    var startDay = new Date(year, month, 1).getDay(),
//      下面表示这个月总共有几天
        nDays = new Date(year, month + 1, 0).getDate(),

        n = startDay;
//      清除原来的样式和日期
    for(var k = 0; k <42; k++) {
        days[k].innerHTML = '';
        days[k].id = '';
        days[k].className = '';
    }

    for(var i  = 1; i <= nDays ; i++) {
        days[n].innerHTML = i; 
        n++;
    }
    
    for(var j = 0; j < 42; j++) {
        if(days[j].innerHTML === ""){
            
            days[j].id = "disabled";
            
        }else if(j === day + startDay - 1){
            if((this.options && (month === setDate.getMonth()) && (year === setDate.getFullYear())) || (!this.options && (month === today.getMonth())&&(year===today.getFullYear()))){
                this.drawHeader(day);
                days[j].id = "today";
            }
        }
        if(selectedDay){
            if((j === selectedDay.getDate() + startDay - 1)&&(month === selectedDay.getMonth())&&(year === selectedDay.getFullYear())){
            days[j].className = "selected";
            this.drawHeader(selectedDay.getDate());
            }
        }
    }
};

Calendar.prototype.clickDay = function(o) {
    var selected = document.getElementsByClassName("selected"),
        len = selected.length;
    if(len !== 0){
        selected[0].className = "";
    }
    o.className = "selected";
    selectedDay = new Date(year, month, o.innerHTML);
    this.drawHeader(o.innerHTML);
    this.setCookie('selected_day', 1);
    
};

Calendar.prototype.preMonth = function() {
    if(month < 1){ 
        month = 11;
        year = year - 1; 
    }else{
        month = month - 1;
    }
    this.drawHeader(1);
    this.drawDays();
};

Calendar.prototype.nextMonth = function() {
    if(month >= 11){
        month = 0;
        year =  year + 1; 
    }else{
        month = month + 1;
    }
    this.drawHeader(1);
    this.drawDays();
};

Calendar.prototype.getOptions = function() {
    if(this.options){
        var sets = this.options.split('-');
            setDate = new Date(sets[0], sets[1]-1, sets[2]);
            day = setDate.getDate();
            year = setDate.getFullYear();
            month = setDate.getMonth();
    }
};

 Calendar.prototype.reset = function() {
     month = today.getMonth();
     year = today.getFullYear();
     day = today.getDate();
     this.options = undefined;
     this.drawDays();
 };

Calendar.prototype.setCookie = function(name, expiredays){
    if(expiredays) {
        var date = new Date();
        date.setTime(date.getTime() + (expiredays*24*60*60*1000));
        var expires = "; expires=" +date.toGMTString();
    }else{
        var expires = "";
    }
    document.cookie = name + "=" + selectedDay + expires + "; path=/";
};

Calendar.prototype.getCookie = function(name) {
    if(document.cookie.length){
        var arrCookie  = document.cookie.split(';'),
            nameEQ = name + "=";
        for(var i = 0, cLen = arrCookie.length; i < cLen; i++) {
            var c = arrCookie[i];
            while (c.charAt(0)==' ') {
                c = c.substring(1,c.length);
                
            }
            if (c.indexOf(nameEQ) === 0) {
                selectedDay =  new Date(c.substring(nameEQ.length, c.length));
            }
        }
    }
};
var calendar = new Calendar();

    
}, false);

})(jQuery);

</script>
   
@endsection

