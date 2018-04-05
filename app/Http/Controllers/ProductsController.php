<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use App\Constants\Pagination;

class ProductsController extends Controller
{
    protected $product;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ProductRepositoryInterface $product)
    {
        //$this->middleware('auth');
        $this->product = $product;
    }

    /**
     * Get products list.
     *
     * @return array
     */
    public function index()
    {
        $products = $this->product->selectAll();
        return response($products);
    }

    /**
     * Paginate products list.
     *
     * @param $page
     * @return array
     */
    public function paginate($page, $item_per_page)
    {
        $columns = ['*'];
        $where = '1=1';
        $bindings = [];
        $params = [
            'order_by'  => 'product_id',
            'order_type'=> 'desc'
        ];

        if(Input::has('q')) {
            $where = "product_name LIKE ?";
            $bindings = ['%' . Input::get('q') . '%'];
        }

        $products = $this->product->getPage($columns, $where, $bindings, $page, $item_per_page, $params);
        return response($products);
    }

    /**
     * Get single product.
     * @param $id
     * @return App\Models\Product
     */
    public function show($id)
    {
        $result = null;
        $product = $this->product->find($id);
        if(null !== $product) {
            $result['success'] = true;
            $result['data'] = $product;
        } else {
            $result['success'] = false;
            $result['message'] = 'Product with ID: ' . $id . ' was not found.';
            $result['data'] = null;
        }

        return response($result);
    }

    /**
     * Insert new product.
     *
     * @param Illuminate\Http\Request $request
     * @return App\Models\Product
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->description = $request->input('description');
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();

        $result = null;
        if($this->product->save($product)) {
            $result['success'] = true;
            $result['message'] = 'Product Inserted with ID: ' . $product->product_id . '.';
            $result['data'] = $product;
        } else {
            $result['success'] = false;
            $result['message'] = 'Failed to insert new product.';
            $result['data'] = null;
        }

        return response($result);
    }

    /**
     * Update existing product.
     *
     * @param Illuminate\Http\Request $request
     * @param $id
     * @return App\Models\Product
     */
    public function update(Request $request, $id)
    {
        $result = null;
        $product = $this->product->find($id);
        if(null !== $product) {
            $product->product_name = $request->input('product_name');
            $product->price = $request->input('price');
            $product->quantity = $request->input('quantity');
            $product->description = $request->input('description');
            $product->updated_at = Carbon::now();

            if($this->product->save($product)) {
                $result['success'] = true;
                $result['message'] = 'Product ID: ' . $product->product_id . ' has been updated.';
                $result['data'] = $product;
            } else {
                $result['success'] = false;
                $result['message'] = 'Failed to update product with ID: ' . $id . '.';
                $result['data'] = null;
            }
        } else {
            $result['success'] = false;
            $result['message'] = 'Product with ID: ' . $id . ' was not found.';
            $result['data'] = null;
        }

        return response($result);
    }

    /**
     * Delete existing product.
     *
     * @param $id
     * @return App\Models\Product
     */
    public function delete($id)
    {
        $result = null;
        $product = $this->product->find($id);
        if(null !== $product) {
            if($this->product->delete($id)) {
                $result['success'] = true;
                $result['message'] = 'Product ID: ' . $product->product_id . ' has been deleted.';
                $result['data'] = $product;
            } else {
                $result['success'] = false;
                $result['message'] = 'Failed to delete product with ID: ' . $id . '.';
                $result['data'] = null;
            }
        } else {
            $result['success'] = false;
            $result['message'] = 'Product with ID: ' . $id . ' was not found.';
            $result['data'] = null;
        }
        return response($result);
    }

    public function count()
    {
        $where = '1=1';
        $bindings = [];
        if(Input::has('q')) {
            $where = 'product_name LIKE ?';
            $bindings = ['%' . Input::get('q') . '%'];
        }

        return response($this->product->count($where, $bindings));
    }
}
