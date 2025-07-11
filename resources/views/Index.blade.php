<x-navbar>
        <form action="{{ route('index') }}" method="GET" class="max-w-md mx-auto my-1">
        <div class="relative">
            <input type="search" name="search" value="{{ request('search') }}"
                class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg"
                placeholder="Search by Subject or Department..." />
            <button type="submit"
                class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-4 py-2">
                Search
            </button>
        </div>
    </form>
    
    <div class="max-w-7xl mx-auto flex justify-end mb-4">
            <form action="{{ route('index') }}" method="GET" class="flex items-center gap-2">
                <!-- Preserve search input when filtering -->
                @if(request('search'))
                    <input type="hidden" name="search" value="{{ request('search') }}">
                @endif
                <label for="urgency" class="text-sm font-medium text-gray-700">Category:</label>
                <select name="urgency" id="urgency" onchange="this.form.submit()"
                    class="p-2 border border-gray-300 rounded text-sm">
                    <option value="" {{ request('urgency') == '' ? 'selected' : '' }}>All</option>
                    <option value="Low" {{ request('urgency') == 'Low' ? 'selected' : '' }}>Low</option>
                    <option value="Medium" {{ request('urgency') == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="High" {{ request('urgency') == 'High' ? 'selected' : '' }}>High</option>
                </select>

                <label for="aname" class="text-sm font-medium text-gray-700">Assigned to:</label>
                <select name="aname" id="aname" onchange="this.form.submit()"
                    class="p-2 border border-gray-300 rounded text-sm">
                    <option value="">All</option>
                    @foreach($assignedNames as $name)
                        <option value="{{ $name }}" {{ request('aname') == $name ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </form>
    </div><br>

    <div class="shadow-md sm:rounded-lg">
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
                @auth
                <th scope="col" class="px-6 py-3">deadline</th>@endauth
                @if(auth()->check() && in_array(auth()->user()->role->name, ['Superadmin', 'Admin']))
                <th scope="col" class="px-6 py-3">IP address</th>
                <th scope="col" class="px-6 py-3">Edit</th>
                <th scope="col" class="px-6 py-3">Delete</th>
                @endif
                
            </tr>
        </thead>
        <tbody>

            @foreach($tickets as $index => $ticket)
            <tr onclick="window.location='{{route('ticket.show', $ticket->id)}}'" 
                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" style="cursor: pointer;">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $index + 1 }}
                </td> 
                <td class="px-6 py-4">{{ $ticket->sub }} </td>
                <td class="px-6 py-4">{{ $ticket->details }}</td>
                <td class="px-6 py-4">{{ $ticket->urgency }}</td>
                <td class="px-6 py-4">{{ $ticket->dep }}</td>
                <td class="px-6 py-4">{{ $ticket->fname }}</td>
                <td class="px-6 py-4">{{ $ticket->aname }}</td>
                <td class="px-6 py-4">{{ $ticket->status ?? 'Pending' }}</td>
                @auth
                <td class="px-6 py-4 {{ \Carbon\Carbon::parse($ticket->deadline)->isPast() ? 'text-red-600 font-semibold' : '' }}">
                {{ \Carbon\Carbon::parse($ticket->deadline)->format('d M Y') }}</td>@endauth
                @if(auth()->check() && in_array(auth()->user()->role->name, ['Superadmin', 'Admin']))
                <td class="px-6 py-4">{{ $ticket->ip_address }}</td>
                {{--<td onclick="event.stopPropagation()" class="px-6 py-4"></td>--}}
                <td> <a href="{{ route('ticket.edit', $ticket->id) }}" class="btn px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm rounded transition duration-200">Edit</a></td>
                <td><form method="POST" action="{{ route('ticket.destroy', $ticket->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm rounded transition duration-200">Delete</button>
                </form>
                </td>@endif

            </tr>
            @endforeach
            
        </tbody>
    </table>
    <br> {{$tickets->links()}}
</div>
</x-navbar>


