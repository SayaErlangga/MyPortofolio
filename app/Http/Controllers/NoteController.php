<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_note = Note::all()->reverse();

        return view('index', compact('data_note'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Note::create([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $note = Note::find($id);
        $note->update([
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description
        ]);
        return redirect('/');
    }    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Note::find($id);
        $note->delete();
        return redirect('/');
    }

    public function editFinished(string $id)
    {
        $note = Note::find($id);
        $note->update([
            'status' => "finished",
        ]);
        return redirect('/');
    }
}
