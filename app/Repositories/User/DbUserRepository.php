<?php
namespace App\Repositories\User;
use App\User;
use DB;

class DbUserRepository implements UserRepositoryInterface {

    /**
     * Method to delete User based on its primary key
     * @param int $id primary key of the model
     */
    public function delete($id) {
        return User::destroy($id);
    }

    /**
     * Method to find User based on its primary key
     * @param int $id primary key of the model
     * @return App\Models\User|null
     */
    public function find($id, $columns = ['*']) {
        return User::find($id, $columns);
    }

    /**
     * Method to store / update User
     * @param App\Models\User $userObject
     */
    public function save(User $userObject) {
        $user = $userObject;
        return $user->save();
    }

    /**
     * Method get all User
     * @param mixed $columns list of columns to be retrieved
     * @param string $where raw where clause
     * @param mixed $bindings list of values to be bound to query builder
     * @param string $orderBy sort column
     * @param string $orderType sort type
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function selectAll($columns = ['*'], $where = '1=1', $bindings = [], $orderBy = 'id', $orderType = 'asc') {
        return User::whereRaw($where)
            ->orderBy($orderBy, $orderType)
            ->setBindings($bindings, 'where')
            ->get($columns);
    }

    public function paginate($columns = ['*'], $where = '1=1', $bindings = [], $itemPerPage = 10, $params = [])
    {
        return User::select($columns)
            ->whereRaw($where)
            ->orderBy($params['order_by'], $params['order_type'])
            ->setBindings($bindings, 'where')
            ->paginate($itemPerPage)
            ->appends($params);
    }

    public function getPage($columns = ['*'], $where = '1=1', $bindings = [], $page = 1, $itemPerPage = 10, $params = [])
    {
        return User::select($columns)
            ->whereRaw($where)
            ->take($itemPerPage)
            ->skip(($page - 1) * $itemPerPage)
            ->orderBy($params['order_by'], $params['order_type'])
            ->setBindings($bindings, 'where')
            ->get();
    }

    public function findBy($field, $value, $columns = ['*'])
    {
        return User::where($field, '=', $value)->first($columns);
    }

}
