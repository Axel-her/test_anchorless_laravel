<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $now = now();

        DB::table('steps')->where('order', 1)->update([
            'title' => "Obtenir un NIF (Número de Identificação Fiscal)",
            'description' => "Demandez un numéro d'identification fiscale portugais (NIF) auprès d'un « Serviço de Finanças » local ou via une maison du citoyen (Loja do Cidadão). Indispensable pour ouvrir un compte bancaire, signer des contrats et effectuer votre enregistrement fiscal.",
            'required_documents' => "Passeport ou carte d'identité nationale ; Justificatif de domicile (contrat de location ou facture de services) ; Représentant fiscal uniquement si requis pour les citoyens hors UE",
            'updated_at' => $now,
        ]);

        DB::table('steps')->where('order', 2)->update([
            'title' => "Ouvrir un compte bancaire portugais",
            'description' => "Ouvrez un compte bancaire local pour recevoir votre salaire, payer vos factures et mettre en place des prélèvements automatiques. De nombreuses banques acceptent une ouverture de compte à distance, mais le NIF est généralement requis.",
            'required_documents' => "NIF ; Passeport ou carte d'identité ; Justificatif de domicile ; Justificatif de revenus ou d'emploi (si disponible)",
            'updated_at' => $now,
        ]);

        DB::table('steps')->where('order', 3)->update([
            'title' => "S'enregistrer comme résident (citoyens UE) / Rendez-vous SEF (si requis)",
            'description' => "Si vous restez plus de 3 mois, les citoyens de l'UE doivent s'enregistrer comme résidents et obtenir le certificat d'enregistrement. Les ressortissants hors UE peuvent avoir besoin d'un visa ou d'un titre de séjour via le SEF.",
            'required_documents' => "Passeport ou carte d'identité ; Justificatif de domicile ; NIF ; Justificatif d'emploi ou de ressources suffisantes",
            'updated_at' => $now,
        ]);

        DB::table('steps')->where('order', 4)->update([
            'title' => "S'enregistrer auprès des Finanças (administration fiscale)",
            'description' => "Confirmez votre statut fiscal et, le cas échéant, enregistrez-vous pour les obligations liées à l'IRS et à la TVA. Informez les Finanças de votre résidence et mettez à jour vos coordonnées.",
            'required_documents' => "NIF ; Pièce d'identité ; Justificatif de domicile ; Contrat de travail ou informations sur l'activité indépendante",
            'updated_at' => $now,
        ]);

        DB::table('steps')->where('order', 5)->update([
            'title' => "S'enregistrer à la Sécurité sociale (Segurança Social)",
            'description' => "Si vous êtes salarié ou indépendant, inscrivez-vous auprès de la Segurança Social pour obtenir un numéro de sécurité sociale et accéder aux prestations et cotisations.",
            'required_documents' => "NIF ; Pièce d'identité ; Contrat de travail ou enregistrement d'entreprise ; Justificatif de domicile",
            'updated_at' => $now,
        ]);

        DB::table('steps')->where('order', 6)->update([
            'title' => "S'enregistrer au système de santé public (SNS)",
            'description' => "Inscrivez-vous au centre de santé local (Centro de Saúde) afin d'être rattaché à un médecin de famille et d'accéder au système de santé public SNS.",
            'required_documents' => "NIF ; Numéro de sécurité sociale (si disponible) ; Pièce d'identité ; Justificatif de domicile",
            'updated_at' => $now,
        ]);

        DB::table('steps')->where('order', 7)->update([
            'title' => "Déclarer son adresse auprès de la paroisse locale (Freguesia)",
            'description' => "Certaines démarches administratives nécessitent une preuve d'enregistrement local ; déclarez votre adresse si requis par la municipalité.",
            'required_documents' => "Pièce d'identité ; Justificatif de domicile ; Contrat de location ou acte de propriété",
            'updated_at' => $now,
        ]);

        DB::table('steps')->where('order', 8)->update([
            'title' => "Déclarer sa résidence fiscale et mettre à jour son statut fiscal",
            'description' => "Confirmez votre statut de résidence fiscale pour l'année en cours et mettez à jour vos informations auprès des Finanças afin de garantir un prélèvement fiscal et des obligations correctes.",
            'required_documents' => "NIF ; Justificatif de domicile ; Informations sur l'emploi ou les revenus ; Déclarations fiscales de l'année précédente (le cas échéant)",
            'updated_at' => $now,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('Step', function (Blueprint $table) {
            //
        });
    }
};
