<?php
/**
 * Created by PhpStorm.
 * User: Andy.Wijaya
 * Date: 2/10/2018
 * Time: 11:25 AM
 */

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Register new user
     *
     * @param $request Request
     */
    public function register(Request $request)
    {
        $hasher = app()->make('hash');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $hasher->make($request->input('password'));
        $register = User::create([
            'username'=> $username,
            'email'=> $email,
            'password'=> $password,
        ]);
        if ($register) {
            $res['success'] = true;
            $res['message'] = 'Registration successful.';
            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'Registration failed.';
            return response($res);
        }
    }
    /**
     * Get user by id
     *
     * URL /user/{id}
     */
    public function getUser(Request $request, $id)
    {
        $user = User::where('id', $id)->get();
        if ($user) {
            $res['success'] = true;
            $res['message'] = $user;

            return response($res);
        }else{
            $res['success'] = false;
            $res['message'] = 'Cannot find user!';

            return response($res);
        }
    }
}