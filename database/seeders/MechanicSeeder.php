<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MechanicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Mechanic::create([
        'name' => 'Carlos Hernández',
        'specialty' => 'Motor',
        'phone' => '7777-7777',
        'email' => 'carlos@autochecksv.com',
        'description' => 'Especialista Toyota'
    ]);
}
}
