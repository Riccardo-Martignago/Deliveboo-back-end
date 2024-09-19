<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Typology;
class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurantTypes =[
        [
            'name' => 'Brunch Café'
        ],
        [
            'name' => 'Ice cream shop'
        ],
        [
            'name' => 'Pizzeria'
        ],
        [
            'name' => 'French restaurant'
        ],
        [
            'name' => 'Japanese restaurant'
        ],
        [
            'name' => 'Greek restaurant'
        ],
        [
            'name' => 'Italian restaurant'
        ],
        [
            'name' => 'Thai restaurant'
        ],
        [
            'name' => 'Steakhouse'
        ],
        [
            'name' => 'Sushi Bar'
        ],
    ];

        foreach($restaurantTypes as $restaurantType){
            $typology = new Typology();
            $typology ->name = $restaurantType['name'];
            $typology ->save();
        }
    }
}
