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
                'title' => 'Obtain NIF (Número de Identificação Fiscal)',
                'description' => 'Apply for a Portuguese tax identification number (NIF) at a local "Serviço de Finanças" or through a citizen shop (Loja do Cidadão). Essential for opening bank accounts, signing contracts and tax registration.',
                'order' => 1,
                'required_documents' => "Passport or national ID; Proof of address (rental contract or utility bill); Fiscal representative only if required for non-EU citizens",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Open a Portuguese bank account',
                'description' => 'Open a local bank account to receive salary, pay bills and set up direct debits. Many banks accept remote onboarding but NIF is usually required.',
                'order' => 2,
                'required_documents' => "NIF; Passport or national ID; Proof of address; Proof of income or employment (if available)",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Register as a resident (EU citizens) / SEF appointment (if required)',
                'description' => 'If staying longer than 3 months, EU citizens should register as residents and obtain the Certificate of Registration. Non-EU nationals may need a visa or residence permit via SEF.',
                'order' => 3,
                'required_documents' => "Passport or ID; Proof of address; NIF; Proof of employment or means of subsistence",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Register with Finanças (Tax Office)',
                'description' => 'Confirm tax status and, if applicable, register for IRS and VAT obligations. Inform Finanças of your residency and update contact details.',
                'order' => 4,
                'required_documents' => "NIF; ID; Proof of address; Employment contract or self-employment details",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Register for Social Security (Segurança Social)',
                'description' => 'If employed or self-employed, register with Segurança Social to obtain social security number and access benefits and contributions.',
                'order' => 5,
                'required_documents' => "NIF; ID; Employment contract or business registration; Proof of address",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Register for Public Healthcare (SNS)',
                'description' => 'Register at the local health centre (Centro de Saúde) to be assigned a family doctor and access the SNS public health system.',
                'order' => 6,
                'required_documents' => "NIF; Social Security number (if available); ID; Proof of address",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Register address with local parish (Freguesia)',
                'description' => 'Some administrative tasks require proof of local registration; register your address if required by the local municipality.',
                'order' => 7,
                'required_documents' => "ID; Proof of address; Rental contract or deed",
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Declare tax residency and update fiscal status',
                'description' => 'Confirm your tax residency status for the year and update your details with Finanças to ensure correct tax withholding and obligations.',
                'order' => 8,
                'required_documents' => "NIF; Proof of address; Employment or income details; Previous year tax returns (if any)",
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('steps')->insert($steps);
    }
}
