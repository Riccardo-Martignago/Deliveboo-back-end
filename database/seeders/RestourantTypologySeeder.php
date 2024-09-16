<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Typology;
use App\Models\User;
class RestourantTypologySeeder extends Seeder
{
    /**Run the database seeds.*/
public function run(): void{
    $users = User::all();
    $typologies = Typology::all();
    $now = now();

    $users[0]->typologies()->attach($typologies[7]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[1]->typologies()->attach($typologies[1]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[2]->typologies()->attach($typologies[4]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[3]->typologies()->attach($typologies[3]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[4]->typologies()->attach($typologies[5]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[5]->typologies()->attach($typologies[6]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[6]->typologies()->attach($typologies[5]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[7]->typologies()->attach($typologies[2]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[8]->typologies()->attach($typologies[8]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[9]->typologies()->attach($typologies[9]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[10]->typologies()->attach($typologies[1]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[11]->typologies()->attach($typologies[2]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[12]->typologies()->attach($typologies[3]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[13]->typologies()->attach($typologies[4]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[11]->typologies()->attach($typologies[5]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[12]->typologies()->attach($typologies[6]->id, ['created_at' => $now, 'updated_at' => $now]);
    }
}

