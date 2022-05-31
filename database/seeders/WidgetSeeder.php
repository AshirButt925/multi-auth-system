<?php

namespace Database\Seeders;

use App\Models\Widget;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $widgets = [250, 500, 1000, 2000, 5000];
        foreach ($widgets as $widget){
            Widget::create([
               'value' =>  $widget
            ]);
        }

    }
}
