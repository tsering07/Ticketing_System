<x-navbar>
    <div class="flex w-2/4 mx-auto p-4 gap-4">
        <div class="space-y-4">
            <h1 class="text-2xl font-semibold mb-4 text-gray-800">Ticket Details</h1>
            <p class="text-gray-700"><strong>Subject:</strong> <span class="text-gray-900">{{ $ticket->sub }}</span></p>
            <p class="text-gray-700"><strong>Details:</strong> <span class="text-gray-900">{{ $ticket->details }}</span></p>
            <p class="text-gray-700"><strong>Urgency:</strong> <span class="text-gray-900">{{ $ticket->urgency }}</span></p>
            <p class="text-gray-700"><strong>Department:</strong> <span class="text-gray-900">{{ $ticket->dep }}</span></p>
            <p class="text-gray-700"><strong>Assigned By:</strong> <span class="text-gray-900">{{ $ticket->fname }}</span></p>
            <p class="text-gray-700"><strong>Assigned To:</strong> <span class="text-gray-900">{{ $ticket->aname }}</span></p>

            <div class="flex items-center text-gray-700">
            <strong>Status:</strong>
            <span class="text-gray-900 ml-1">{{ $ticket->status ?? 'Pending' }}</span>

            {{-- <form method="POST" action="{{ route('ticket.update', $ticket->id) }}" class="ml-4">
                @csrf
                @method('PATCH')
                <select name="status" onchange="this.form.submit()" class="border-gray-300 rounded px-2 py-1">
                    @foreach(['pending', 'in_process', 'resolved'] as $status)
                        <option value="{{ $status }}" {{ $ticket->status === $status ? 'selected' : '' }}>
                            {{ ucfirst(str_replace('_', ' ', $status)) }}
                        </option>
                    @endforeach
                </select>
            </form> --}}
            </div>
            
            <p class="text-gray-700"><strong>Raised on:</strong> <span class="text-gray-900">{{$ticket->created_at->format('Y-m-d')}}</span></p>
            
            <br>
            <a href="{{ route('ticket.edit', $ticket->id) }}"  class="bg-gray-700 text-white px-4 py-2 rounded">Edit</a>
            <a href="{{ route('index') }}" class="bg-gray-700 text-white px-4 py-2 rounded">Back</a>
        </div>
        

        <div class="max-w-2xl mx-auto mt-2 space-y-6">
        <h2 class="text-2xl font-bold">Ticket {{ $ticket->id }}</h2>


        {{-- Display remarks --}}
        <div>
            <h3 class="text-xl font-semibold mt-2 border-b pb-2">Remarks</h3>
            @forelse($ticket->remarks as $remark)
                <div class="bg-gray-100 p-4 rounded-lg shadow my-2">
                    <p>{{ $remark->remarks }}</p>
                    <small class="text-gray-500">Remark on {{ $remark->created_at->format('d M Y, h:i A') }}</small>
                    
                    <div class="mt-2 flex gap-2">
                        <a href="{{ route('remarks.edit', $remark->id) }}" class="text-blue-600 hover:underline">Edit</a>
                        <form action="{{ route('remarks.destroy', $remark->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No remarks yet.</p>
            @endforelse
        </div>

        {{-- Add a remark --}}
        <div class="mt-6">
            <form action="{{ route('remarks.store', $ticket->id) }}" method="POST">
                @csrf
                <textarea name="remarks" rows="3" class="w-full border border-gray-300 rounded p-2" placeholder="Write a remark...">{{ old('remark') }}</textarea>
                @error('remarks')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
                <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" >Add Remark</button>
            </form>
        </div>
    </div>

    </div>
    
</x-navbar>

