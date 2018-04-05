<?php

            namespace App\Repositories\Product;
            use App\Models\Product;

            interface ProductRepositoryInterface {
    
                public function selectAll($columns = ['*'], $where = '1=1', $orderBy = 'product_id', $orderType = 'asc');

                public function paginate($columns = ['*'], $where = '1=1', $itemPerPage = 10, $params = []);

                public function getPage($columns = ['*'], $where = '1=1', $page = 1, $itemPerPage = 10, $params = []);

                public function find($id, $columns = ['*']);

                public function save(Product $productObject);

                public function delete($id);

                public function findBy($field, $value, $columns = ['*']);

                public function count($where = '1=1', $bindings = []);
            }
            