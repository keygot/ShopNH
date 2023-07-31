<?php
namespace App\Composers;

use App\Models\Product;
use App\Repositories\UserRepository;
use Illuminate\View\View;
 
class ProductComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $product;
 
    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
 
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('products', $this->product->paginate(8));
    }
}


?>