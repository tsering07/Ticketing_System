<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\department;
class TicketDashboard extends Controller
{
    public function index() 
    {
        $ticketsByDepartment = Ticket::selectRaw('dep, COUNT(*) as count')
                                    ->groupBy('dep')
                                    ->get();

        $departments = $ticketsByDepartment->pluck('dep');
        $counts = $ticketsByDepartment->pluck('count');

        $totalTickets = Ticket::count();
        $resolved = Ticket::where('status', 'resolved')->count();
        $inProcess = Ticket::where('status', 'in_process')->count();
        $pending = Ticket::where('status', 'pending')->count();

        $handlerCounts = [];
        foreach ($ticketsByDepartment as $item) {
        $handler = Department::getHandlerByDepartment($item->dep);
        $handlerCounts[$handler] = ($handlerCounts[$handler] ?? 0) + $item->count;
    }

    $handlers = array_keys($handlerCounts);
    $handlerTicketCounts = array_values($handlerCounts);

        return view('TicketDashboard', [
            'departments' => $departments,
            'counts' => $counts,
            'totalTickets' => $totalTickets,
            'resolved' => $resolved,
            'inProcess' => $inProcess,
            'pending' => $pending,
            'handlers' => $handlers,
            'handlerCounts' => $handlerTicketCounts,
        ]);
    }
    
    
}
