<x-navbar>
    <div class="max-w-4xl mx-auto p-6 space-y-6">
        {{-- Ticket Info --}}
        <div class="bg-white p-6 rounded shadow">
            <h1 class="text-2xl font-semibold mb-4">Ticket Details</h1>
            <div class="space-y-2 text-gray-700">
                <p><strong>Subject:</strong> {{ $ticket->sub }}</p>
                <p><strong>Details:</strong> {{ $ticket->details }}</p>
                <p><strong>Urgency:</strong> {{ $ticket->urgency }}</p>
                <p><strong>Department:</strong> {{ $ticket->dep }}</p>
                <p><strong>Assigned By:</strong> {{ $ticket->fname }}</p>
                <p><strong>Assigned To:</strong> {{ $ticket->aname }}</p>
                <p><strong>Status:</strong> {{ $ticket->status ?? 'Pending' }}</p>
            </div>
            <div class="mt-4 space-x-2">
                <a href="{{ route('ticket.edit', $ticket->id) }}" class="bg-gray-700 text-white px-4 py-2 rounded">Edit</a>
                <a href="{{ route('index') }}" class="bg-gray-700 text-white px-4 py-2 rounded">Back</a>
            </div>
        </div>

        {{-- Remarks Section --}}
        <div class="bg-white p-6 rounded shadow">
            <h2 class="text-xl font-semibold mb-4">Remarks</h2>

            {{-- List all remarks --}}
            @forelse ($ticket->remarks()->latest()->get() as $remark)
                <div class="mb-4 p-4 bg-gray-100 rounded">
                    <p class="text-gray-800">{{ $remark->text }}</p>
                    <div class="text-sm text-gray-600 mt-2">
                        <p><strong>By:</strong> {{ $remark->user->name ?? 'Unknown' }}</p>
                        <p><strong>On:</strong> {{ $remark->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
            @empty
                <p class="text-gray-500">No remarks yet.</p>
            @endforelse

            {{-- Add New Remark --}}
            <form method="POST" action="{{ route('ticket.remarks.store', $ticket->id) }}" class="mt-6">
                @csrf
                <label for="remark" class="block mb-2 font-medium">Add New Remark</label>
                <textarea name="text" id="remark" rows="4"
                    class="w-full border border-gray-300 rounded p-2" placeholder="Enter your remark..."></textarea>
                <button type="submit" class="mt-3 bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Add Remark
                </button>
            </form>
        </div>
    </div>
</x-navbar>
