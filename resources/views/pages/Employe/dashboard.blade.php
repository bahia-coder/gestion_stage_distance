@extends('layouts.master_employe')

@section('title', 'Dashboard')

@section('css')
<style>
   .card {
    background-color: #ffffff;
    border: 1px solid #dddddd;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 30px;
    height: 100%;
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
    padding: 20px;
    position: relative;
    top: 10px;
}


.fc-event {
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    padding: 5px 10px;
    font-size: 14px;
}

.fc-toolbar {
    margin-bottom: 20px;
}

/* Style pour les boutons de navigation */
.custom-prev-button, .custom-next-button {
    background: #007bff;
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 30px;
    height: 30px;
    font-size: 18px;
    line-height: 30px;
    text-align: center;
    cursor: pointer;
    position: absolute;
    top: 20px; /* Positionner un peu plus bas pour l'espace */
}

.custom-prev-button {
    right: 150px;
}

.custom-next-button {
    right: 100px;
}

/* Style pour le titre du calendrier */
.fc-toolbar h2 {
    margin-top: 60px; /* Ajouter un espace supplémentaire entre le titre et les boutons */
    text-align: center;
}

</style>
@endsection

@section('content')
<div class="container-fluid dashboard-container">
    <div class="row g-4 mb-4">
    
        @foreach($projects as $project)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->nom }}</h5>
                    <p class="card-text"> <strong>Stagaire:</strong> {{ $project->Stagaires->FullName }}</p>
                    <p class="card-text"> <strong>Ex_Date:</strong> <label for="" style="color:red;">{{ $project->Date_Expire }}</label></p>
                </div>
                <div class="card-footer">
                    <a href="{{route('Employee.Project',$project->id)}}" class="btn">More info</a>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <div class="row g-4 mb-4"> 
    <div class="col-md-6">
    <div id="calendar"></div>
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
      $(document).ready(function() {
        var events = [];

@foreach($projects as $project)
    events.push({
        title: '{{ $project->nom }}',
        start: '{{ $project->Date_Expire }}', // Supposant que Date_Expire contient la date de début de l'événement
        color: '#FF0000 ' // Couleur des événements
    });
@endforeach

    $('#calendar').fullCalendar({
        events: events,
        header: false,
        // Fonction pour ajouter les boutons de navigation personnalisés et le titre du calendrier
        viewRender: function(view, element) {
            var prevButton = $('<button class="custom-prev-button">&lt;</button>');
            var nextButton = $('<button class="custom-next-button">&gt;</button>');

            // Supprimer les boutons de navigation par défaut
            $('.fc-prev-button, .fc-next-button').remove();

            // Ajouter les boutons de navigation personnalisés
            $('#calendar').append(prevButton);
            $('#calendar').append(nextButton);

            // Gérer les actions des boutons de navigation
            prevButton.on('click', function() {
                $('#calendar').fullCalendar('prev');
            });

            nextButton.on('click', function() {
                $('#calendar').fullCalendar('next');
            });

            // Récupérer le titre du calendrier (mois et année)
            var calendarTitle = $('#calendar').fullCalendar('getView').title;

            // Vider le contenu précédent du titre
            $('#calendar h2').remove();

            // Ajouter le nouveau titre au-dessus du calendrier
            $('#calendar').prepend('<h2>' + calendarTitle + '</h2>');
        }
    });
});

    </script>
@endsection
