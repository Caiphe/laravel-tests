<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        try{
            $users = User::all();
            return response()->json([
                'status' => 'success',
                'data' => $users
        ], 200);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while fetching users: ' . $e->getMessage()
            ], 500);
        }
    }
}
