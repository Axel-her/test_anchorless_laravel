<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class StepsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure table exists
        if (!Schema::hasTable('steps')) {
            return;
        }

        $now = Carbon::now();

        $steps = [
            [
                'title' => 'Obtenir un NIF (Numéro d\'identification Fiscale)',
                'description' => 'Demandez un numéro d\'identification fiscale portugais (NIF) auprès d\'un « Serviço de Finanças » local ou via une maison du citoyen (Loja do Cidadão). Indispensable pour ouvrir un compte bancaire, signer des contrats et effectuer votre enregistrement fiscal.',
                'order' => 1,
                'required_documents' => 'Passeport ou carte d\'identité nationale ; Justificatif de domicile (contrat de location ou facture de services) ; Représentant fiscal uniquement si requis pour les citoyens hors UE',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Ouvrir un compte bancaire portugais',
                'description' => 'Ouvrez un compte bancaire local pour recevoir votre salaire, payer vos factures et mettre en place des prélèvements automatiques. De nombreuses banques acceptent une ouverture de compte à distance, mais le NIF est généralement requis.',
                'order' => 2,
                'required_documents' => 'NIF ; Passeport ou carte d\'identité ; Justificatif de domicile ; Justificatif de revenus ou d\'emploi (si disponible)',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'S\'enregistrer comme résident (citoyens UE) / Rendez-vous SEF (si requis)',
                'description' => 'Si vous restez plus de 3 mois, les citoyens de l\'UE doivent s\'enregistrer comme résidents et obtenir le certificat d\'enregistrement. Les ressortissants hors UE peuvent avoir besoin d\'un visa ou d\'un titre de séjour via le SEF.',
                'order' => 3,
                'required_documents' => 'Passeport ou carte d\'identité ; Justificatif de domicile ; NIF ; Justificatif d\'emploi ou de ressources suffisantes',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'S\'enregistrer auprès des Finanças (administration fiscale)',
                'description' => 'Confirmez votre statut fiscal et, le cas échéant, enregistrez-vous pour les obligations liées à l\'IRS et à la TVA. Informez les Finanças de votre résidence et mettez à jour vos coordonnées.',
                'order' => 4,
                'required_documents' => 'NIF ; Pièce d\'identité ; Justificatif de domicile ; Contrat de travail ou informations sur l\'activité indépendante',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'S\'enregistrer à la Sécurité sociale (Segurança Social)',
                'description' => 'Si vous êtes salarié ou indépendant, inscrivez-vous auprès de la Segurança Social pour obtenir un numéro de sécurité sociale et accéder aux prestations et cotisations.',
                'order' => 5,
                'required_documents' => 'NIF ; Pièce d\'identité ; Contrat de travail ou enregistrement d\'entreprise ; Justificatif de domicile',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'S\'enregistrer au système de santé public (SNS)',
                'description' => 'Inscrivez-vous au centre de santé local (Centro de Saúde) afin d\'être rattaché à un médecin de famille et d\'accéder au système de santé public SNS.',
                'order' => 6,
                'required_documents' => 'NIF ; Numéro de sécurité sociale (si disponible) ; Pièce d\'identité ; Justificatif de domicile',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Déclarer son adresse auprès de la paroisse locale (Freguesia)',
                'description' => 'Certaines démarches administratives nécessitent une preuve d\'enregistrement local ; déclarez votre adresse si requis par la municipalité.',
                'order' => 7,
                'required_documents' => 'Pièce d\'identité ; Justificatif de domicile ; Contrat de location ou acte de propriété',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Déclarer sa résidence fiscale et mettre à jour son statut fiscal',
                'description' => 'Confirmez votre statut de résidence fiscale pour l\'année en cours et mettez à jour vos informations auprès des Finanças afin de garantir un prélèvement fiscal et des obligations correctes.',
                'order' => 8,
                'required_documents' => 'NIF ; Justificatif de domicile ; Informations sur l\'emploi ou les revenus ; Déclarations fiscales de l\'année précédente (le cas échéant)',
                'created_at' => $now,
                'updated_at' => $now,
            ],

        ];

        DB::table('steps')->insert($steps);
    }
}
