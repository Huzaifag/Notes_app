<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $notes = Notes::query()->orderBy("created_at","desc")->get();
        // dd($notes);
        $notes = Notes::query()
        ->where('user_id', request()->user()->id)
        ->orderBy("created_at","desc")
        ->paginate();
        // dd($notes);
        return view('note.index', ['notes' => $notes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('note.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'note'=> ['required','string'],
        ]);
        $data['user_id'] = $request->user()->id;
        $note = Notes::create($data);
        return to_route('note.show', $note)->with('message',value: 'Note created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $note)
    {
        if(request()->user()->id != $note->user_id){
            abort(403);
        }
        return view('note.show', ['note' => $note]);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $note)
    {
        if(request()->user()->id != $note->user_id){
            abort(403);
        }
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $note)
    {
        if(request()->user()->id != $note->user_id){
            abort(403);
        }
        $data = $request->validate([
            'note'=> ['required','string'],
        ]);
        $note->update($data);
        return to_route('note.show', $note)->with('message',value: 'Note Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $note)
    {
        if(request()->user()->id != $note->user_id){
            abort(403);
        }
        $note->delete();
        return redirect()->route('note.index')->with('message', 'Note Deleted');
    }
}

# php artisan make:controller noteController --resource --model=Notes