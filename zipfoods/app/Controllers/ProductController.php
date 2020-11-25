<?php
namespace App\Controllers;

class ProductController extends Controller
{
    //private $products;

    public function __construct($app)
    {
        parent::__construct($app);
    }

    public function index()
    {
        //$products = $this->app->db()->all('products');
        return $this->app->view('products.index', [
            'products' => $this->app->db()->all('products')
]);
    }

    public function show()
    {
        #get id route parameter
        $id = $this->app->param('id');
        #if no id is present, send the user to the products page
        if (is_null($id)) {
            $this->app->redirect('/products');
        }
        #load product details
        $product = $this->app->db()->findById('products', $id);
        #if product can't be found, return the 'product missing' view
        if (is_null($product)) {
            return $this->app->view('products.missing', ['id' => $id]);
        }
        #load review details
        $reviews = $this->app->db()->findByColumn('reviews', 'product_id', '=', $id);

        #if review is submitted, pass it to the view and show confirmation message

        $confirmationName = $this->app->old('confirmationName');

        return $this->app->view('products.show', [
        'product' => $product,
        'confirmationName' => $confirmationName,
        'reviews' => $reviews,
    ]);
    }

    public function saveReview()
    {
        $this->app->validate([
    'name' => 'required',
    'content' => 'required|minLength:200'
]);

        #extract data from form submission
        $name = $this->app->input('name');
        $content = $this->app->input('content');
        $id = $this->app->input('id');
        #insert into database
        $data =[
                'name' => $name,
                'content' => $content,
                'product_id' => $id,
];
        $this->app->db()->insert('reviews', $data);

        $this->app->redirect('/product?id='.$id, ['confirmationName' => $name]);
    }
}