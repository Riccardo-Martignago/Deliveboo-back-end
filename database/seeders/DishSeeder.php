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
                'user_id' =>$userIds[9],
                'name' => 'Spaghetti Carbonara',
                'photo' => 'spaghetti_alla_carbonara.jpg',
                'description' => 'Classic Italian pasta dish made with eggs, cheese, pancetta, and pepper.',
                'price' => 12.99,
                'visible' => true,
            ],
            [
                'user_id' =>  $userIds[0],
                'name' => 'Margherita Pizza',
                'photo' => 'pizza.jpg',
                'description' => 'Traditional Italian pizza with tomatoes, mozzarella cheese, fresh basil, salt, and extra-virgin olive oil.',
                'price' => 9.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Caesar Salad',
                'photo' => 'caesar salad.jpg',
                'description' => 'Crispy romaine lettuce with Caesar dressing, croutons, and Parmesan cheese.',
                'price' => 8.50,
                'visible' => true,
            ],
            [
                'user_id' =>  $userIds[8],
                'name' => 'Beef Tacos',
                'photo' => 'beef tacos.jpg',
                'description' => 'Tasty beef tacos with fresh salsa, lettuce, and cheese.',
                'price' => 10.00,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Grilled Salmon',
                'photo' => 'grilled salmon.jpg',
                'description' => 'Grilled salmon fillet served with lemon butter sauce and vegetables.',
                'price' => 15.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[4],
                'name' => 'Chicken Parmesan',
                'photo' => 'chicken parmesan.jpg',
                'description' => 'Breaded chicken breast topped with marinara sauce and melted cheese.',
                'price' => 13.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[7],
                'name' => 'Sushi Platter',
                'photo' => 'sushi platter.jpg',
                'description' => 'Assorted sushi rolls with fresh fish, rice, and seaweed.',
                'price' => 18.99,
                'visible' => true,
            ],
            [
                'user_id' =>  $userIds[7],
                'name' => 'Ramen Noodles',
                'photo' => 'ramen noodles.jpg',
                'description' => 'Japanese ramen noodles in a savory broth with pork, egg, and vegetables.',
                'price' => 11.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Vegetable Stir Fry',
                'photo' => 'Vegetable Stir Fry.jpg',
                'description' => 'Fresh vegetables stir-fried with tofu in a savory sauce.',
                'price' => 9.50,
                'visible' => true,
            ],
            [
                'user_id' =>  $userIds[8],
                'name' => 'Cheeseburger',
                'photo' => 'Cheeseburger.jpg',
                'description' => 'Juicy beef burger with cheddar cheese, lettuce, tomato, and pickles.',
                'price' => 8.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[13],
                'name' => 'Pad Thai',
                'photo' => 'Pad Thai.jpg',
                'description' => 'Traditional Thai noodles stir-fried with shrimp, peanuts, and bean sprouts.',
                'price' => 12.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[13],
                'name' => 'Chicken Tikka Masala',
                'photo' => 'Chicken Tikka Masala.jpg',
                'description' => 'Grilled chicken cooked in a creamy tomato sauce with Indian spices.',
                'price' => 14.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Seafood Paella',
                'photo' => 'Seafood Paella.jpg',
                'description' => 'Spanish rice dish cooked with seafood, saffron, and vegetables.',
                'price' => 19.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[12],
                'name' => 'Lamb Gyro',
                'photo' => 'Lamb Gyro.jpg',
                'description' => 'Grilled lamb served in pita bread with tzatziki sauce, tomatoes, and onions.',
                'price' => 10.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[8],
                'name' => 'BBQ Ribs',
                'photo' => 'BBQ Ribs.jpg',
                'description' => 'Tender pork ribs slathered in barbecue sauce, served with coleslaw and fries.',
                'price' => 16.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[2],
                'name' => 'Falafel Wrap',
                'photo' => 'Falafel Wrap.jpg',
                'description' => 'Crispy falafel balls wrapped in pita bread with hummus, lettuce, and tomatoes.',
                'price' => 8.00,
                'visible' => true,
            ],
            [
                'user_id' =>$userIds[4],
                'name' => 'Peking Duck',
                'photo' => 'Peking Duck.jpg',
                'description' => 'Roasted duck served with pancakes, cucumber, and hoisin sauce.',
                'price' => 22.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Shrimp Scampi',
                'photo' => 'Shrimp Scampi.jpg',
                'description' => 'Shrimp cooked in garlic butter sauce, served over linguine pasta.',
                'price' => 17.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[11],
                'name' => 'Steak Frites',
                'photo' => 'Steak Frites.jpg',
                'description' => 'Grilled steak served with crispy French fries and herb butter.',
                'price' => 20.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[6],
                'name' => 'Margarita',
                'photo' => 'Margarita.jpg',
                'description' => 'Classic cocktail made with tequila, lime juice, and triple sec.',
                'price' => 7.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[5],
                'name' => 'Eggplant Parmesan',
                'photo' => 'eggplant_parmesan.jpg',
                'description' => 'Breaded eggplant slices baked with marinara sauce and melted cheese.',
                'price' => 12.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Lobster Roll',
                'photo' => 'lobster_roll.jpg',
                'description' => 'Fresh lobster meat in a buttery roll with a touch of mayo and celery.',
                'price' => 19.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[12],
                'name' => 'Greek Salad',
                'photo' => 'greek_salad.jpg',
                'description' => 'A refreshing salad with cucumbers, tomatoes, olives, feta cheese, and red onions.',
                'price' => 7.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Chili Con Carne',
                'photo' => 'chili_con_carne.jpg',
                'description' => 'Hearty beef chili with beans, tomatoes, and spices.',
                'price' => 11.99,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[9],
                'name' => 'Mushroom Risotto',
                'photo' => 'mushroom_risotto.jpg',
                'description' => 'Creamy risotto cooked with mushrooms and Parmesan cheese.',
                'price' => 14.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[11],
                'name' => 'Pork Schnitzel',
                'photo' => 'pork_schnitzel.jpg',
                'description' => 'Breaded and fried pork cutlet served with lemon wedges and a side of potatoes.',
                'price' => 13.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[13],
                'name' => 'Tandoori Chicken',
                'photo' => 'tandoori_chicken.jpg',
                'description' => 'Chicken marinated in yogurt and spices, cooked in a tandoor oven.',
                'price' => 15.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[13],
                'name' => 'Vietnamese Pho',
                'photo' => 'vietnamese_pho.jpg',
                'description' => 'Fragrant noodle soup with herbs, beef, and a flavorful broth.',
                'price' => 12.00,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[6],
                'name' => 'Buttermilk Pancakes',
                'photo' => 'buttermilk_pancakes.jpg',
                'description' => 'Fluffy pancakes made with buttermilk, served with maple syrup and butter.',
                'price' => 9.00,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[5],
                'name' => 'Spinach Artichoke Dip',
                'photo' => 'spinach_artichoke_dip.jpg',
                'description' => 'Creamy dip made with spinach and artichokes, served with tortilla chips.',
                'price' => 8.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[12],
                'name' => 'Lentil Soup',
                'photo' => 'lentil_soup.jpg',
                'description' => 'Hearty soup made with lentils, vegetables, and spices.',
                'price' => 7.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[12],
                'name' => 'Vanilla Bean Ice Cream',
                'photo' => 'vanilla_bean_ice_cream.jpg',
                'description' => 'Classic vanilla ice cream made with real vanilla beans for a rich, creamy flavor.',
                'price' => 4.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Chocolate Fudge Ice Cream',
                'photo' => 'chocolate_fudge_ice_cream.jpg',
                'description' => 'Decadent chocolate ice cream swirled with rich fudge ribbons.',
                'price' => 5.00,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Strawberry Cheesecake Ice Cream',
                'photo' => 'strawberry_cheesecake_ice_cream.jpg',
                'description' => 'Creamy cheesecake ice cream with real strawberry chunks and graham cracker bits.',
                'price' => 5.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[5],
                'name' => 'Mint Chocolate Chip Ice Cream',
                'photo' => 'mint_chocolate_chip_ice_cream.jpg',
                'description' => 'Refreshing mint ice cream with crunchy chocolate chips.',
                'price' => 4.75,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[11],
                'name' => 'Salted Caramel Ice Cream',
                'photo' => 'salted_caramel_ice_cream.jpg',
                'description' => 'Smooth caramel ice cream with a hint of sea salt for a perfect balance of sweet and salty.',
                'price' => 5.25,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[10],
                'name' => 'Prosciutto & Arugula Pizza',
                'photo' => 'prosciutto_arugula_pizza.jpg',
                'description' => 'A gourmet pizza topped with thin slices of prosciutto, fresh arugula, mozzarella, and a drizzle of balsamic glaze.',
                'price' => 14.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[10],
                'name' => 'Pepperoni Pizza',
                'photo' => 'pepperoni_pizza.jpg',
                'description' => 'Traditional pizza topped with spicy pepperoni slices and mozzarella cheese.',
                'price' => 13.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[11],
                'name' => 'BBQ Chicken Pizza',
                'photo' => 'bbq_chicken_pizza.jpg',
                'description' => 'Savory pizza with BBQ sauce, grilled chicken, red onions, and cilantro.',
                'price' => 14.00,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[0],
                'name' => 'Four Cheese Pizza',
                'photo' => 'four_cheese_pizza.jpg',
                'description' => 'A cheesy delight with mozzarella, cheddar, parmesan, and gorgonzola.',
                'price' => 13.75,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[13],
                'name' => 'Vegetarian Pizza',
                'photo' => 'vegetarian_pizza.jpg',
                'description' => 'Topped with bell peppers, mushrooms, olives, onions, and mozzarella.',
                'price' => 12.50,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[1],
                'name' => 'Truffle Mushroom Pizza',
                'photo' => 'truffle_mushroom_pizza.jpg',
                'description' => 'A rich pizza with a truffle cream base, sautéed mushrooms, mozzarella, and a hint of garlic.',
                'price' => 15.00,
                'visible' => true,
            ],
            [
                'user_id' => $userIds[3],
                'name' => 'Spicy Salami Pizza',
                'photo' => 'spicy_salami_pizza.jpg',
                'description' => 'A fiery pizza topped with spicy salami, red chili flakes, mozzarella, and fresh basil.',
                'price' => 14.25,
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
