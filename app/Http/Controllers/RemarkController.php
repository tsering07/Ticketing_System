<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Remark;

class RemarkController extends Controller
{
    public function store(Request $request, Ticket  $ticket)
    {
        $request->validate([
            'remarks' => 'required|string|max:1000',
        ]);

        $ticket->remarks()->create([
            'remarks' => $request->remarks,
        ]);

        return redirect()->route('ticket.show', $ticket->id)->with('success','Remark added');
    }
    public function edit(Remark $remark)
    {
        return view('edit', compact('remark'));
    }

    public function update(Request $request, Remark $remark)
    {
        $request->validate([
            'remarks' => 'required|string|max:1000',
        ]);

        $remark->update([
            'remarks' => $request->remarks,
        ]);
        
        return redirect()->route('ticket.show', $remark->ticket_id)->with('success', 'Updated');
    }

    public function destroy(Remark $remark)
    {
        $ticketId = $remark->ticket_id;
        $remark->delete();

        return redirect()->route('ticket.show', $ticketId)->with('success', 'Remark deleted');
    }
}
