<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::all();
        return view("Index",compact("tickets"));
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
            'remarks'=>'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            
        ]);

        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }
        
        
        Ticket::create($validated);  
        return redirect()->route('index');  
    }

    public function show(Ticket $ticket){
        return view('show',compact('ticket'));
    }


    public function create(){
        return view('raiseticket');
        
    }

    public function edit(Ticket $ticket){
        return view('raiseticket', compact('ticket'));
    }
    public function update(Request $request, Ticket $ticket){
        if ($request->has('status')) {
        $request->validate([
            'status' => 'required|in:pending,in_process,resolved',
        ]);

        $ticket->status = $request->status;
        $ticket->save();

        return back()->with('success', 'Status updated.');
    }
    
        if ($request->has('remarks') && !$request->has('sub')) {
        $request->validate([
            'remarks' => 'nullable|string',
        ]);

        // Only allow first time remarks submission
        if (empty($ticket->remarks)) {
            $ticket->remarks = $request->remarks;
            $ticket->save();

            return back()->with('success', 'Remarks added successfully.');
        } else {
            return back()->with('error', 'Remarks already exist. You can only edit them from the edit page.');
        }
    }

    
        $validated = $request->validate([
            'sub' => 'required|string|max:255',
            'details' => 'required|string',
            'urgency' => 'required|in:High,Medium,Low',
            'dep' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'aname' => 'nullable|string|max:255',
            'remarks'=>'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }
        
        $ticket->update($validated);
        
        return redirect()->route('index')->with('success', 'Ticket updated successfully');
    }


    public function destroy(Ticket $ticket){
        $ticket->delete();
        return redirect()->route('index');
        
    }

    public function search(Request $request){
        $query = Ticket::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('dep', 'like', "%$search%")
                ->orWhere('sub', 'like', "%$search%")
                ->orWhere('aname','like', "%$search%");
        }

        $tickets = $query->get();

        return view('SearchTicket', compact('tickets'));
    }
    
    public function showadmin(Request $request,Ticket $ticket){ //passing the ticket variable in the admin page
        $tickets = Ticket::all();
        return view('Admin',compact('tickets'));
    }

}








