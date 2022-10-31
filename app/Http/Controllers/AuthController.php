<?php

namespace App\Http\Controllers;

use App\Services\Response\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request, Response  $res)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return $res->success(['apiToken' => auth()->user()->createToken('apiToken1')->plainTextToken]);
        }
        return $res->error('incorrect', ['error' => ['Wrong username or password.']]);
    }
}
