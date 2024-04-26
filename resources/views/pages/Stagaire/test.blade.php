@extends('layouts.master_stagaire')
@section('title')
    Home
@endsection
@section('css')
    <style>
    #calendar {
    background-color: #fff;
    font-family: Arial, sans-serif;
    width: 100%;
    max-width: 900px;
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
    <div class="container-fluid">
    <div class="text-right mb-3">
        <button id="btnAssign" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Attribuer un Assignment</button>
    </div>
        <div id="calendar"></div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;"
                                        id="exampleModalLabel">
                                        Add Departement</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form action="{{route('assignment')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                            <div class="col">
                                            <label for="Name"
                                                   class="control-label">Tache Name</label>
                                                   <select name="tache_id" class="form-control">
    <option value="">Sélectionner une tâche</option>
    @foreach($events as $tache)
        <option value="{{ $tache['id'] }}">{{ $tache['title'] }}</option>
    @endforeach
</select>
                                            </div>
                                        <br>
                                        <br>
                                        <div class="col lg-4">
                                        <label for="photo"
                                                   class="control-label">Assignment</label>
                                        <br>
                                                   <input type="file" name="photo" class="form-control" width="150">
                                        </div>
                                        <br>

                                     


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">close</button>
                                    <button type="submit"
                                            class="btn btn-success">Save</button>
                                </div>
                                </form>
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
    var events = <?php echo json_encode($events); ?>;

    events.forEach(function(event) {
        event.title = event.title;
    });

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
