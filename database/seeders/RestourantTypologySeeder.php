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

    $users[0]->typologies()->syncWithoutDetaching($typologies[7]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[1]->typologies()->syncWithoutDetaching($typologies[1]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[2]->typologies()->syncWithoutDetaching($typologies[4]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[3]->typologies()->syncWithoutDetaching($typologies[3]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[4]->typologies()->syncWithoutDetaching($typologies[5]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[5]->typologies()->syncWithoutDetaching($typologies[6]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[6]->typologies()->syncWithoutDetaching($typologies[5]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[7]->typologies()->syncWithoutDetaching($typologies[2]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[8]->typologies()->syncWithoutDetaching($typologies[8]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[9]->typologies()->syncWithoutDetaching($typologies[9]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[10]->typologies()->syncWithoutDetaching($typologies[1]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[11]->typologies()->syncWithoutDetaching($typologies[2]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[12]->typologies()->syncWithoutDetaching($typologies[3]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[13]->typologies()->syncWithoutDetaching($typologies[4]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[11]->typologies()->syncWithoutDetaching($typologies[5]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[12]->typologies()->syncWithoutDetaching($typologies[6]->id, ['created_at' => $now, 'updated_at' => $now]);

    $users[0]->typologies()->syncWithoutDetaching($typologies[4]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[1]->typologies()->syncWithoutDetaching($typologies[2]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[2]->typologies()->syncWithoutDetaching($typologies[1]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[3]->typologies()->syncWithoutDetaching($typologies[1]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[4]->typologies()->syncWithoutDetaching($typologies[6]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[5]->typologies()->syncWithoutDetaching($typologies[5]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[6]->typologies()->syncWithoutDetaching($typologies[4]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[7]->typologies()->syncWithoutDetaching($typologies[3]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[8]->typologies()->syncWithoutDetaching($typologies[6]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[9]->typologies()->syncWithoutDetaching($typologies[3]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[10]->typologies()->syncWithoutDetaching($typologies[2]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[11]->typologies()->syncWithoutDetaching($typologies[4]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[12]->typologies()->syncWithoutDetaching($typologies[5]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[13]->typologies()->syncWithoutDetaching($typologies[1]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[11]->typologies()->syncWithoutDetaching($typologies[2]->id, ['created_at' => $now, 'updated_at' => $now]);
    $users[12]->typologies()->syncWithoutDetaching($typologies[1]->id, ['created_at' => $now, 'updated_at' => $now]);

    }
}

