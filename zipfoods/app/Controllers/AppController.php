<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $welcomes = ['Welcome', 'Aloha!', 'Welkom', 'Bienvenidos', 'Bienvenu', 'Welkomma'];
        
        return $this->app->view('index', [
            'welcome' => $welcomes[array_rand($welcomes)]
        ]);
    }

    public function contact()
    {
        return $this->app->view('contact');
    }

    public function about()
    {
        return $this->app->view('about');
    }
    # user : root
    # pw: ""

    public function practice()
    {
        # Set up all the variables we need to make a connection
        $host = $this->app->env('DB_HOST');
        $database = $this->app->env('DB_NAME');
        $username = $this->app->env('DB_USERNAME');
        $password = $this->app->env('DB_PASSWORD');
        $charset = $this->app->env('DB_CHARSET', 'utf8mb4');

        # DSN (Data Source Name) string
        # contains the information required to connect to the database
        $dsn = "mysql:host=$host;dbname=$database;charset=$charset";

        # Driver-specific connection options
        $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::ATTR_EMULATE_PREPARES => false,
    ];

        try {
            # Create a PDO instance representing a connection to a database
            $pdo = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        # Example 1 - read data
        # Write a SQL query
        $sql = "SELECT * FROM products";

        # Execute the statement, getting the result set as a PDOStatement object
        # https://www.php.net/manual/en/pdo.query.php
        $statement = $pdo->query($sql);

        # https://www.php.net/manual/en/pdostatement.fetchall.php
        dump($statement->fetchAll());

        #Example 2 - create data
        $sql = "INSERT INTO products (name, description, price, available, weight, perishable) 
        values (
            'Farm Fresh Figs', 
            'Farm Fresh Figs are perfect for cheese boards, mediterranean dishes, or baked goods.',
            5.99, 
            0, 
            1,
            1)";

        //$pdo->query($sql);

        #Example 3 - create date with prepared statements

        # Note that the six ?'s in this statement will correlate to the six values in our $data array
        $sqlTemplate = "INSERT INTO products (name, description, price, available, weight, perishable) values (?, ?, ?, ?, ?, ?)";

        $values = [
            'Bananas',
            'Yup, just bananas. Bake em into bread this quarantine season.',
            2.99,
            0,
            1,
            1,
        ];

        # Prepare & Execute
        $statement = $pdo->prepare($sqlTemplate);
        $statement->execute($values);
    }

    public function practice2()
    {
        //dump($this->app->db()->all('products'));
        //dump($this->app->db()->findById('products', 5));
        dump($this->app->db()->findByColumn('products', 'available', '<', 10));
    }
}