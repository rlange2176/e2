<?php

namespace App\Commands;

class AppCommand extends Command
{
    public function fresh()
    {
        $this->migrate();
        $this->seed();
    }
    
    public function migrate()
    {
        $this->app->db()->createTable('rounds', [
    'fruit1' => 'varchar(20)',
    'fruit2' => 'varchar(20)',
    'fruit3' => 'varchar(20)',
    'winner' => 'varchar(20)',
    'jackpot' => 'int',
    'time' => 'timestamp',
]);
    }

    public function seed()
    {
        # Instantiate a new instance of the Faker\Factory class
        $faker = \Faker\Factory::create();

        # Use a loop to create 10 past rounds
        for ($i = 0; $i < 10; $i++) {
            $fruits = [
                'Banana' => 100,
                'Cherry' => 50,
                'Apple' => 40,
                'Lemon' => 25,
                ];
            $winner = ['House' => 0, 'Player 1' => 1];


            # Set up a round
            $round = [
        'fruit1' => array_rand($fruits, 1),
        'fruit2' => array_rand($fruits, 1),
        'fruit3' => array_rand($fruits, 1),
        'winner' => array_rand($winner, 1),
        'jackpot' => rand(75, 300),
        'time' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s')
    ];

            # Insert the review
            $this->app->db()->insert('rounds', $round);
        }
    }
}