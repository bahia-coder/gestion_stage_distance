@extends('layouts.master')
@section('title')
 Home

@endsection
@section('css')
<style>
  .chart{
    width:"10";
    height:"10";
  }
</style>

@endsection


@section('content')

<div class="container-fluid">
<div class="row g-4 mb-4">
<div class="col-sm-6 col-xl-3"style=" cursor: pointer;">
                        <div class="bg-info rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-cubes  fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Projects</p>
                                <h6 class="mb-0">{{\App\Models\Project::count()}}</h6>
                            </div>
                            <a href="{{route('Project.index')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3" style=" cursor: pointer;">
                        <div class="bg-info rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-list fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Departement</p>
                                <h6 class="mb-0">{{\App\Models\Departement::count()}}</h6>
                            </div>
                            <a href="{{route('Departement.index')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                       

                    </div>
                    <div class="col-sm-6 col-xl-3"style=" cursor: pointer;">
                        <div class="bg-info rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fas fa-user-tie fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Employes</p>
                                <h6 class="mb-0">{{\App\Models\Employe::count()}}</h6>
                            </div>
                            <a href="{{route('Employe.index')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3 "style=" cursor: pointer;">
                        <div class="bg-info rounded d-flex align-items-center justify-content-between p-4 icon">
                            <i class="fas fa-user-graduate fa-3x text-dark"></i>
                            <div class="ms-3">
                                <p class="mb-2">Stagaires</p>
                                <h6 class="mb-0">{{\App\Models\Stagaire::count()}}</h6>
                            </div>
                            <a href="{{route('Stagaire.index')}}" class="small-box-footer ">
                        More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                        </div>
                    </div>
                    
                    
                </div>

        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
              <h5 class="card-title mb-3 fw-semibold">Distribution of Employes and Stagaires by Departement</h5>
              <canvas id="employeeChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="row">
            <div class="col-lg-12">
    <div class="card">
        <!-- Yearly Breakup -->
        <div class="card-body">
            <h5 class="card-title mb-3 fw-semibold">Distribution of Internship Requests by Status</h5>
            <div class="col-10">
                <canvas id="myChartt"></canvas>
            </div>
        </div>
    </div>
</div>

             
            </div>
          </div>
        </div>

    
        
       
      
      
       <div class="row">

<div  style="height: 400px;" class="col-xl-12 mb-30">
    <div class="card card-statistics h-100">
        <div class="card-body">
            <div class="tab nav-border" style="position: relative;">
                <div class="d-block d-md-flex justify-content-between">
                    <div class="d-block w-100">
                        <h5 style="font-family: 'Cairo', sans-serif" class="card-title">les dernier opperation sur system</h5>
                    </div>
                    <div class="d-block d-md-flex nav-tabs-custom">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                        <li class="nav-item">
                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                   href="#students" role="tab" aria-controls="students"
                                   aria-selected="true"> Stagaires</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                   role="tab" aria-controls="teachers" aria-selected="false">Employes
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                   role="tab" aria-controls="parents" aria-selected="false"> Demmandes de Stages
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                   role="tab" aria-controls="fee_invoices" aria-selected="false">Annonces
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="tab-content" id="myTabContent">

                    {{--Stagaire Table--}}
                    <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr  class="table-info text-danger">
                                    <th>#</th>
                                    <th>Stagaire_Name </th>
                                    <th>Stagaire_Email </th>
                                    <th>Stagaire_Telephone </th>
                                    <th>Stagaire_Address </th>
                                    <th>Gender</th>
                                    <th> Departement</th>
                                    <th> Date_debut</th>
                                    <th>Date_fin</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse(\App\Models\Stagaire::latest()->take(5)->get() as $stagaire)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$stagaire->FullName}}</td>
                                        <td>{{$stagaire->email}}</td>
                                        <td>{{$stagaire->telephone}}</td>
                                        <td>{{$stagaire->Address}}</td>
                                        <td>{{$stagaire->genders->Name}}</td>
                                        <td>{{$stagaire->Departements->nom}}</td>
                                        <td>{{$stagaire->Date_debut}}</td>
                                        <td class="text-success">{{$stagaire->Date_fin}}</td>
                                        @empty
                                            <td class="alert-danger" colspan="8">Auccune Donnés </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--employes Table--}}
                    <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr  class="table-info text-danger">
                                <th>#</th>
                                    <th>employe_Name </th>
                                    <th>employe_Email </th>
                                    <th>employe_Telephone </th>
                                    <th>employe_Address </th>
                                    <th>Gender</th>
                                    <th> Departement</th>
                                    <th> Joining_Date</th>
                                </tr>
                                </thead>

                                @forelse(\App\Models\Employe::latest()->take(5)->get() as $employe)
                                    <tbody>
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                        <td>{{$employe->FullName}}</td>
                                        <td>{{$employe->email}}</td>
                                        <td>{{$employe->telephone}}</td>
                                        <td>{{$employe->Address}}</td>
                                        <td>{{$employe->genders->Name}}</td>
                                        <td>{{$employe->Departements->nom}}</td>
                                        <td class="text-success">{{$employe->Joining_Date}}</td>
                                        @empty
                                            <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                    </tr>
                                    </tbody>
                                @endforelse
                            </table>
                        </div>
                    </div>
                    {{--parents Table--}}
                    <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr  class="table-info text-danger">
                                <th>#</th>
                                    <th>Name </th>
                                    <th>Email </th>
                                    <th>Telephone </th>
                                    <th>Address </th>
                                    <th>Gender</th>
                                    <th> Departement</th>
                                    <th> Date_debut</th>
                                    <th>Date_fin</th>
                                    <th>cv</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse(\App\Models\Demmande::latest()->take(5)->get() as $stagaire)
                                    <tr>
                                    <td>{{$loop->iteration}}</td>
                                        <td>{{$stagaire->FullName}}</td>
                                        <td>{{$stagaire->email}}</td>
                                        <td>{{$stagaire->telephone}}</td>
                                        <td>{{$stagaire->Address}}</td>
                                        <td>{{$stagaire->genders->Name}}</td>
                                        <td>{{$stagaire->Departements->nom}}</td>
                                        <td>{{$stagaire->Date_debut}}</td>
                                        <td class="text-success">{{$stagaire->Date_fin}}</td>
                                        <td><a href="{{asset('storage/imgs/'.$stagaire->cv) }}">Télécharger le fichier</a> </td>                                   </td>
                                        @empty
                                            <td class="alert-danger" colspan="8">لاتوجد بيانات</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{--annonces Table--}}
                    <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                        <div class="table-responsive mt-15">
                            <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                <thead>
                                <tr  class="table-info text-danger">
                                    <th>#</th>
                                    <th>Title </th>
                                    <th>download </th>
                                    <th>Date_creation </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse(\App\Models\Annonce::latest()->take(10)->get() as $annonce)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$annonce->Title}}</td>
                                        <td> <a class="btn btn-outline-success danger btn-sm"
class="btn btn-outline-success btn-sm" href="{{route('annonce.pdf',$annonce->id)}}">Download<i class="	fa fa-download" style="color:green"></i></a></td>
                                        <td class="text-success">{{$annonce->created_at}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="alert-danger" colspan="9">لاتوجد بيانات</td>
                                    </tr>
                                @endforelse
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
      

      <div>
      
      </div>
   



        </div>
       

  
    @endsection

    @section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ URL::asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script>
      // Récupération des données depuis le backend Laravel
    const departements = @json($Departements);
    const Departements_emp=@json($Departements_emp);
  

    // Initialisation des tableaux de données pour les employés et les stagiaires
    const employesData = [];
    const stagiairesData = [];

    
    // Parcours de chaque département pour récupérer le nombre d'employés et de stagiaires
    departements.forEach(departement => {
     
    stagiairesData.push(departement.stagaires.length);
   
});
Departements_emp.forEach(departement => {
     
     employesData.push(departement.employes.length);
       
    });
   
   
   
       console.log(stagiairesData);
       // Définition des données pour le graphique
       const data = {
           labels: departements.map(departement => departement.nom),
           datasets: [{
               label: 'Employés',
               data: employesData,
               backgroundColor: 'rgba(54, 162, 235, 0.5)',
               borderColor: 'rgba(54, 162, 235, 1)',
               borderWidth: 1
           }, {
               label: 'Stagiaires',
               data: stagiairesData,
               backgroundColor: 'rgba(255, 99, 132, 0.5)',
               borderColor: 'rgba(255, 99, 132, 1)',
               borderWidth: 1
           }]
       };
   
     
   // Configuration du graphique
const config = {
    type: 'bar',
    data: data,
    options: {
        maintainAspectRatio: true,
        responsive: true,
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            legend: {
                display: true,
                position: 'top',
            }
        },
        layout: {
            padding: {
                left: 50,
                right: 50,
                top: 50,
                bottom: 50
            }
        },
        scales: {
            x: {
                grid: {
                    display: false
                }
            },
            y: {
                beginAtZero: true
            }
        }
    }
};

// Création du graphique
var myChart = new Chart(
    document.getElementById('employeeChart'),
    config
);



     


  
          




   
</script>
<script>
    var ctx = document.getElementById('myChartt').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Confirmed', 'Cancelled', 'Current'],
        datasets: [{
            label: 'Demandes de stage',
            data: [{{ $demmandes_confirmed->count() }}, {{ $demmandes_annuler->count() }}, {{ $demmandes->count() }}],
            backgroundColor: [
                'rgba(54, 162, 235, 1)', // Bleu original
                'rgba(54, 162, 235, 0.7)', // Bleu avec une opacité réduite
                'rgba(54, 162, 235, 0.4)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)', // Bleu original
                'rgba(54, 162, 235, 0.7)', // Bleu avec une opacité réduite
                'rgba(54, 162, 235, 0.4)'  // Bleu avec une opacité encore plus réduite
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});


</script>
    
   
    @endsection
