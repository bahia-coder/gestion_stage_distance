<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .company-name {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            color: #333;
        }

        .announcement {
            text-align: center;
            margin-bottom: 30px;
        }

        .announcement h1 {
            font-size: 36px;
            margin: 0;
            padding: 10px 0;
            border-bottom: 2px solid #333;
            display: inline-block;
        }

        .announcement h4 {
            font-size: 24px;
            margin: 20px 0;
            color: #333;
        }

        .announcement p {
            font-size: 16px;
            line-height: 1.5;
            color: #666;
        }

        .signature {
            text-align: center;
            margin-top: 50px;
        }

        .signature h2 {
            font-size: 24px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://th.bing.com/th/id/OIP.V1Yh5BrI7AUssNE4zmXD5AHaIq?pid=ImgDet&rs=1" alt="Logo de la société">
        </div>
        <div class="company-name">
            Nom de la société
        </div>
        <div class="announcement">
            <h1>Annonce</h1>
            <h4>{{ $annonce->Title }}</h4>
            <p>{{ $annonce->Body }}</p>
        </div>
        <div class="signature">
            <h2>Signature</h2>
            <br>
            <img src="{{$annonce->signature}}" alt="Signature de l'utilisateur">
        </div>
    </div>
</body>
</html>
