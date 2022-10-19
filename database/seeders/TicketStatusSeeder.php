<?php

namespace Database\Seeders;

use App\Models\TicketStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketStatus::create(['name' => 'Otwarty']);
        TicketStatus::create(['name' => 'Czeka na odpowiedź']);
        TicketStatus::create(['name' => 'Udzielono odpowiedzi']);
        TicketStatus::create(['name' => 'Zamknięty']);
    }
}
