<?php

namespace Database\Seeders;

use App\Models\Design;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Design::create([
            'primary_color' => '#FF5733',
            'button_color' => '#F5D800',
        ]);
        Design::create([
            'primary_color' => '#3B5998',
            'button_color' => '#27AE60 ',
        ]);
        Design::create([
            'primary_color' => '#8E44AD',
            'button_color' => '#F62459',
        ]);
        Design::create([
            'primary_color' => '#FFA07A',
            'button_color' => '#1ABC9C',
        ]);
        Design::create([
            'primary_color' => '#6C7A89',
            'button_color' => '#3498DB',
        ]);
    }
}
