<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Note;
use App\Card;

class NotesController extends Controller
{
	

	public function store(Request $request, Card $card)
	{
		//return $request->all();
		//return $card;


		/*
		There are three ways to make this happen. 


		The first way is to create a new note object, then set the note->body to the request object's note body that was
		passed in ($request->body). Then, you call the notes function on the card object 
		(passed into this store function as a parameter), and Eloquently saving the $note object's body as a 
		note of the card object.
		*/
		// $note = new Note;
		// $note->body = $request->body;
		// $card->notes()->save($note);


		/*
		The next way is to make a new note object, but then pass in the array's key ('body') and set the value of this key
		to the body of the request variable ($request->body). Then do the same as above: Eloquently saving the $note 
		object's body as a note of the card object.
		*/
		// $note = new Note(['body' => $request->body]);
		// $card->notes()->save($note);


		/*
		Finally, take the $card object and using the notes() function then Eloquently create a a body for it by using the 
		*/
		// $card->notes()->create([
		// 	'body' => $request->body
		// ]);

		$this->validate($request, [
			'body' => 'required|min:3'
		]);

		$note = new Note($request->all());

		$card->addNote($note, 1);

		return back();
	}

	public function edit(Note $note)
	{
		return view('notes.edit', compact('note'));
	}

	public function update(Request $request, Note $note)
	{
		
		$note->update($request->all());
		return back();

	}
}
