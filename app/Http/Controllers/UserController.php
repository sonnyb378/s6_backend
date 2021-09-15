<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function orders($user_id) {
        $user = User::find($user_id);
        if ($user) {
            return $user->orders;
        }
        return response()->json(["message" => "User does not exist"]);
    }
    public function creatives($user_id) {
        $user = User::find($user_id);
        if ($user) {
            return $user->creatives;
        }
        return response()->json(["message" => "User does not exist"]);
    }
}
