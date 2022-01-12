<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function dataUser(Request $request)
    {
        $users = User::get();
        $response = array(
            'status' => true,
            'message' => "get data success!!",
            'data' => $users
        );

        return $response;
    }
}
