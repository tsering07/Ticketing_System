<x-navbar>
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded shadow">
        @if(isset($remark))
            <h2 class="text-xl font-bold mt-10 mb-4">Edit Remark</h2>

            <form method="POST" action="{{ route('remarks.update', $remark->id) }}">
                @csrf
                @method('PUT')

                <textarea name="remarks" rows="4" class="w-full border p-2 rounded">{{ old('remarks', $remark->remarks) }}</textarea>
                @error('remarks')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror

                <div class="mt-4 flex gap-3">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Remark</button>
                    <a href="{{ route('ticket.show', $remark->ticket_id) }}" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</a>
                </div>
            </form>
        @endif

    </div>
</x-navbar>
