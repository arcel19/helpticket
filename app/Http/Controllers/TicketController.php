<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Requests\StoreticketRequest;
use App\Http\Requests\UpdateticketRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('ticket.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ticket.ticket-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreticketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreticketRequest $request)
    {


        $ticket = Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' =>auth()->id(),
            'status_changed_by_id' =>auth()->id(),

        ]);

        if($request->file('attachements')){
            $ext = $request->file('attachements')->extension();
            $content = file_get_contents($request->file('attachements'));
            $filename =str::random(10);
            $path = "attachements/.$filename.$ext";
            storage::disk('public')->put($path, $content);
            $ticket->update([
                'attachements' =>$path,
            ]);

        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(ticket $ticket)
    {
        return view('ticket.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateticketRequest  $request
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateticketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->validated());
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     
     * @param  \App\Models\ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect('/ticket')->with('message','delete sucessfuly');
    }
}
