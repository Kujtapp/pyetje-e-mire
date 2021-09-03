<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $user = User::all(); // select * from anwers
        return response()->json($user, 200);
    }

    public function store(Request $request){

        User::create($request->all()); 

        return response()->json("created", 200);
    }

    public function show($id) {

        // check if slug is set
        if (!isset($id)) {
            throw new \InvalidArgumentException('Bad argument: Important credential \'id\' is in bad format.', 400);
        }

        $user = User::where('id', $id)->first();

        return response()->json($user, 200);
    }

    public function update(Request $request, $id)
    {
         // check if is admin or author
         if (!$id) {
            // return access denied
            throw new \InvalidArgumentException('No Article Id provided', 403);
        }

        $user = User::find($id);

        $user->update($request->all());

        return response()->json('updated', 200);
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        // gelete user
        $user->delete();

        return response()->json('Deleted', 200);
    }
}
