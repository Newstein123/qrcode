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
            'primary_color' => '#ff5733',
            'button_color' => '#f5d800',
            'primary_text_color' => '#000000',
            'button_text_color' => '#000000',
        ]);
        Design::create([
            'primary_color' => '#3b5998',
            'button_color' => '#27ae60 ',
            'primary_text_color' => '#000000',
            'button_text_color' => '#000000',
        ]);
        Design::create([
            'primary_color' => '#8e44ad',
            'button_color' => '#f62459',
            'primary_text_color' => '#ffffff',
            'button_text_color' => '#ffffff',
        ]);
        Design::create([
            'primary_color' => '#ffa07a',
            'button_color' => '#1abc9c',
            'primary_text_color' => '#000000',
            'button_text_color' => '#000000',
        ]);
        Design::create([
            'primary_color' => '#6c7a89',
            'button_color' => '#3498db',
            'primary_text_color' => '#ffffff',
            'button_text_color' => '#ffffff',
        ]);
    }
}
