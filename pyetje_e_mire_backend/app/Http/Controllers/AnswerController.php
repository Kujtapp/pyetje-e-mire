<?php

namespace App\Http\Controllers;
use App\Models\Answer;

use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function index(){
        $answer = Answer::all(); // select * from anwers
        return response()->json($answer, 200);
    }

    public function store(Request $request){

        $request->merge(['user_id' => '1']);

        Answer::create($request->all()); 

        return response()->json("created", 200);
    }

    public function show($id) {

        // check if slug is set
        if (!isset($id)) {
            throw new \InvalidArgumentException('Bad argument: Important credential \'id\' is in bad format.', 400);
        }

        $answers = Answer::where('question_id', $id)->get(); //where('id', $id)->get();

        return response()->json($answers, 200);
    }

    public function update(Request $request, $id)
    {
         // check if is admin or author
         if (!$id) {
            // return access denied
            throw new \InvalidArgumentException('No Article Id provided', 403);
        }

        $answers = Answer::find($id);

        $answers->update($request->all());

        return response()->json('updated', 200);
    }

    public function destroy($id)
    {
        $answers = Answer::where('id', $id)->first();

        // gelete user
        $answers->delete();

        return response()->json('Deleted', 200);
    }
}
