<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dish;
use App\Models\User;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Assicurati che ci sia almeno un utente nel database
            $user = User::first();

        // creo un'array associativo che contiene esplicitamente le chiavi del database

        $dishes = [
            [
                'user_id' => $user->id,
                'name' => 'Spaghetti Carbonara',
                'photo' => 'spaghetti_alla_carbonara.jpg',
                'description' => 'Classic Italian pasta dish made with eggs, cheese, pancetta, and pepper.',
                'price' => 12.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Margherita Pizza',
                'photo' => 'pizza.jpg',
                'description' => 'Traditional Italian pizza with tomatoes, mozzarella cheese, fresh basil, salt, and extra-virgin olive oil.',
                'price' => 9.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Caesar Salad',
                'photo' => 'caesar salad.jpg',
                'description' => 'Crispy romaine lettuce with Caesar dressing, croutons, and Parmesan cheese.',
                'price' => 8.50,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Beef Tacos',
                'photo' => 'beef tacos.jpg',
                'description' => 'Tasty beef tacos with fresh salsa, lettuce, and cheese.',
                'price' => 10.00,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Grilled Salmon',
                'photo' => 'grilled salmon.jpg',
                'description' => 'Grilled salmon fillet served with lemon butter sauce and vegetables.',
                'price' => 15.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Chicken Parmesan',
                'photo' => 'chicken parmesan.jpg',
                'description' => 'Breaded chicken breast topped with marinara sauce and melted cheese.',
                'price' => 13.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Sushi Platter',
                'photo' => 'sushi platter.jpg',
                'description' => 'Assorted sushi rolls with fresh fish, rice, and seaweed.',
                'price' => 18.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Ramen Noodles',
                'photo' => 'ramen noodles.jpg',
                'description' => 'Japanese ramen noodles in a savory broth with pork, egg, and vegetables.',
                'price' => 11.50,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Vegetable Stir Fry',
                'photo' => 'Vegetable Stir Fry.jpg',
                'description' => 'Fresh vegetables stir-fried with tofu in a savory sauce.',
                'price' => 9.50,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Cheeseburger',
                'photo' => 'Cheeseburger.jpg',
                'description' => 'Juicy beef burger with cheddar cheese, lettuce, tomato, and pickles.',
                'price' => 8.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Pad Thai',
                'photo' => 'Pad Thai.jpg',
                'description' => 'Traditional Thai noodles stir-fried with shrimp, peanuts, and bean sprouts.',
                'price' => 12.50,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Chicken Tikka Masala',
                'photo' => 'Chicken Tikka Masala.jpg',
                'description' => 'Grilled chicken cooked in a creamy tomato sauce with Indian spices.',
                'price' => 14.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Seafood Paella',
                'photo' => 'Seafood Paella.jpg',
                'description' => 'Spanish rice dish cooked with seafood, saffron, and vegetables.',
                'price' => 19.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Lamb Gyro',
                'photo' => 'Lamb Gyro.jpg',
                'description' => 'Grilled lamb served in pita bread with tzatziki sauce, tomatoes, and onions.',
                'price' => 10.50,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'BBQ Ribs',
                'photo' => 'BBQ Ribs.jpg',
                'description' => 'Tender pork ribs slathered in barbecue sauce, served with coleslaw and fries.',
                'price' => 16.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Falafel Wrap',
                'photo' => 'Falafel Wrap.jpg',
                'description' => 'Crispy falafel balls wrapped in pita bread with hummus, lettuce, and tomatoes.',
                'price' => 8.00,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Peking Duck',
                'photo' => 'Peking Duck.jpg',
                'description' => 'Roasted duck served with pancakes, cucumber, and hoisin sauce.',
                'price' => 22.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Shrimp Scampi',
                'photo' => 'Shrimp Scampi.jpg',
                'description' => 'Shrimp cooked in garlic butter sauce, served over linguine pasta.',
                'price' => 17.50,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Steak Frites',
                'photo' => 'Steak Frites.jpg',
                'description' => 'Grilled steak served with crispy French fries and herb butter.',
                'price' => 20.99,
                'visible' => true,
            ],
            [
                'user_id' => $user->id,
                'name' => 'Margarita',
                'photo' => 'Margarita.jpg',
                'description' => 'Classic cocktail made with tequila, lime juice, and triple sec.',
                'price' => 7.99,
                'visible' => true,
            ],
        ];

        //dopo aver generato l'array associativo, per ogni piatto all'interno dell'array , creo un piatto.

        foreach ($dishes as $dish) {

            //grazie all'array associativo mi è concesso utilizzare create come metodo per creare e salvare i dati

            Dish::create($dish);
        }
    }
}
