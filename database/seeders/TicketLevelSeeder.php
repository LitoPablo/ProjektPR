<?php

namespace Database\Seeders;

use App\Models\TicketLevel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketLevel::create(['name' => 'ważny']);
        TicketLevel::create(['name' => 'średni']);
        TicketLevel::create(['name' => 'normalny']);
    }
}
