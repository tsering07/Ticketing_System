<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\department;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::paginate(8);
        return view("Index",compact("tickets"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sub' => 'required|string|max:255',
            'details' => 'required|string',
            'urgency' => 'required|in:High,Medium,Low',
            'dep' => 'required|string|max:255',//  convert into department
            // 'dep' => 'required|exists:department,id',
            // 'fname' => 'required|string|max:255', not needed we have this field if the user is authenticated
            'aname'=> 'required|string|max:255', // convert into userid
            'deadline' => 'nullable|date|after_or_equal:today',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            
        ]);

         
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
            $validated['image'] = $imagePath;
        }

        $validated['fname'] = auth()->user()->name ?? 'Anonymous';
        $validated['ip_address'] = $request->ip();
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

        return redirect()->route('index');
    }
        $validated = $request->validate([
            'sub' => 'required|string|max:255',
            'details' => 'required|string',
            'urgency' => 'required|in:High,Medium,Low',
            'dep' => 'required|string|max:255',
            'fname' => 'required|string|max:255',
            'aname' => 'nullable|string|max:255',
            'deadline' => 'nullable|date|after_or_equal:today',
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
        
        if ($request->filled('urgency')) {
            $query->where('urgency', $request->input('urgency'));
        }
            $tickets = $query->get();

        return view('SearchTicket', compact('tickets'));
    }

}








