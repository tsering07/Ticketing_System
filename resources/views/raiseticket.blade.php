<x-navbar>
    <div>
        <h1 class="text-center text-2xl font-bold">Raise a New Ticket</h1>

        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data" class="max-w-md mx-auto p-4 bg-white rounded-lg shadow-md">
            @csrf

            <label for="sub">Subject:</label>
            <input type="text" id="sub" name="sub" class="w-full border mb-2 p-2 rounded"><br>

            <label for="details">Details:</label>
            <textarea name="details" rows="1" class="w-full border mb-2 p-2 rounded"></textarea><br>

            <label for="urgency">Urgency:</label>
            <select id="urgency" name="urgency" class="w-full border mb-2 p-2 rounded">
                <option value="High">High</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select><br>

            <label for="dep">Department:</label>
            <input type="text" name="dep" class="w-full border mb-2 p-2 rounded"><br>

            <label for="fname">Your Name:</label>
            <input type="text" name="fname" class="w-full border mb-2 p-2 rounded"><br>

            <label for="aname">Assigned To:</label>
            <input type="text" name="aname" class="w-full border mb-2 p-2 rounded"><br>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" class="w-full mb-2"><br>

            <input type="submit" value="Submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
        </form>
    </div>
</x-navbar>
