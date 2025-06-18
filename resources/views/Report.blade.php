<x-navbar>
    <div class="max-w-5xl mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4 text-center">Ticket Report</h2>

        <table class="w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Subject</th>
                    <th class="border p-2">Details</th>
                    <th class="border p-2">Urgency</th>
                    <th class="border p-2">Department</th>
                    <th class="border p-2">Raised By</th>
                    <th class="border p-2">Assigned To</th>
                    <th class="border p-2">Image</th>
                    <th class="border p-2">Created At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                <tr>
                    <td class="border p-2">{{ $ticket->id }}</td>
                    <td class="border p-2">{{ $ticket->sub }}</td>
                    <td class="border p-2">{{ $ticket->details }}</td>
                    <td class="border p-2">{{ $ticket->urgency }}</td>
                    <td class="border p-2">{{ $ticket->dep }}</td>
                    <td class="border p-2">{{ $ticket->fname }}</td>
                    <td class="border p-2">{{ $ticket->aname }}</td>
                    <td class="border p-2">
                        @if ($ticket->image)
                            <img src="{{ asset('storage/' . $ticket->image) }}" alt="Ticket Image" class="w-16 h-16 object-cover">
                        @else
                            No Image
                        @endif
                    </td>
                    <td class="border p-2">{{ $ticket->created_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-navbar>
