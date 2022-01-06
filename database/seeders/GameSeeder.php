<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'title' => "No Man's Sky",
            'price' => 347999,
            'description' => "No Man's Sky is a game about exploration and survival in an infinite procedurally generated universe.",
            'long_description' => "Inspired by the adventure and imagination that we love from classic science-fiction, No Man's Sky presents you with a galaxy to explore, filled with unique planets and lifeforms, and constant danger and action. In No Man's Sky, every star is the light of a distant sun, each orbited by planets filled with life, and you can go to any of them you choose. Fly smoothly from deep space to planetary surfaces, with no loading screens, and no limits. In this infinite procedurally generated universe, you'll discover places and creatures that no other players have seen before - and perhaps never will again.",
            'developer' => 'Hello Games',
            'publisher' => 'Hello Games',
            'image_cover_path' => 'images/games/1.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2016-08-12',
            'contain_adult_content' => false,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "FIFA 22",
            'price' => 659000,
            'description' => "Powered by Football™, EA SPORTS™ FIFA 22 brings the game even closer to the real thing with fundamental gameplay advances and a new season of innovation across every mode.",
            'long_description' => "Powered by Football™, EA SPORTS™ FIFA 22 brings the game even closer to the real thing with fundamental gameplay advances and a new season of innovation across every mode.",
            'developer' => 'EA Canada',
            'publisher' => 'Electronic Arts',
            'image_cover_path' => 'images/games/2.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2021-09-30',
            'contain_adult_content' => false,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "Realm of the Mad God",
            'price' => 0,
            'description' => "Team up with dozens of players and battle through the Realm of the Mad God, Oryx. With a retro 8-bit style, Realm is an evolution of traditional MMO gameplay.",
            'long_description' => "Realm of the Mad God is the first ever free to play Bullet Hell MMO. Team up with dozens of players and battle through the Realm of the Mad God, Oryx. With a retro 8-bit style, Realm is an evolution of traditional MMO gameplay. 17 classes and hundreds of items to discover means Realm is easy to play but difficult to master.",
            'developer' => 'Wild Shadow Studios',
            'publisher' => 'Deca Games',
            'image_cover_path' => 'images/games/3.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2012-02-21',
            'contain_adult_content' => false,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "Forza Horizon 5",
            'price' => 699000,
            'description' => "Your Ultimate Horizon Adventure awaits! Explore the vibrant and ever-evolving open world landscapes of Mexico with limitless, fun driving action in hundreds of the world’s greatest cars. Begin Your Horizon Adventure today and add to your Wishlist!",
            'long_description' => "Your Ultimate Horizon Adventure awaits! Explore the vibrant and ever-evolving open world landscapes of Mexico with limitless, fun driving action in hundreds of the world’s greatest cars.",
            'developer' => 'Playground Games',
            'publisher' => 'Xbox Game Studios',
            'image_cover_path' => 'images/games/4.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2021-11-09',
            'contain_adult_content' => false,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "NieR: Automata™",
            'price' => 579000,
            'description' => "NieR: Automata tells the story of androids 2B, 9S and A2 and their battle to reclaim the machine-driven dystopia overrun by powerful machines.",
            'long_description' => "NieR: Automata tells the story of androids 2B, 9S and A2 and their battle to reclaim the machine-driven dystopia overrun by powerful machines. Humanity has been driven from the Earth by mechanical beings from another world. In a final effort to take back the planet, the human resistance sends a force of android soldiers to destroy the invaders. Now, a war between machines and androids rages on... A war that could soon unveil a long-forgotten truth of the world.",
            'developer' => 'Square Enix',
            'publisher' => 'Square Enix',
            'image_cover_path' => 'images/games/5.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2017-03-17',
            'contain_adult_content' => true,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "Stranded Deep",
            'price' => 95999,
            'description' => "Take the role of a plane crash survivor stranded somewhere in the Pacific Ocean. Come face to face with some of the most life threatening scenarios that will result in a different experience each time you play. Scavenge. Discover. Survive.",
            'long_description' => "TEST YOUR SURVIVAL SKILLS IN THIS OPEN WORLD ADVENTURE. In the aftermath of a mysterious plane crash, you are stranded in the vast expanse of the Pacific Ocean. Alone, without any means to call for help, you must do what you can to survive.",
            'developer' => 'Beam Team Games',
            'publisher' => 'Beam Team Publishing',
            'image_cover_path' => 'images/games/6.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2015-01-23',
            'contain_adult_content' => true,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "Nickelodeon All-Star Brawl",
            'price' => 209999,
            'description' => "Brawl it out with your Nickelodeon favorites in epic platform battles.",
            'long_description' => "Brawl it out as your favorite Nickelodeon characters in bombastic platform battles! With a power-packed cast of heroes from the Nickelodeon universe, face-off with all-stars from SpongeBob Squarepants, Teenage Mutant Ninja Turtles, The Loud House, Danny Phantom, Aaahh!!! Real Monsters, The Wild Thornberrys, Hey Arnold!, Rugrats, and more to determine ultimate animation dominance. With unique move sets and attacks inspired by their personalities, each character has an individual style of play enabling endless action for Nickelodeon’s legion of fans. Select your favorite and then let the intense brawls begin with online and local multiplayer action.",
            'developer' => 'Ludosity, Fair Play Labs',
            'publisher' => 'GameMill Entertainment',
            'image_cover_path' => 'images/games/7.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2021-10-05',
            'contain_adult_content' => false,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "Assassin's Creed® Origins",
            'price' => 619000,
            'description' => "ASSASSIN’S CREED® ORIGINS IS A NEW BEGINNING *The Discovery Tour by Assassin’s Creed®: Ancient Egypt is available now as a free update!* Ancient Egypt, a land of majesty and intrigue, is disappearing in a ruthless fight for power.",
            'long_description' => "Ancient Egypt, a land of majesty and intrigue, is disappearing in a ruthless fight for power. Unveil dark secrets and forgotten myths as you go back to the one founding moment: The Origins of the Assassin’s Brotherhood.",
            'developer' => 'Ubisoft Montreal',
            'publisher' => 'Ubisoft',
            'image_cover_path' => 'images/games/8.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2017-10-27',
            'contain_adult_content' => true,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "Subnautica: Below Zero",
            'price' => 139999,
            'description' => "Dive into a freezing underwater adventure on an alien planet. Below Zero is set two years after the original Subnautica. Return to Planet 4546B to uncover the truth behind a deadly cover-up. Survive by building habitats, crafting tools, & diving deeper into the world of Subnautica.",
            'long_description' => "Swim beneath the blue-lit, arching expanses of Twisty Bridges. Become mesmerized by the glittering, mammoth crystals of the Crystal Caverns. Clamber up snow covered peaks and venture into the icy caves of Glacial Basin. Maneuver between erupting Thermal Vents to discover ancient alien artifacts. Below Zero presents entirely new environments for you to survive, study, and explore.",
            'developer' => 'Unknown Worlds Entertainment',
            'publisher' => 'Unknown Worlds Entertainment',
            'image_cover_path' => 'images/games/9.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2021-05-14',
            'contain_adult_content' => false,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "The Sims™ 4",
            'price' => 347999,
            'description' => "Play with life and discover the possibilities. Unleash your imagination and create a world of Sims that’s wholly unique. Explore and customize every detail from Sims to homes–and much more.",
            'long_description' => "Discover beautiful locations with distinctive environments, and go on spontaneous adventures. Manage the ups and downs of Sims’ everyday lives and see what happens when you play out realistic or fantastical scenarios. Tell your stories your way while developing relationships, pursuing careers and life aspirations, and immersing yourself in an extraordinary game where the possibilities are endless.",
            'developer' => 'Maxis',
            'publisher' => 'Electronic Arts',
            'image_cover_path' => 'images/games/10.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2014-09-02',
            'contain_adult_content' => false,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "INMOST",
            'price' => 95999,
            'description' => "Escape the depths of an otherworldly labyrinth in this cinematic puzzle platformer. Explore a hauntingly beautiful world, with three playable characters, in one dark, interconnected story.",
            'long_description' => "INMOST, by Lithuania-based indie studio Hidden Layer Games, is an emotional and deeply atmospheric narrative-driven puzzle platformer. Uncover the story of an adventurous young girl, a stoic knight and a man in search of answers.",
            'developer' => 'Hidden Layer Games',
            'publisher' => 'Chucklefish',
            'image_cover_path' => 'images/games/11.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2020-08-21',
            'contain_adult_content' => true,
            'category_id' => random_int(1, 11),
        ]);

        DB::table('games')->insert([
            'title' => "Ori and the Will of the Wisps",
            'price' => 139999,
            'description' => "Play the critically acclaimed masterpiece. Embark on a new journey in a vast, exotic world where you’ll encounter towering enemies and challenging puzzles on your quest to unravel Ori’s destiny.",
            'long_description' => "The little spirit Ori is no stranger to peril, but when a fateful flight puts the owlet Ku in harm’s way, it will take more than bravery to bring a family back together, heal a broken land, and discover Ori’s true destiny. From the creators of the acclaimed action-platformer Ori and the Blind Forest comes the highly anticipated sequel. Embark on an all-new adventure in a vast world filled with new friends and foes that come to life in stunning, hand-painted artwork. Set to a fully orchestrated original score, Ori and the Will of the Wisps continues the Moon Studios tradition of tightly crafted platforming action and deeply emotional storytelling.",
            'developer' => 'Moon Studios GmbH',
            'publisher' => 'Xbox Game Studios',
            'image_cover_path' => 'images/games/12.jpg',
            'trailer_video_path' => 'video/games/1.webm',
            'release_date' => '2020-03-11',
            'contain_adult_content' => true,
            'category_id' => random_int(1, 11),
        ]);
    }
}
