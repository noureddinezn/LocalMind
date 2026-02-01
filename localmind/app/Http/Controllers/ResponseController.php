<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;
use App\Models\Response;
use App\Models\Favorite;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $user1 = User::create([
            'name' => 'Amine',
            'email' => 'amine@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $user2 = User::create([
            'name' => 'Sarah',
            'email' => 'sarah@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $user3 = User::create([
            'name' => 'Karim',
            'email' => 'karim@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $question1 = Question::create([
            'user_id' => $user1->id,
            'title' => 'Où trouver un bon plombier à Casablanca ?',
            'content' => 'Je viens d\'emménager dans le quartier Maarif et j\'ai besoin d\'un plombier fiable.',
            'location' => 'Maarif, Casablanca',
            'latitude' => 33.5731,
            'longitude' => -7.6298,
        ]);

        $question2 = Question::create([
            'user_id' => $user2->id,
            'title' => 'Restaurant halal près de la gare Casa-Voyageurs ?',
            'content' => 'Je cherche un bon restaurant halal pas cher près de la gare.',
            'location' => 'Casa-Voyageurs, Casablanca',
            'latitude' => 33.5893,
            'longitude' => -7.6114,
        ]);

        Response::create([
            'user_id' => $user2->id,
            'question_id' => $question1->id,
            'content' => 'Je recommande Mohamed le plombier, son numéro est 0661234567.',
        ]);

        Response::create([
            'user_id' => $user1->id,
            'question_id' => $question2->id,
            'content' => 'Il y a un excellent restaurant "Dar Tajine" à 5 minutes de la gare.',
        ]);

        Favorite::create([
            'user_id' => $user1->id,
            'question_id' => $question2->id,
        ]);

        $this->command->info('Base de données initialisée avec succès !');
    }
}