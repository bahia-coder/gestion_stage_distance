@extends('layouts.master_stagaire')
@section('title')
    Home
@endsection
@section('css')
<style>
    /* Styles for the testimonial form */
    .testimonial-image {
        width: 300px;
        margin-bottom: 30px; /* Augmenter l'espacement sous l'image */
        animation: up-down 2s ease-in-out infinite;
    }

    @keyframes up-down {
        0% {
            transform: translateY(0); /* Début de l'animation : pas de translation */
        }
        50% {
            transform: translateY(-20px); /* À mi-chemin de l'animation : translation vers le haut */
        }
        100% {
            transform: translateY(0); /* Fin de l'animation : retour à la position initiale */
        }
    }

    .testimonial-form {
        margin-top:100px;
        max-width: 600px; /* Réduire légèrement la largeur du formulaire */
        padding: 20px; /* Ajouter de l'espace intérieur */
        border-radius: 10px; /* Rendre les coins plus arrondis */
        background-color: #f8f9fa; /* Couleur de fond */
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Ajouter une ombre */
        transition: all 0.3s ease; /* Ajouter une transition pour une apparence plus fluide */
    }

    .testimonial-form h5 {
        font-size: 18px; /* Réduire légèrement la taille de la police */
        color: black; /* Couleur du texte */
        margin-bottom: 20px; /* Ajouter de l'espace sous le titre */
    }

    .testimonial-form label {
        font-weight: bold;
        color: #007bff;
    }

    .testimonial-form textarea {
        width: 100%;
        height: 150px;
        margin-top: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 16px;
        resize: none; /* Empêcher le redimensionnement de la zone de texte */
    }

    .testimonial-submit {
        margin-top: 20px;
        text-align: right;
    }

    .testimonial-submit button {
        background-color: #007bff;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease; /* Ajouter une transition pour l'animation au survol */
    }

    .testimonial-submit button:hover {
        background-color: #0056b3; /* Couleur au survol */
    }

</style>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center align-items-center"> <!-- Utilisation de la classe 'justify-content-center' pour centrer horizontalement et 'align-items-center' pour centrer verticalement -->
        <div class="col-md-6"> <!-- Utilisation d'une colonne Bootstrap pour l'image -->
            <center>
                <img src="{{ URL::asset('assets/images/testimonial.png') }}" alt="" class="testimonial-image img-fluid animated">
            </center>
        </div>
        <div class="col-md-6"> <!-- Utilisation d'une colonne Bootstrap pour le formulaire -->
            @if($testimonial==null)
            <div class="testimonial-form">
                <h5><strong>We're always looking to improve, and your feedback is incredibly valuable to us. Could you take a moment to share your experience as a testimonial?</strong></h5>
                <form action="{{ route('Testimonial.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="testimonial">Your Testimonial:</label>
                        <textarea class="form-control" id="testimonial" name="testimonial" rows="5" placeholder="Write your testimonial here..." required></textarea>
                    </div>
                    <div class="testimonial-submit">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
            @else
            <div class="testimonial-form">
                <h5><strong>Thank you for sharing your experience with us!</strong></h5>
                <form action="{{ route('Testimonial.update','test') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="testimonial">Your Testimonial:</label>
                        <textarea class="form-control" id="testimonial" name="testimonial" rows="5" placeholder="Write your testimonial here..." required>{{ $testimonial->testimonial}}</textarea>
                    </div>
                    <div class="testimonial-submit">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('js')

@endsection
