<?php

namespace App\Repositories\Product;
use App\Models\Product;
use DB;

class DbProductRepository implements ProductRepositoryInterface {

    /**
     * Method to delete Product based on its primary key
     * @param int $id primary key of the model
     */
    public function delete($id) {
        return Product::destroy($id);
    }

    /**
     * Method to find Product based on its primary key
     * @param int $id primary key of the model
     * @return App\Models\Product|null
     */
    public function find($id, $columns = ['*']) {
        return Product::find($id, $columns);
    }

    /**
     * Method to store / update Product
     * @param App\Models\Product $productObject
     */
    public function save(Product $productObject) {
        $product = $productObject;
        return $product->save();
    }

    /**
     * Method get all Product
     * @param mixed $columns list of columns to be retrieved
     * @param string $where raw where clause
     * @param mixed $bindings list of values to be bound to query builder
     * @param string $orderBy sort column
     * @param string $orderType sort type
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function selectAll($columns = ['*'], $where = '1=1', $bindings = [], $orderBy = 'product_id', $orderType = 'asc') {
        return Product::whereRaw($where)
            ->orderBy($orderBy, $orderType)
            ->setBindings($bindings, 'where')
            ->get($columns);
    }

    public function paginate($columns = ['*'], $where = '1=1', $bindings = [], $itemPerPage = 10, $params = [])
    {
        return Product::select($columns)
            ->whereRaw($where)
            ->orderBy($params['order_by'], $params['order_type'])
            ->setBindings($bindings, 'where')
            ->paginate($itemPerPage)
            ->appends($params);
    }

    public function getPage($columns = ['*'], $where = '1=1', $bindings = [], $page = 1, $itemPerPage = 10, $params = [])
    {
        return Product::select($columns)
            ->whereRaw($where)
            ->take($itemPerPage)
            ->skip(($page - 1) * $itemPerPage)
            ->orderBy($params['order_by'], $params['order_type'])
            ->setBindings($bindings, 'where')
            ->get();
    }

    public function findBy($field, $value, $columns = ['*'])
    {
        return Product::where($field, '=', $value)->first($columns);
    }

}
            