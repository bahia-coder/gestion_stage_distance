<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('photo.save')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="photo">
        <button type="submit">submit</button>
    </form>
</body>
</html>











<!-- const departements = @json($Departements);
    // Initialisation des tableaux de données pour les employés et les stagiaires
    const employesData = [];
    const stagiairesData = [];

    // Parcours de chaque département pour récupérer le nombre d'employés et de stagiaires
    departements.forEach(departement => {
        employesData.push(departement.employes.length);
        stagiairesData.push(departement.stagaires.length);
    });

    // Définition des données pour le graphique
    const data = {
        labels: departements.map(departement => departement.name),
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
            scales: {
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
</script> -->