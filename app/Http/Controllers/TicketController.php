<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
    
        $tickets = Ticket::all();
        return view("welcome",compact("tickets"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sub' => 'required|string|max:255',
            'details' => 'required|string',
            'urgency' => 'required|in:High,Medium,Low',
            'dep' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'aname'=> 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }
        

        Ticket::create($validated);  
        return redirect()->route('raise ticket');  
    }

    public function show(Ticket $ticket){
        return view('raiseticket',compact('ticket'));
    }


    public function create(){
        return view('raiseticket');
        
    }

    public function edit(Ticket $ticket){
    return view('raiseticket', compact('ticket'));
    }

    public function update(Request $request, Ticket $ticket){
        $validated = $request->validate([
            'sub' => 'required|string|max:255',
            'details' => 'required|string',
            'urgency' => 'required|in:High,Medium,Low',
            'dep' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'aname' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }
        
        $ticket->update($validated);
        
        return redirect()->route('indeex')->with('success', 'Ticket updated successfully');
    }


    public function destroy(Ticket $ticket){
        $ticket->delete();
        return redirect()->route('index');
        
    }


}

