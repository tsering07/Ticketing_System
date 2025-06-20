<x-navbar>
    <form action="{{ route('Search Ticket') }}" method="GET" class="max-w-md mx-auto my-6">
        <div class="relative">
            <input type="search" name="search" value="{{ request('search') }}"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg"
                placeholder="Search by ID or Subject..." />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2">
                Search
            </button>
        </div>
    </form>

    <!-- it will run if the search is done-->
    @if(isset($tickets) && $tickets->isNotEmpty())
    <div class="sm:rounded-lg max-w-7xl mx-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">Sr No</th>
                    <th class="px-6 py-3">Subject</th>
                    <th class="px-6 py-3">Details</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3">Department</th>
                    <th class="px-6 py-3">Assigned by</th>
                    <th class="px-6 py-3">Assigned to</th>
                    <th class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tickets as $index => $ticket)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $index + 1 }}</td>
                    <td class="px-6 py-4">{{ $ticket->sub }}</td>
                    <td class="px-6 py-4">{{ $ticket->details }}</td>
                    <td class="px-6 py-4">{{ $ticket->urgency }}</td>
                    <td class="px-6 py-4">{{ $ticket->dep }}</td>
                    <td class="px-6 py-4">{{ $ticket->fname }}</td>
                    <td class="px-6 py-4">{{ $ticket->aname }}</td>
                    <td class="px-6 py-4">{{ $ticket->status ?? 'Pending' }}</td>
                @endforeach
            </tbody>
        </table>
    </div>
    @elseif(request()->has('search'))
        <p class="text-center text-gray-500 mt-4">No tickets found for your search.</p>
    @endif

</x-navbar>
