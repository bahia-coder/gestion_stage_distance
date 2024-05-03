@extends('layouts.master_stagaire')

@section('title', 'Dashboard')

@section('css')
<style>
    .card {
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 60px;
        margin: 10px;
        padding: 30px;
        display: flex;
        flex-direction: column;
    }
	.note{
		max-height:500px;
		overflow-y: auto;
		scrollbar-width: none; /* Cacher la barre de défilement pour Firefox */
    -ms-overflow-style: none; 
		
	}
	p:hover{
		cursor:pointer;
		border-radius:15px;
		margin:3px;
		background-color:rgba(200, 200, 200, 0.5);
	}
    .p-20 {
        display: flex;
        justify-content: space-between;
        align-items: center;
		
		
        margin: 0; /* Ajout de cette ligne pour réinitialiser la marge */
    }
    .p-20 strong {
        margin: 0; /* Ajout de cette ligne pour réinitialiser la marge */
    }
</style>
@endsection

@section('content')
<div class="container-fluid dashboard-container">
    <div class="row">
        <div class="col-md-6 mb-10">
            <div class="cardd">
                <div class="pd-20 card-box height-100-p">
                    <div id="chart9"></div>
                </div>
            </div>
			<img style="margin-left:100px;" src="{{ URL::asset('assets/images/etoils.png') }}" alt="Card image">

        </div>
        <div class="col-md-6 mb-10">
            <div class="card note">
                <div class="card-content">
                    <h3 style="color:blue;">Task Notes</h3>
                        @foreach($taches as $tache)
                        <p class="p-20">
                            <span>{{$tache->Title}}</span>
                            <strong>
                                
                                @if($tache->note==20)
								<i class="fas fa-star text-warning"></i>
								<i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
								@elseif($tache->note==10)
								<i class="fas fa-star text-warning"></i>
								<i class="fas fa-star-half text-warning"></i>
                                <i class="far fa-star text-warning"></i>
								@else
								<i class="far fa-star text-warning"></i>
								<i class="far fa-star text-warning"></i>
								<i class="far fa-star text-warning"></i>
								@endif
                            </strong>
                        </p>
                        <div id="wordcloud"></div>
                        @endforeach		
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var en_attente={{$en_attente}}
    var en_cours={{$en_cours}}
    var overdue={{$overdue}}
    var termine={{$termine}}
    var options9 = {
        series: [overdue, en_attente, en_cours, termine],
        chart: {
            height: 290,
            type: 'radialBar',
        },
        plotOptions: {
            radialBar: {
                offsetY: 0,
                startAngle: 0,
                endAngle: 270,
                hollow: {
                    margin: 5,
                    size: '40%',
                    background: 'transparent',
                    image: undefined,
                },
                dataLabels: {
                    name: {
                        show: false,
                    },
                    value: {
                        show: false,
                    }
                }
            }
        },
        colors: ['#1ab7ea', '#0084ff', '#39539E', '#0077B5'],
        labels: ['Tasks overdu', 'Pending tasks', 'In progress tasks', 'Completed tasks'],
        legend: {
            show: true,
            floating: true,
            fontSize: '14px',
            position: 'left',
            offsetX: 40,
            offsetY: 15,
            labels: {
                useSeriesColors: true,
            },
            markers: {
                size: 0
            },
            formatter: function(seriesName, opts) {
                return seriesName + ":  " + opts.w.globals.series[opts.seriesIndex]
            },
            itemMargin: {
                vertical: 3
            }
        },
        responsive: [{
            breakpoint: 480,
            options: {
                legend: {
                    show: false
                }
            }
        }]
    };
    var chart = new ApexCharts(document.querySelector("#chart9"), options9);
    chart.render();
</script>
@endsection
