<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departement;
class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Exemple de données fictives pour les départements
            $departements = [
                [
                    'nom' => 'Développement',
                    'description' => 'Département chargé du développement des logiciels.',
                ],
                [
                    'nom' => 'Marketing',
                    'description' => 'Département chargé de la promotion des produits et services.',
                ],
                [
                    'nom' => 'Ressources Humaines',
                    'description' => 'Département chargé de la gestion du personnel et des ressources humaines.',
                ],
            ];

            // Ajouter les départements à la base de données
            foreach ($departements as $departement) {
                Departement::create($departement);
            }
    }
}
