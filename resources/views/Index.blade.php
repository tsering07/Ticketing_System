<x-navbar>
    <div class=" shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Sr No</th>
                <th scope="col" class="px-6 py-3">Subject</th>
                <th scope="col" class="px-6 py-3">Details</th>
                <th scope="col" class="px-6 py-3">Category</th>
                <th scope="col" class="px-6 py-3">Department</th>
                <th scope="col" class="px-6 py-3">Assigned by</th>
                <th scope="col" class="px-6 py-3">Assigned to</th>
                <th scope="col" class="px-6 py-3">Status</th>
                {{-- <th scope="col" class="px-6 py-3">Show</th> --}}
                <th scope="col" class="px-6 py-3">Edit</th>
                <th scope="col" class="px-6 py-3">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $index => $ticket)
            <tr onclick="window.location='{{route('ticket.show', $ticket->id)}}'" 
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $index + 1 }}
                </td>
                <td class="px-6 py-4">{{ $ticket->sub }}</td>
                <td class="px-6 py-4">{{ $ticket->details }}</td>
                <td class="px-6 py-4">{{ $ticket->urgency }}</td>
                <td class="px-6 py-4">{{ $ticket->dep }}</td>
                <td class="px-6 py-4">{{ $ticket->fname }}</td>
                <td class="px-6 py-4">{{ $ticket->aname }}</td>
                <td class="px-6 py-4">{{ $ticket->status ?? 'Pending' }}</td>
                {{-- <td><a href="{{ route('ticket.show', $ticket->id) }}" class="btn btn-sm btn-info px-6 py-4">Show</a></td> --}}
                <td> <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn btn-sm btn-primar px-6 py-4y">Edit</a></td>
                <td><form method="POST" action="{{ route('ticket.destroy', $ticket->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger px-6 py-4">Delete</button>
                </form>
                </td>

            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
</x-navbar>


