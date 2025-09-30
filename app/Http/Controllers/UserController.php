<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function register(RegisterRequest $request){
        try {
            $data = $request->validated();

            $user =  User::create([
                "name" => $data["name"],
                "email" => $data["email"],
                "password" => bcrypt($data["password"])
            ]);

            return response()->json([
                "status"=>200,
                "message"=>"User Registered",
                "user"=>$user
            ])->setStatusCode(201);
        } catch (\Throwable $th) {
            return response()->json([
                "status"=>500,
                "message"=> $th->getMessage()
            ])->setStatusCode(500);
        }
    }
}
