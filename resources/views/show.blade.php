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
            <p class="text-gray-700"><strong>Status:</strong> <span class="text-gray-900">{{ $ticket->status ?? 'Pending' }}</span></p>
        {{-- </div>
        <div class="mt-6"> --}}<br>
            <a href="{{ route('ticket.edit', $ticket->id) }}"  class="bg-gray-700 text-white px-4 py-2 rounded">Edit</a>
            <a href="{{ route('index') }}" class="bg-gray-700 text-white px-4 py-2 rounded">Back</a>
        </div>
         @if (empty($ticket->remarks))
        <form method="POST" action="{{ route('ticket.update', $ticket->id) }}">
            @csrf
            @method('PUT')
            <div class="w-2/4 bg-gray-100 p-4 mx-20 rounded-lg shadow-md">
                <label for="remarks" class="block mb-2 font-medium">Add Remarks</label>
                <textarea name="remarks" id="remarks" rows="10"
                        class="w-full border border-gray-300 rounded p-2"></textarea>
                <button type="submit" class="mt-3 bg-gray-700 text-white px-4 py-2 rounded">
                    Submit Remarks
                </button>
            </div>
        </form>
        @else
            {{-- Display remarks as read-only --}}
            <div class="w-1/3 bg-gray-100 p-4 rounded-lg shadow-md">
                <label class="block mb-2 font-medium">Remarks</label>
                <textarea rows="10" readonly class="w-full border border-gray-300 rounded p-2">{{ $ticket->remarks }}</textarea>
                <p class="text-gray-700"><strong>Remarks By:</strong> <span class="text-gray-900">{{ $ticket->fname }}</span></p>
                <p class="text-gray-700"><strong>Created at</strong> <span class="text-gray-900">{{$ticket->created_at->format('Y-m-d')}}</span></p>
                <button type="submit" class="mt-3 bg-gray-700 text-white px-4 py-2 rounded">Add
            </div>
        @endif
    </div>
</x-navbar>
