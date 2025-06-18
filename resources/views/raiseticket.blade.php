<x-navbar>
   <div>     
    <form method="POST" 
        action="{{ isset($ticket) ? route('ticket.update', $ticket) : route('store') }}" 
        enctype="multipart/form-data" 
        class="max-w-md mx-auto p-4 bg-white rounded-lg shadow-md">
        @csrf
        @if(isset($ticket))
            @method('PUT')
        @endif

        <label for="sub">Subject:</label>
        <input type="text" id="sub" name="sub" value="{{ old('sub', $ticket->sub ?? '') }}" class="w-full border mb-2 p-2 rounded"><br>

        <label for="details">Details:</label>
        <textarea name="details" rows="1" class="w-full border mb-2 p-2 rounded">{{ old('details', $ticket->details ?? '') }}</textarea><br>

        <label for="urgency">Urgency:</label>
        <select id="urgency" name="urgency" class="w-full border mb-2 p-2 rounded">
            @foreach(['High', 'Medium', 'Low'] as $level)
                <option value="{{ $level }}" {{ (old('urgency', $ticket->urgency ?? '') == $level) ? 'selected' : '' }}>{{ $level }}</option>
            @endforeach
        </select><br>

        <label for="dep">Department:</label>
        <input type="text" name="dep" value="{{ old('dep', $ticket->dep ?? '') }}" class="w-full border mb-2 p-2 rounded"><br>

        <label for="fname">Your Name:</label>
        <input type="text" name="fname" value="{{ old('fname', $ticket->fname ?? '') }}" class="w-full border mb-2 p-2 rounded"><br>

        <label for="aname">Assigned To:</label>
        <input type="text" name="aname" value="{{ old('aname', $ticket->aname ?? '') }}" class="w-full border mb-2 p-2 rounded"><br>

        <label for="image">Upload Image:</label>
        <input type="file" id="image" name="image" class="w-full mb-2"><br>

        <input type="submit" value="{{ isset($ticket) ? 'Update Ticket' : 'Submit Ticket' }}" 
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
    </form>
   </div>
</x-navbar>