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
        $userIds = User::pluck('id')->toArray();

        // creo un'array associativo che contiene esplicitamente le chiavi del database

        $dishes = [
            [
                'user_id' => $userIds[0],
                'name' => 'Spaghetti Carbonara',
                'photo' => 'https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg',
                'description' => 'Classic Italian pasta dish made with eggs, cheese, pancetta, and pepper.',
                'price' => 12.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Margherita Pizza',
                'photo' => 'https://images.pexels.com/photos/4109128/pexels-photo-4109128.jpeg',
                'description' => 'Traditional Italian pizza with tomatoes, mozzarella cheese, fresh basil, salt, and extra-virgin olive oil.',
                'price' => 9.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Caesar Salad',
                'photo' => 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg',
                'description' => 'Crispy romaine lettuce with Caesar dressing, croutons, and Parmesan cheese.',
                'price' => 8.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Beef Tacos',
                'photo' => 'https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg',
                'description' => 'Tasty beef tacos with fresh salsa, lettuce, and cheese.',
                'price' => 10.00,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[4],
                'name' => 'Grilled Salmon',
                'photo' => 'https://images.pexels.com/photos/1640775/pexels-photo-1640775.jpeg',
                'description' => 'Grilled salmon fillet served with lemon butter sauce and vegetables.',
                'price' => 15.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[0],
                'name' => 'Chicken Parmesan',
                'photo' => 'https://images.pexels.com/photos/704569/pexels-photo-704569.jpeg',
                'description' => 'Breaded chicken breast topped with marinara sauce and melted cheese.',
                'price' => 13.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Sushi Platter',
                'photo' => 'https://images.pexels.com/photos/1640776/pexels-photo-1640776.jpeg',
                'description' => 'Assorted sushi rolls with fresh fish, rice, and seaweed.',
                'price' => 18.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Ramen Noodles',
                'photo' => 'https://images.pexels.com/photos/566566/pexels-photo-566566.jpeg',
                'description' => 'Japanese ramen noodles in a savory broth with pork, egg, and vegetables.',
                'price' => 11.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Vegetable Stir Fry',
                'photo' => 'https://images.pexels.com/photos/3026803/pexels-photo-3026803.jpeg',
                'description' => 'Fresh vegetables stir-fried with tofu in a savory sauce.',
                'price' => 9.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[4],
                'name' => 'Cheeseburger',
                'photo' => 'https://images.pexels.com/photos/1639567/pexels-photo-1639567.jpeg',
                'description' => 'Juicy beef burger with cheddar cheese, lettuce, tomato, and pickles.',
                'price' => 8.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[0],
                'name' => 'Pad Thai',
                'photo' => 'https://images.pexels.com/photos/6646310/pexels-photo-6646310.jpeg',
                'description' => 'Traditional Thai noodles stir-fried with shrimp, peanuts, and bean sprouts.',
                'price' => 12.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Chicken Tikka Masala',
                'photo' => 'https://images.pexels.com/photos/5938/food-chicken-meat-outdoors.jpg',
                'description' => 'Grilled chicken cooked in a creamy tomato sauce with Indian spices.',
                'price' => 14.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Seafood Paella',
                'photo' => 'https://images.pexels.com/photos/5936/food-seafood-paella.jpg',
                'description' => 'Spanish rice dish cooked with seafood, saffron, and vegetables.',
                'price' => 19.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Lamb Gyro',
                'photo' => 'https://images.pexels.com/photos/6029/food-dinner-lunch.jpg',
                'description' => 'Grilled lamb served in pita bread with tzatziki sauce, tomatoes, and onions.',
                'price' => 10.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[4],
                'name' => 'BBQ Ribs',
                'photo' => 'https://images.pexels.com/photos/107089/pexels-photo-107089.jpeg',
                'description' => 'Tender pork ribs slathered in barbecue sauce, served with coleslaw and fries.',
                'price' => 16.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[0],
                'name' => 'Falafel Wrap',
                'photo' => 'https://images.pexels.com/photos/461326/pexels-photo-461326.jpeg',
                'description' => 'Crispy falafel balls wrapped in pita bread with hummus, lettuce, and tomatoes.',
                'price' => 8.00,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Peking Duck',
                'photo' => 'https://images.pexels.com/photos/11156/pexels-photo-11156.jpeg',
                'description' => 'Roasted duck served with pancakes, cucumber, and hoisin sauce.',
                'price' => 22.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Shrimp Scampi',
                'photo' => 'https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg',
                'description' => 'Shrimp cooked in garlic butter sauce, served over linguine pasta.',
                'price' => 17.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Steak Frites',
                'photo' => 'https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg',
                'description' => 'Grilled steak served with crispy French fries and herb butter.',
                'price' => 20.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[4],
                'name' => 'Margarita',
                'photo' => 'https://images.pexels.com/photos/4109128/pexels-photo-4109128.jpeg',
                'description' => 'Classic cocktail made with tequila, lime juice, and triple sec.',
                'price' => 7.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[0],
                'name' => 'Chicken Alfredo',
                'photo' => 'https://images.pexels.com/photos/556201/pexels-photo-556201.jpeg',
                'description' => 'Creamy Alfredo sauce with grilled chicken over fettuccine pasta.',
                'price' => 14.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Mushroom Risotto',
                'photo' => 'https://images.pexels.com/photos/461326/pexels-photo-461326.jpeg',
                'description' => 'Rich and creamy risotto with sautéed mushrooms and Parmesan cheese.',
                'price' => 13.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Greek Salad',
                'photo' => 'https://images.pexels.com/photos/5936/food-salad-healthy-lunch.jpg',
                'description' => 'Fresh salad with tomatoes, cucumbers, olives, feta cheese, and olive oil.',
                'price' => 8.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Baked Ziti',
                'photo' => 'https://images.pexels.com/photos/461360/pexels-photo-461360.jpeg',
                'description' => 'Pasta baked with marinara sauce, ricotta, and mozzarella cheese.',
                'price' => 12.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[4],
                'name' => 'Lobster Bisque',
                'photo' => 'https://images.pexels.com/photos/556201/pexels-photo-556201.jpeg',
                'description' => 'Smooth and creamy lobster soup with a hint of sherry.',
                'price' => 18.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[0],
                'name' => 'Stuffed Bell Peppers',
                'photo' => 'https://images.pexels.com/photos/1640776/pexels-photo-1640776.jpeg',
                'description' => 'Bell peppers stuffed with rice, beef, and tomato sauce, baked to perfection.',
                'price' => 10.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Eggplant Parmesan',
                'photo' => 'https://images.pexels.com/photos/461199/pexels-photo-461199.jpeg',
                'description' => 'Breaded eggplant slices layered with marinara and melted mozzarella.',
                'price' => 11.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Tuna Poke Bowl',
                'photo' => 'https://images.pexels.com/photos/11156/pexels-photo-11156.jpeg',
                'description' => 'Fresh tuna with avocado, cucumber, and rice, drizzled with soy sauce.',
                'price' => 16.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Buffalo Wings',
                'photo' => 'https://images.pexels.com/photos/5938/food-chicken-meat-outdoors.jpg',
                'description' => 'Spicy buffalo wings served with celery sticks and blue cheese dip.',
                'price' => 9.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[4],
                'name' => 'Fish and Chips',
                'photo' => 'https://images.pexels.com/photos/5938/food-fish-chips-dinner.jpg',
                'description' => 'Crispy fried fish with golden French fries, served with tartar sauce.',
                'price' => 13.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[0],
                'name' => 'Tom Yum Soup',
                'photo' => 'https://images.pexels.com/photos/556201/pexels-photo-556201.jpeg',
                'description' => 'Hot and sour Thai soup with shrimp, mushrooms, and lemongrass.',
                'price' => 10.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Pasta Primavera',
                'photo' => 'https://images.pexels.com/photos/556201/pexels-photo-556201.jpeg',
                'description' => 'Pasta with fresh vegetables, tossed in a light garlic and olive oil sauce.',
                'price' => 12.00,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Clam Chowder',
                'photo' => 'https://images.pexels.com/photos/1640776/pexels-photo-1640776.jpeg',
                'description' => 'Creamy New England-style clam chowder with potatoes and bacon.',
                'price' => 9.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Fried Calamari',
                'photo' => 'https://images.pexels.com/photos/5938/food-seafood-calamari.jpg',
                'description' => 'Golden fried calamari rings served with marinara sauce.',
                'price' => 11.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[4],
                'name' => 'Veggie Burger',
                'photo' => 'https://images.pexels.com/photos/461199/pexels-photo-461199.jpeg',
                'description' => 'Delicious veggie burger with lettuce, tomato, and vegan mayo.',
                'price' => 9.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[0],
                'name' => 'Shrimp Pad Thai',
                'photo' => 'https://images.pexels.com/photos/11156/pexels-photo-11156.jpeg',
                'description' => 'Thai stir-fried noodles with shrimp, peanuts, and bean sprouts.',
                'price' => 14.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'BBQ Chicken Pizza',
                'photo' => 'https://images.pexels.com/photos/5938/food-pizza-bbq-chicken.jpg',
                'description' => 'Pizza topped with BBQ sauce, grilled chicken, and red onions.',
                'price' => 12.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Spinach and Artichoke Dip',
                'photo' => 'https://images.pexels.com/photos/5938/food-spinach-artichoke-dip.jpg',
                'description' => 'Creamy dip made with spinach, artichokes, and melted cheese.',
                'price' => 8.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Miso Soup',
                'photo' => 'https://images.pexels.com/photos/556201/pexels-photo-556201.jpeg',
                'description' => 'Traditional Japanese soup made with miso paste, tofu, and seaweed.',
                'price' => 4.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[4],
                'name' => 'Pork Schnitzel',
                'photo' => 'https://images.pexels.com/photos/461199/pexels-photo-461199.jpeg',
                'description' => 'Breaded and fried pork cutlet served with lemon wedges and potatoes.',
                'price' => 15.99,
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
