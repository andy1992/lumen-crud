<?php

namespace App\Repositories\User;
use App\User;

interface UserRepositoryInterface {

    public function selectAll($columns = ['*'], $where = '1=1', $orderBy = 'id', $orderType = 'asc');

    public function paginate($columns = ['*'], $where = '1=1', $itemPerPage = 10, $params = []);

    public function getPage($columns = ['*'], $where = '1=1', $page = 1, $itemPerPage = 10, $params = []);

    public function find($id, $columns = ['*']);

    public function save(User $userObject);

    public function delete($id);

    public function findBy($field, $value, $columns = ['*']);
}
            