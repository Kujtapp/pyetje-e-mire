<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function __invoke(Request $request) {

        if(!auth()->attempt($request->only('email', 'password'))) {
            throw new AuthenticationException();
        }

       $user = User::where('email',  $request->email)->first();

       if($user->email_verified_at == null) {
           return response()->json([
               'message' => 'Not verified',
               'status_code' => 403
           ], 403);
       }

       $request->session()->regenerate();
       
        return response()->json(null, 201);
    }
}
