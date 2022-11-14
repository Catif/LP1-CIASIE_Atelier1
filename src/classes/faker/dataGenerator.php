<?php

use atelier\modele\Tag;
use atelier\faker\Faker;
use atelier\modele\User;
use atelier\modele\Galery;
use atelier\modele\Picture;
use atelier\auth\Authentification;

// // Création des fausses données

// $imageFaker = new Faker("https://picsum.photos/");

// $title = ["decision", "university", "historian", "awareness", "mood", "device", "virus", "politics", "girl", "football", "affair", "wealth", "charity", "dealer", "confusion", "event", "meat", "distribution", "atmosphere", "mall", "setting", "reputation", "satisfaction", "ear", "guest", "river", "feedback", "platform", "pie", "examination", "information", "length", "director", "history", "equipment", "instruction", "personality", "apartment", "employer", "wedding", "youth", "difference", "cancer", "assignment", "mud", "departure", "heart", "topic", "climate", "organization", "atmosphere", "permission", "volume", "meal", "village", "phone", "apple", "potato", "night", "desk", "priority", "literature", "truth", "community", "competition", "cell", "member", "indication", "baseball", "mud", "poet", "variation", "resolution", "replacement", "science", "arrival", "protection", "chest", "story", "application", "beer", "ad", "depression", "negotiation", "election", "menu", "department", "contribution", "instruction", "nation", "estate", "cigarette", "software", "suggestion", "assistant", "soup", "woman", "marketing", "police", "gate"];
// $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas finibus nibh et justo sollicitudin accumsan. Morbi viverra sollicitudin nisi.";
// $tags = ["spiteful", "same", "craven", "unkempt", "violent", "flawless", "accurate", "plain", "wooden", "purring", "paltry", "guiltless", "kaput", "abortive", "parched", "aloof", "reminiscent", "thoughtless", "thick", "lewd", "busy", "tacky", "truthful", "racial", "wretched", "brainy", "supreme", "luxuriant", "fierce", "excited", "annoying", "pregnant", "encouraging", "married", "fixed", "foamy", "nutritious", "absorbing", "puffy", "disgusting", "stormy", "assorted", "labored", "motionless", "nervous", "uninterested", "cagey", "electrical", "zesty", "earsplitting"];


// // Création d'utilisateurs

// for ($i = 0; $i < 25; $i++) {
//     Authentification::register("User{$i}", "user_{$i}", "user{$i}@photomedia.fr");
// }


// // Création de galeries

// for ($i = 0; $i < 50; $i++) {
//     $galery = new Galery();
//     $galery->title = $title[$i];
//     $galery->description = $description;
//     $galery->private = 0;
//     $galery->save();

//     for ($l = 0; $l < 3; $l++) {
//         $tag = Tag::firstOrCreate(['name' => $tags[array_rand($tags, 1)]]);
//         $galery->tags()->attach($tag);
//     }

//     for ($j = 0; $j < 50; $j++) {
//         $picture = new Picture();
//         $picture->title = $title[$j];
//         $picture->name_file = $imageFaker->getImage();
//         $galery->pictures()->save($picture);

//         for ($k = 0; $k < 3; $k++) {
//             $tag = Tag::firstOrCreate(['name' => $tags[array_rand($tags, 1)]]);
//             $picture->tags()->attach($tag);
//         }
//     }
// }

// $offset = 0;
// for ($j = 1; $j <= 2; $j++) {
//     for ($i = 1; $i < 26; $i++) {
//         $user = User::where('id', $i)->first();
//         var_dump($user);
//         $firstGalery = Galery::where('id', $i + $offset)->first();

//         $user->galeries()->save($firstGalery, ['role' => 'owner']);
//     }
//     $offset = 25;
// }