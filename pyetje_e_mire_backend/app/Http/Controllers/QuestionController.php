<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index(){
        $answer = Question::all(); // select * from anwers
        return response()->json($answer, 200);
    }

    public function store(Request $request){

        Question::create($request->all());

        return response()->json("created", 200);
    }

    public function show($id) {

        // check if slug is set
        if (!isset($id)) {
            throw new \InvalidArgumentException('Bad argument: Important credential \'id\' is in bad format.', 400);
        }

        $question = Question::where('id', $id)->first();

        return response()->json($question, 200);
    }

    public function update(Request $request, $id)
    {
         // check if is admin or author
         if (!$id) {
            // return access denied
            throw new \InvalidArgumentException('No Article Id provided', 403);
        }

        $question = Question::find($id);

        $question->update($request->all());

        return response()->json('updated', 200);
    }

    public function destroy($id)
    {
        $question = Question::where('id', $id)->first();

        // gelete user
        $question->delete();

        return response()->json('Deleted', 200);
    }
}
