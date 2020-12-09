<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $results = $this->app->old('results');
        return $this->app->view('index', [
            'results' => $results
        ]);
    }


    public function history()
    {
        $rounds = $this->app->db()->all('rounds');
        return $this->app->view('history', [
            'rounds' => $rounds
        ]);
    }

    public function round()
    {
        $id = $this->app->param('id');
        $round = $this->app->db()->findById('rounds', $id);
        return $this->app->view('round', [
            'round' => $round
        ]);
    }

    public function play()
    {
        #form validation
        $this->app->validate([
            'fruit1' => 'required|maxLength:6'
        ]);
        #define player's fruit choice
        $fruit1 = $this->app->input('fruit1');
        $fruits = [
                'Banana' => 100,
                'Cherry' => 50,
                'Apple' => 40,
                'Lemon' => 25,
                ];

        #computer's fruit selections
        $fruit2 = array_rand($fruits, 1);
        $fruit3 = array_rand($fruits, 1);

        #determine winner
        if ($fruit1 == $fruit2 and $fruit2 == $fruit3) {
            $winner = 'You';
        } else {
            $winner = 'The House';
        }
        #determine jackpot
        $jackpot = $fruits[$fruit1] + $fruits[$fruit2] + $fruits[$fruit3];
        #save data to database
        $data = [
                'fruit1' => $fruit1,
                'fruit2' => $fruit2,
                'fruit3' => $fruit3,
                'winner' => $winner,
                'jackpot' => $jackpot,
                'time' => date('Y-m-d H:i:s')
        ];

        $this->app->db()->insert('rounds', $data);

        #send user back to homepage
        $this->app->redirect('/', [
            'results' => [
                'fruit1' => $fruit1,
                'fruit2' => $fruit2,
                'fruit3' => $fruit3,
                'winner' => $winner,
                'jackpot' => $jackpot,
            ]
            
        ]);
    }
}