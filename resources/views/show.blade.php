<x-navbar>
    <div class="max-w-4xl mx-auto mt-10 p-6">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">Ticket Details</h1>
        <div class="space-y-4">
            <p class="text-gray-700"><strong>Subject:</strong> <span class="text-gray-900">{{ $ticket->sub }}</span></p>
            <p class="text-gray-700"><strong>Details:</strong> <span class="text-gray-900">{{ $ticket->details }}</span></p>
            <p class="text-gray-700"><strong>Urgency:</strong> <span class="text-gray-900">{{ $ticket->urgency }}</span></p>
            <p class="text-gray-700"><strong>Department:</strong> <span class="text-gray-900">{{ $ticket->dep }}</span></p>
            <p class="text-gray-700"><strong>Assigned By:</strong> <span class="text-gray-900">{{ $ticket->fname }}</span></p>
            <p class="text-gray-700"><strong>Assigned To:</strong> <span class="text-gray-900">{{ $ticket->aname }}</span></p>
            <p class="text-gray-700"><strong>Status:</strong> <span class="text-gray-900">{{ $ticket->status ?? 'Pending' }}</span></p>
        </div>
        <div class="mt-6">
            <a href="{{ route('index') }}" class="bg-gray-700 text-white px-4 py-2 rounded">Back</a>
        </div>
    </div>
</x-navbar>
