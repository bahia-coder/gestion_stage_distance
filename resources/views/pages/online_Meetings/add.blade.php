@extends('layouts.master_employe')

@section('css')
<style>
    /* Utilisez vos propres styles CSS personnalisés ici */
    .meet {
        display: block;
        margin: 0 auto; /* Centrer l'image horizontalement */
        width: 100%;
        max-width: 400px; /* Ajuster la largeur de l'image selon vos besoins */
        margin-bottom: 20px; /* Espacement sous l'image */
        
    }

    .form-group {
        margin-bottom: 30px; /* Espacement entre les champs */
    }

    .form-label {
        font-weight: bold;
    }

    .btn-lg {
        padding: 15px 25px; /* Ajuster la taille des boutons */
        font-size: 18px; /* Ajuster la taille du texte du bouton */
    }

    .card {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Ajouter une ombre légère à la carte */
    }

    .card-body {
        padding: 30px; /* Espacement interne de la carte */
    }

    .btn-submit {
        width: auto; /* Ajuster la largeur du bouton en fonction du contenu */
    }
</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-7 mt-20">
            <div class="card">
                <div class="card-body">
                    <h2 class="" style="text-align: center;">Information about meeting</h2>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="post" action="{{ route('online_classes.store') }}" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="Stagaire_id">Trainee:</label>
                            <select class="custom-select" name="Stagaire_id">
                                <option selected disabled>Choose...</option>
                                @foreach ($Stagaires as $Stagaire)
                                <option value="{{ $Stagaire->id }}">{{ $Stagaire->FullName }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="topic">Meeting Topic:</label>
                            <input class="form-control" name="topic" type="text" placeholder="Topic">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="start_time">Start Meeting Date:</label>
                            <input class="form-control" type="datetime-local" name="start_time">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="duration">Duration of Meeting:</label>
                            <input class="form-control" name="duration" type="text" placeholder="Duration">
                        </div>

                        <button class="btn btn-info btn-lg btn-submit" type="submit">Create</button>
                    </form>

                </div>
            </div>
        </div>
        <div class="col-md-5 mt-20">
            <img src="{{ URL::asset('assets/images/ttt.png') }}" alt="" class="meet">
            <img src="{{ URL::asset('assets/images/team.png') }}" alt="" class="meet">
        </div>
    </div>
</div>
@endsection
