<?php
use App\User;

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder {

    protected $pickuplines = [
        "Are you interested in making some magic together? My wand is at the ready.",
        "Are you using the Confundus charm on me or are you just naturally mind blowing?",
        "\"Baby, are you the Nimbus 2000 cause your sweeping me off my feet!\"",
        "\"Baby, you don't need defense against my dark arts.\"",
        "Being without you is like being afflicted with the Cruciatus Curse.",
        "Can I Slytherin your Ravenclaw or would you rather Hufflepuff my Gryffindor?",
        "\"Come here, I'll show you a REAL Patronus.\"",
        "\"Come on, let's do it Hippogriff style!\"",
        "\"Did you just say \"\"Wingardium Leviosa\"\"? Cause you've got me rising, baby.\"",
        "Did you just use the stupify charm or are you a natural stunner?",
        "Did you survive Avada Kedavra? 'Cause you're drop dead gorgeous.",
        "\"Do me, I'm Harry Fucking Potter.\"",
        "Do you like Harry Potter? Because I a-Dumbledore you!",
        "Do you want to head to the Shrieking Shack? We could do some shrieking of our own.",
        "\"Even though I am in Gryffindor, every time I see you something in my pants is Slytherin!\"",
        "\"Forget the train honey, just hop on my platform 9 and 3 quarters\"",
        "\"Girl, are you sure you're a muggle cause I'd swear that ass is magical!\"",
        "Going to bed? Mind if I Slytherin?",
        "\"Hagrid's not the only giant on campus, if you know what I mean.\"",
        "Have you been using Accio? Cuz I've been coming to you every night",
        "Have you been using the Petrificus Totalus spell? Because you've made me stiff.",
        "\"Have you heard of Platform 9 and 3/4? Well, I can think of something else with the exact same measurements.\"",
        "Hermoine your boobs look very heavy... can I hold them for you?",
        "\"Hermoine, I want to wear you like a pair of sun glasses, one leg over each ear.\"",
        "\"Hey, baby; I must be in the Room of Requirement, because I require YOU!\"",
        "\"I am a seeker, are you my golden snitch?\"",
        "I can be anything you want me to be... I've got enough Polyjuice for the whole night!",
        "I could make you scream louder than a mandrake!",
        "\"I don't have a broom, can I ride yours?\"",
        "\"I don't need accio, to make you come!\"",
        "I don't need aguamenti to make you wet!",
        "I don't need the Mirror of Erised to know that you're everything I desire.",
        "\"I heard you were in Gryffin-whore, because you let every wizard slyther-in.\"",
        "I heard you're a Gryffinwhore (Why?) Because you let every wizard Slytherin!",
        "\"I know we're not in Professor Flitwick's class, but you still are charming.\"",
        "\"I may be a muggle, but the things I can do in bed are magical!\"",
        "\"I may not be Harry Potter, but I can be your chosen one.\"",
        "\"I may not be the boy who lived, but I can still be your chosen one.\"",
        "I may not speak parseltongue but if you let me Slytherin to your bed I can show you what my tongue can really do!",
        "\"I must have had some Felix Felicis, because I think I'm about to get lucky.\"",
        "\"I use to go to the Astronomy Tower to see stars, but now I can just look into your eyes!\"",
        "I wanna be your Dumblewhore.",
        "I wanna open you wide like a book in the restricted section!",
        "\"I wanna stick my \"\"Sorcerer's Stone\"\" in your \"\"Chamber of Secrets\"\" and release \"\"The Prisoner of Azkaban\"\" into your \"\"Goblet of Fire\"\" giving the \"\"Order of the Phoenix\"\" making my \"\"Half Blood Prince\"\" rise and give you the \"\"Deathly Hallows\"\"\"",
        "\"I wanna stick my half-blood prince inside your chamber of secrets, and release the prisoner of azkaban to give you the deathly hallows.\"",
        "I was the one who gave Moaning Myrtle her nickname!",
        "I would take a marauders map just to stare at you all night!",
        "I'd let you handle my wand any day!",
        "I'd like to get my basilisk into your chamber of secrets.",
        "I'll remember to protect my wand when entering your chamber of secrets!",
        "\"I'm just like Oliver Wood, baby. I'm a keeper!\"",
        "I'm like devils snare. It only gets more painful if you struggle!",
        "\"I'm not wearing an invisibility cloak, but do you think I could still visit your restricted section tonight?\"",
        "I've been whomping my willow thinking about you.",
        "\"I've got two Bertie Bott's beans and a wand, wanna taste?\"",
        "If I opened my Gryffindor would you Slytherin?",
        "\"If i were a sorting hat, I'd put you in my house!\"",
        "\"If I were to look into the Mirror of Erised, I'd see the two of us together.\"",
        "\"If you were a Dementor, I'd become a criminal just to get your kiss.\"",
        "Interested in making some magic together? My wand is at the ready.",
        "Is that a wand in your pocket or are you just happy to see me?",
        "Is your name Felix Felicis? Cause you're about to get lucky!",
        "Just the thought of your wand makes me spill my potion!",
        "Let me Slytherin your Griffendoor.",
        "Let's have a Tri-Wizard tournament Protect your 'wand' from 'hogwarts' when you enter the 'chamber of secrets'",
        "\"Let's have some fun this match is sick, I want to take a ride on you Quidditch stick!\"",
        "Lets practice Alohomora...you can be the door so I can slam you all I want!",
        "Mind if I Weasley my way into your pants?",
        "My house is called the Shrieking Shack for a reason. I'll show you tonight.",
        "My love for you burns like a dying phoenix.",
        "\"My name might not be Luna, but I sure can Lovegood.\"",
        "\"My vagina is a horcrux, will you destroy it?\"",
        "My wand has chosen you!",
        "\"My wand? 12 inches, unyielding.....\"",
        "Once you go black you siriusly dont go back!",
        "One night with me and they'll be calling you MOANING Myrtle.",
        "Save a broom; ride a Quidditch player",
        "\"Screw Gryffindor, Ravenclaw, Hufflepuff and Slytherin, the only house I wanna be in is yours\"",
        "Speak Parseltongue to me and I'll let my snake out!",
        "Together we could really make the 'Shrieking Shack' worthy of its name.",
        "Wanna explore my chamber of secrets?",

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // following line retrieve all the user_ids from DB
        $users = User::all()->lists('id')->toArray();

        foreach (range(1, 50) as $index)
        {
            $company = \App\Post::create([
                'title'   => $this->pickuplines[$index],
                'user_id' => $faker->randomElement($users),
            ]);

        }
    }
}
