<x-navbar>
    <div class="flex h-screen">
        <div class="w-1/4 bg-gray-400 text-white p-4">
            <h2 class="text-xl font-bold mb-6">Admin</h2>
            <ul class="space-y-4">
                <li><a href="#" class="hover:underline">Home</a></li>
                <li><a href="#" class="hover:underline">Profile</a></li>
                <li><a href="#" class="hover:underline">Settings</a></li>
                <li><a href="#" class="hover:underline">Logout</a></li>
            </ul>
        </div>
            
        {{-- table --}}
        <div class="w-3/4 bg-white p-6 rounded shadow">
            <h1 class="text-2xl font-bold text-center my-2">Hello Admin Welcome.....</h1>
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
    </div>
</body>
</html>

</x-navbar>

