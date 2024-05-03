@extends('layouts.master_employe')

@section('title', 'Dashboard')

@section('css')
<style>
    .testimonial-image {
        
        margin-bottom: 30px; /* Augmenter l'espacement sous l'image */
        animation: up-down 2s ease-in-out infinite;
    }

    @keyframes up-down {
        0% {
            transform: translateY(0); /* Début de l'animation : pas de translation */
        }
        50% {
            transform: translateY(-10px); /* À mi-chemin de l'animation : translation vers le haut */
        }
        100% {
            transform: translateY(0); /* Fin de l'animation : retour à la position initiale */
        }
    }
   .cardd {
    background-color: #ffffff;
    border: 1px solid #dddddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    height:100%;
    transition: box-shadow 0.3s ease;
}

.card:hover {
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    transform: translateY(-5px); /* Ajout d'une légère élévation au survol */
}

.card-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #9A9BE9;
    height:70px;
}

.card-text {
    font-size: 18px;
    color: #666666;
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



#calendar {
    background-color: #fff;
    font-family: Arial, sans-serif;
    max-width: 600px; /* Ajustez la largeur maximale selon vos besoins */
    margin: 0 auto;
    padding: 10px;
    position: relative;
    top: 10px;
}



.fc-event {
    color: #fff; /* Couleur du texte */
    background-color: #007bff; /* Couleur de fond */
    border: none; /* Supprimer la bordure */
    border-radius: 5px; /* Arrondir les coins */
    padding: 5px 10px; /* Ajouter un espace à l'intérieur */
    font-size: 14px; /* Taille de la police */
}

.fc-toolbar {
    margin-bottom: 20px;
}
.custom-prev-button:hover, .custom-next-button:hover {
    background: #007bff;
}

/* Style pour les boutons de navigation */
.custom-prev-button, .custom-next-button {
    
    
    color: black;
    border: none;
    border-radius: 40%;
    width: 30px;
    height: 30px;
    font-size: 18px;
    line-height: 30px;
    text-align: center;
    cursor: pointer;
    position: absolute;
    top: 13px; /* Positionner un peu plus bas pour l'espace */
}

.custom-prev-button {
    right: 100px;
   
}

.custom-next-button {
    right: 40px;
}

/* Style pour le titre du calendrier */
.fc-toolbar h2 {
    margin-top: 60px; /* Ajouter un espace supplémentaire entre le titre et les boutons */
    text-align: center;
}
.row.g-4.mb-4 {
        margin-bottom: 4rem;
    }

    /* Style pour le titre du calendrier */
    .txt-primary {
        color: #007bff; /* Couleur du texte */
    }

    /* Style pour centrer le titre */
    .text-center {
        text-align: center;
    }
    .cardd {
 
}
.cardd > hr {
  margin-right: 0;
  margin-left: 0;
}
.cardd > .list-group {
  border-top: inherit;
  border-bottom: inherit;
}
.cardd > .list-group:first-child {
  border-top-width: 0;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}
.cardd > .list-group:last-child {
  border-bottom-width: 0;
  border-bottom-right-radius: 0.5rem;
  border-bottom-left-radius: 0.5rem;
}
.cardd > .card-header + .list-group,
.cardd > .list-group + .card-footer {
  border-top: 0;
}

.card-body {
  flex: 1 1 auto;
  padding: 1.5rem 1.5rem;
}

.card-title {
  margin-bottom: 0.875rem;
}

.card-subtitle {
  margin-top: -0.4375rem;
  margin-bottom: 0;
}

.card-text:last-child {
  margin-bottom: 0;
}

.card-link + .card-link {
  margin-left: 1.5rem;
}

.card-header {
  padding: 1.5rem 1.5rem;
  margin-bottom: 0;
  background-color: transparent;
  border-bottom: 0 solid #d9dee3;
}
.card-header:first-child {
  border-radius: 0.5rem 0.5rem 0 0;
}

.card-footer {
  padding: 1.5rem 1.5rem;
  background-color: transparent;
  border-top: 0 solid #d9dee3;
}
.card-footer:last-child {
  border-radius: 0 0 0.5rem 0.5rem;
}

.card-header-tabs {
  margin-right: -0.75rem;
  margin-bottom: -1.5rem;
  margin-left: -0.75rem;
  border-bottom: 0;
}

.card-header-pills {
  margin-right: -0.75rem;
  margin-left: -0.75rem;
}

.card-img-overlay {
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1.5rem;
  border-radius: 0.5rem;
}

.card-img,
.card-img-top,
.card-img-bottom {
  width: 100%;
}

.card-img,
.card-img-top {
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}

.card-img,
.card-img-bottom {
  border-bottom-right-radius: 0.5rem;
  border-bottom-left-radius: 0.5rem;
}

.card-group > .card {
  margin-bottom: 0.8125rem;
}
@media (min-width: 576px) {
  .card-group {
    display: flex;
    flex-flow: row wrap;
  }
  .card-group > .cardd {
    flex: 1 0 0%;
    margin-bottom: 0;
  }
  .card-group > .cardd + .cardd {
    margin-left: 0;
    border-left: 0;
  }
  .card-group > .cardd:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
  }
  .card-group > .cardd:not(:last-child) .card-img-top,
.card-group > .cardd:not(:last-child) .card-header {
    border-top-right-radius: 0;
  }
  .card-group > .cardd:not(:last-child) .card-img-bottom,
.card-group > .card:not(:last-child) .card-footer {
    border-bottom-right-radius: 0;
  }
  .card-group > .cardd:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
  }
  .card-group > .cardd:not(:first-child) .card-img-top,
.card-group > .cardd:not(:first-child) .card-header {
    border-top-left-radius: 0;
  }
  .card-group > .card:not(:first-child) .card-img-bottom,
.card-group > .card:not(:first-child) .card-footer {
    border-bottom-left-radius: 0;
  }
}

.accordion-button {
  position: relative;
  display: flex;
  align-items: center;
  width: 100%;
  padding: 0.79rem 1.125rem;
  font-size: 0.9375rem;
  color: #566a7f;
  text-align: left;
  background-color: #fff;
  border: 0;
  border-radius: 0;
  overflow-anchor: none;
  transition: all 0.2s ease-in-out, border-radius 0.15s ease;
}
.container-xxl {
  padding-right: 1rem;
  padding-left: 1rem;
}
.flex-grow-1 {
  flex-grow: 1 !important;
}
.container-p-y:not([class^=pt-]):not([class*=" pt-"]) {
  padding-top: 1.625rem !important;
}
.container-p-y:not([class^=pb-]):not([class*=" pb-"]) {
  padding-bottom: 1.625rem !important;
}

.car .car-header .dropdown {
  line-height: 1
}
.car .car-header[data-toggle=collapse] {
  text-decoration: none;
  position: relative;
  padding: .75rem 3.25rem .75rem 1.25rem
}
.car{
  background-color: #ffffff;
    border: 1px solid #dddddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   padding:20px;
    transition: box-shadow 0.3s ease;
}
.car .car-header[data-toggle=collapse]::after {
  position: absolute;
  right: 0;
  top: 0;
  padding-right: 1.725rem;
  line-height: 51px;
  font-weight: 900;
  content: '\f107';
  font-family: 'Font Awesome 5 Free'
}

.car .car-header[data-toggle=collapse].collapsed {
  border-radius: .35rem
}

.car .car-header[data-toggle=collapse].collapsed::after {
  content: '\f105'
}

</style>
@endsection
@section('content')
<div class="container-fluid dashboard-container">
<div class="row">
    <div class="col-lg-8 pb-10 order-0">
                  <div class="cardd">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Welcome Back {{auth('employe')->user()->FullName}} !</h5>
                          <p class="mb-4">
                           <strong>
                            
This centralized tool will provide you with a detailed overview of the interns' progress and performance, enabling you to effectively track their development throughout the project.
                           </strong>
                          </p> </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="{{URL::asset('assets/images/man-with-laptop-light.png')}}"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                <div class="row ">
				<div class="col-xl-6 mb-10">
					<div class="cardd height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart1"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">Tasks</div>
								<div class="weight-600 font-14">in progress</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 mb-10">
					<div class="cardd height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart2"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">Tasks</div>
								<div class="weight-600 font-14">Completed</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 mb-10">
					<div class="cardd height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart3"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">Tasks</div>
								<div class="weight-600 font-14">Failure</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-6 mb-10">
					<div class="cardd height-100-p widget-style1">
						<div class="d-flex flex-wrap align-items-center">
							<div class="progress-data">
								<div id="chart4"></div>
							</div>
							<div class="widget-data">
								<div class="h4 mb-0">Tasks</div>
								<div class="weight-600 font-14">awaiting</div>
							</div>
						</div>
					</div>
				</div>
			</div>

                </div>
                
    </div>
<div id="portfolio" class="our-portfolio section">
    <div class="container">
   
      <div class="row">
      @foreach($projects as $project)
        <div class="col-lg-3 col-sm-6">
          <a href="{{route('Employee.Project',$project->id)}}">
            <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
              <div class="hidden-content">
                <h4 >{{ $project->nom }}</h4>
                <p class="card-text"> <strong>Stagaire:</strong> {{ $project->Stagaires->FullName }}</p>
                <p class="card-text"> <strong>Exp_Date:</strong>{{ $project->Date_Expire }}</p>
                
              </div>
              <div class="showed-content">
              <p style="color:blue;">{{ $project->nom }}</p>
                <img src="{{URL::asset('assets/images/Team-project-removebg-preview.png')}}" alt="">
              </div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
      
    </div>
  </div>
 
    <div class="row g-4 mb-4"> 
      
    <div class="col-md-6">
    <div class="cardd mt-20 ml-20">
    <div id="calendar"></div>
    
    </div>
    
    </div>
    <div class="col-xl-5 col-lg-5">
              <div class="car mb-4 mt-20">
                <div class="car-header py-3 d-flex flex-row align-items-center justify-content-between ">
                  <h6 class="m-0 font-weight-bold text-primary">Projects Progress</h6>
                  
                </div>
                <div class="car-body">
                @foreach($projects as $project)
                  <div class="mb-3">
                    <div class="small text-gray-500 ml-10 "> <strong>{{$project->nom}}</strong>
                      <div class="small float-right mr-10"><b>{{$project->Stagaires->FullName}}</b></div>
                    </div>
                    <div class="progress ml-10 mr-10" style="border-radius:8;height:30;">
                    @if($project->Taches->count() != 0)
                      @if((($project->Taches->where('status','terminé')->count())/($project->Taches->count()))*100 <= 30)
                      <div class="progress-bar bg-danger " role="progressbar" style="width: {{(($project->Taches->where('status','terminé')->count())/($project->Taches->count()))*100}}%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                        @elseif((($project->Taches->where('status','terminé')->count())/($project->Taches->count()))*100 <= 50)
                        <div class="progress-bar bg-warning " role="progressbar" style="width: {{(($project->Taches->where('status','terminé')->count())/($project->Taches->count()))*100}}%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                        @elseif((($project->Taches->where('status','terminé')->count())/($project->Taches->count()))*100 <= 80)
                        <div class="progress-bar bg-info " role="progressbar" style="width: {{(($project->Taches->where('status','terminé')->count())/($project->Taches->count()))*100}}%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                        @else
                        <div class="progress-bar bg-success " role="progressbar" style="width: {{(($project->Taches->where('status','terminé')->count())/($project->Taches->count()))*100}}%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                        @endif
                        @else
                        <div class="progress-bar bg-warning " role="progressbar" style="width:0%" aria-valuenow="80"
                        aria-valuemin="0" aria-valuemax="100"></div>
                        @endif
                    </div>
                  </div>
                  @endforeach
                 
                  
                </div>
                
              </div>
			  
            </div>
			
    </div>
</div>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   <script>
    var options = {
	series: [{{$en_cours}}],
	grid: {
		padding: {
			top: 0,
			right: 0,
			bottom: 0,
			left: 0
		},
	},
	chart: {
		height: 100,
		width: 70,
		type: 'radialBar',
	},	
	plotOptions: {
		radialBar: {
			hollow: {
				size: '50%',
			},
			dataLabels: {
				name: {
					show: false,
					color: '#fff'
				},
				value: {
					show: true,
					color: '#333',
					offsetY: 5,
					fontSize: '15px'
				}
			}
		}
	},
	colors: ['#ecf0f4'],
	fill: {
		type: 'gradient',
		gradient: {
			shade: 'dark',
			type: 'diagonal1',
			shadeIntensity: 0.8,
			gradientToColors: ['#1b00ff'],
			inverseColors: false,
			opacityFrom: [1, 0.2],
			opacityTo: 1,
			stops: [0, 100],
		}
	},
	states: {
		normal: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
		hover: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
		active: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
	}
};

var options2 = {
	series: [{{$completed}}],
	grid: {
		padding: {
			top: 0,
			right: 0,
			bottom: 0,
			left: 0
		},
	},
	chart: {
		height: 100,
		width: 70,
		type: 'radialBar',
	},	
	plotOptions: {
		radialBar: {
			hollow: {
				size: '50%',
			},
			dataLabels: {
				name: {
					show: false,
					color: '#fff'
				},
				value: {
					show: true,
					color: '#333',
					offsetY: 5,
					fontSize: '15px'
				}
			}
		}
	},
	colors: ['#ecf0f4'],
	fill: {
		type: 'gradient',
		gradient: {
			shade: 'dark',
			type: 'diagonal1',
			shadeIntensity: 1,
			gradientToColors: ['#009688'],
			inverseColors: false,
			opacityFrom: [1, 0.2],
			opacityTo: 1,
			stops: [0, 100],
		}
	},
	states: {
		normal: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
		hover: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
		active: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
	}
};

var options3 = {
	series: [{{$echec}}],
	grid: {
		padding: {
			top: 0,
			right: 0,
			bottom: 0,
			left: 0
		},
	},
	chart: {
		height: 100,
		width: 70,
		type: 'radialBar',
	},	
	plotOptions: {
		radialBar: {
			hollow: {
				size: '50%',
			},
			dataLabels: {
				name: {
					show: false,
					color: '#fff'
				},
				value: {
					show: true,
					color: '#333',
					offsetY: 5,
					fontSize: '15px'
				}
			}
		}
	},
	colors: ['#ecf0f4'],
	fill: {
		type: 'gradient',
		gradient: {
			shade: 'dark',
			type: 'diagonal1',
			shadeIntensity: 0.8,
			gradientToColors: ['#f56767'],
			inverseColors: false,
			opacityFrom: [1, 0.2],
			opacityTo: 1,
			stops: [0, 100],
		}
	},
	states: {
		normal: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
		hover: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
		active: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
	}
};

var options4 = {
	series: [{{$attente}}],
	grid: {
		padding: {
			top: 0,
			right: 0,
			bottom: 0,
			left: 0
		},
	},
	chart: {
		height: 100,
		width: 70,
		type: 'radialBar',
	},	
	plotOptions: {
		radialBar: {
			hollow: {
				size: '50%',
			},
			dataLabels: {
				name: {
					show: false,
					color: '#fff'
				},
				value: {
					show: true,
					color: '#333',
					offsetY: 5,
					fontSize: '15px'
				}
			}
		}
	},
	colors: ['#ecf0f4'],
	fill: {
		type: 'gradient',
		gradient: {
			shade: 'dark',
			type: 'diagonal1',
			shadeIntensity: 0.8,
			gradientToColors: ['#2979ff'],
			inverseColors: false,
			opacityFrom: [1, 0.5],
			opacityTo: 1,
			stops: [0, 100],
		}
	},
	states: {
		normal: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
		hover: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
		active: {
			filter: {
				type: 'none',
				value: 0,
			}
		},
	}
};

var options5 = {
	chart: {
		height: 350,
		type: 'bar',
		parentHeightOffset: 0,
		fontFamily: 'Poppins, sans-serif',
		toolbar: {
			show: false,
		},
	},
	colors: ['#1b00ff', '#f56767'],
	grid: {
		borderColor: '#c7d2dd',
		strokeDashArray: 5,
	},
	plotOptions: {
		bar: {
			horizontal: false,
			columnWidth: '25%',
			endingShape: 'rounded'
		},
	},
	dataLabels: {
		enabled: false
	},
	stroke: {
		show: true,
		width: 2,
		colors: ['transparent']
	},
	series: [{
		name: 'In Progress',
		data: [40, 28, 47, 22, 34, 25]
	}, {
		name: 'Complete',
		data: [30, 20, 37, 10, 28, 11]
	}],
	xaxis: {
		categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
		labels: {
			style: {
				colors: ['#353535'],
				fontSize: '16px',
			},
		},
		axisBorder: {
			color: '#8fa6bc',
		}
	},
	yaxis: {
		title: {
			text: ''
		},
		labels: {
			style: {
				colors: '#353535',
				fontSize: '16px',
			},
		},
		axisBorder: {
			color: '#f00',
		}
	},
	legend: {
		horizontalAlign: 'right',
		position: 'top',
		fontSize: '16px',
		offsetY: 0,
		labels: {
			colors: '#353535',
		},
		markers: {
			width: 10,
			height: 10,
			radius: 15,
		},
		itemMargin: {
			vertical: 0
		},
	},
	fill: {
		opacity: 1

	},
	tooltip: {
		style: {
			fontSize: '15px',
			fontFamily: 'Poppins, sans-serif',
		},
		y: {
			formatter: function (val) {
				return val
			}
		}
	}
}

var options6 = {
	series: [73],
	chart: {
	  height: 350,
	  type: 'radialBar',
	  offsetY: 0
	},
	colors: ['#0B132B', '#222222'],
	plotOptions: {
	  radialBar: {
		startAngle: -135,
		endAngle: 135,
		dataLabels: {
		  name: {
			fontSize: '16px',
			color: undefined,
			offsetY: 120
		  },
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

var chart = new ApexCharts(document.querySelector("#chart1"), options);
chart.render();

var chart2 = new ApexCharts(document.querySelector("#chart2"), options2);
chart2.render();

var chart3 = new ApexCharts(document.querySelector("#chart3"), options3);
chart3.render();

var chart4 = new ApexCharts(document.querySelector("#chart4"), options4);
chart4.render();

var chart5 = new ApexCharts(document.querySelector("#chart5"), options5);
chart5.render();

var chart6 = new ApexCharts(document.querySelector("#chart6"), options6);
chart6.render();


// datatable init
$('document').ready(function(){
	$('.data-table').DataTable({
		scrollCollapse: true,
		autoWidth: true,
		responsive: true,
		searching: false,
		bLengthChange: false,
		bPaginate: false,
		bInfo: false,
		columnDefs: [{
			targets: "datatable-nosort",
			orderable: false,
		}],
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"language": {
			"info": "_START_-_END_ of _TOTAL_ entries",
			searchPlaceholder: "Search",
			paginate: {
				next: '<i class="ion-chevron-right"></i>',
				previous: '<i class="ion-chevron-left"></i>'  
			}
		},
	});
});
   </script>
   <script>
$(document).ready(function() {
    var events = [];

    @foreach($projects as $project)
        events.push({
            title: '{{ $project->nom }}',
            start: '{{ $project->Date_Expire }}',
            color: '#FF0000 '
        });
    @endforeach

    $('#calendar').fullCalendar({
        events: events,
        header: false,
        eventRender: function(event, element) {
            // Ajouter une info-bulle avec le nom complet du projet
            element.attr('title', event.title);
        },
        viewRender: function(view, element) {
            var prevButton = $('<button class="custom-prev-button">&lt;</button>');
            var nextButton = $('<button class="custom-next-button">&gt;</button>');

            $('.fc-prev-button, .fc-next-button').remove();

            $('#calendar').append(prevButton);
            $('#calendar').append(nextButton);

            prevButton.on('click', function() {
                $('#calendar').fullCalendar('prev');
            });

            nextButton.on('click', function() {
                $('#calendar').fullCalendar('next');
            });

            var calendarTitle = $('#calendar').fullCalendar('getView').title;

            $('#calendar h2').remove();

            $('#calendar').prepend('<h2>' + calendarTitle + '</h2>');
        }
    });
});


    </script>
@endsection
