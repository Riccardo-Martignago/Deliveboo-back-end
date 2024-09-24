<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Dish;
use App\Models\Order;
use App\Models\Order_Dish;
use App\Models\Restourant_Typology;
use App\Models\Typology;

class DatabaseSeeder extends Seeder
    {
    public function run(): void
    {
        $userNames = [
            [
                'name' => 'ristorante  la  piazza',
                'email' => 'lapiazza@restaurant.com',
                'password' => 'lapiazza123!',
                'piva' => '12345678901',
                'adress' => 'Via Roma 10, 00100 Roma',
                'photo' => 'ristorante_la_piazza.jpg',
            ],
            [
                'name' => 'bistro  del  mare',
                'email' => 'bistrodelmare@restaurant.com',
                'password' => 'bistro456!',
                'piva' => '23456789012',
                'adress' => 'Corso Milano 20, 20100 Milano',
                'photo' => 'bistrot_del_mare.jpg',
            ],
            [
                'name' => 'osteria  vecchia',
                'email' => 'osteriavecchia@restaurant.com',
                'password' => 'osteria890!',
                'piva' => '34567890123',
                'adress' => 'Piazza Napoli 5, 80100 Napoli',
                'photo' => 'osteria_vecchia.jpg',
            ],
            [
                'name' => 'trattoria  al  ponte',
                'email' => 'trattoriaalponte@restaurant.com',
                'password' => 'trattoria123@',
                'piva' => '45678901234',
                'adress' => 'Viale Torino 15, 10100 Torino',
                'photo' => 'trattoria_al_ponte.jpg',
            ],
            [
                'name' => 'gusto  ristorante',
                'email' => 'gusto@restaurant.com',
                'password' => 'gusto567!',
                'piva' => '56789012345',
                'adress' => 'Via Venezia 12, 30100 Venezia',
                'photo' => 'gusto  ristorante.jpg',
            ],
            [
                'name' => 'ristorante  mediterraneo',
                'email' => 'mediterraneo@restaurant.com',
                'password' => 'mediterraneo789!',
                'piva' => '67890123456',
                'adress' => 'Via Firenze 30, 50100 Firenze',
                'photo' => 'ristorante  mediterraneo.jpg',
            ],
            [
                'name' => 'enoteca  vinum',
                'email' => 'vinum@enoteca.com',
                'password' => 'vinum890@',
                'piva' => '78901234567',
                'adress' => 'Piazza Duomo 5, 20122 Milano',
                'photo' => 'enoteca  vinum.jpg',
            ],
            [
                'name' => 'sushi  zen',
                'email' => 'zen@sushi.com',
                'password' => 'zen789@',
                'piva' => '01234567890',
                'adress' => 'Via Garibaldi 50, 50122 Firenze',
                'photo' => 'sushi  zen.jpg',
            ],
            [
                'name' => 'trattoria  della  nonna',
                'email' => 'dellanonna@trattoria.com',
                'password' => 'nonna123!',
                'piva' => '12345678902',
                'adress' => 'Via Roma 5, 00100 Roma',
                'photo' => 'trattoria  della  nonna.jpg',
            ],
            [
                'name' => 'pasta  italiana',
                'email' => 'pasta@restaurant.com',
                'password' => 'pasta456!',
                'piva' => '23456789013',
                'adress' => 'Corso Milano 30, 20100 Milano',
                'photo' => 'pasta  italiana.jpg',
            ],
            [
                'name' => 'ristorante  da  michele',
                'email' => 'damichele@restaurant.com',
                'password' => 'michele890!',
                'piva' => '34567890124',
                'adress' => 'Piazza del Popolo 1, 80100 Napoli',
                'photo' => 'ristorante  da  michele.jpg',
            ],
            [
                'name' => 'ristorante  fiorentina',
                'email' => 'fiorentina@restaurant.com',
                'password' => 'fiorentina123@',
                'piva' => '45678901235',
                'adress' => 'Viale Michelangelo 10, 50100 Firenze',
                'photo' => 'ristorante  fiorentina.jpg',
            ],
            [
                'name' => 'taverna  greca',
                'email' => 'taverna@restaurant.com',
                'password' => 'greca123!',
                'piva' => '89012345679',
                'adress' => 'Via Santorini 10, 10100 Torino',
                'photo' => 'taverna  greca.jpg',
            ],
            [
                'name' => 'trattoria  del  corso',
                'email' => 'delcorso@restaurant.com',
                'password' => 'delcorso456!',
                'piva' => '90123456780',
                'adress' => 'Via del Corso 22, 00100 Roma',
                'photo' => 'trattoria  del  corso.jpg',
            ],
        ];


        foreach($userNames as $userData) {
            $users = new User();
            $users ->name = $userData['name'];
            $users ->email = $userData['email'];
            $users ->password = bcrypt($userData['password']);
            $users ->piva = $userData['piva'];
            $users ->adress = $userData['adress'];
            $users ->photo = $userData['photo'];
            $users->save();
        }
         // Aggiungi qui la chiamata al seeder per i piatti
        $this->call([
            DishSeeder::class,
            OrderSeeder::class,
            TypologySeeder::class,
            RestourantTypologySeeder::class,
            OrderDishSeeder::class,
            ]);
    }
}
