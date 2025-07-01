<x-navbar>
    <div class="flex max-w-5xl mx-auto p-4 gap-4"> 
        <!-- Form Section -->
        <form method="POST" 
              action="{{ isset($ticket) ? route('ticket.update', $ticket) : route('store') }}" 
              enctype="multipart/form-data" 
              class="w-2/3 bg-white p-4 rounded-lg shadow-md">
              
            @csrf
            @if(isset($ticket))
                @method('PUT')
            @endif

            <label for="sub">Subject:</label>
            <input type="text" id="sub" name="sub" value="{{ old('sub', $ticket->sub ?? '') }}" class="w-full border mb-2 p-2 rounded"><br>

            <label for="details">Details:</label>
            <textarea name="details" rows="5" class="w-full border mb-2 p-2 rounded">{{ old('details', $ticket->details ?? '') }}</textarea><br>

            <label for="urgency">Urgency:</label>
            <select id="urgency" name="urgency" class="w-full border mb-2 p-2 rounded">
                <option value="">--Select Urgency--</option>
                @foreach(['High', 'Medium', 'Low'] as $level)
                    <option value="{{ $level }}" {{ (old('urgency', $ticket->urgency ?? '') == $level) ? 'selected' : '' }}>{{ $level }}</option>
                @endforeach
            </select><br>

            {{-- <label for="dep">Department:</label>
            <input type="text" name="dep" value="{{ old('dep', $ticket->dep ?? '') }}" class="w-full border mb-2 p-2 rounded"><br> --}}
            <label for="dep">Department:</label>
            <select id="dep" name="dep" class="w-full border mb-2 p-2 rounded" onchange="updateAssignedTo(this.value)">
            <option value="">-- Select Department --</option>
                @php
                    $departments = [
                        \App\Models\department::DEPARTMENT_HOME,
                        \App\Models\department::DEPARTMENT_EDUCATION,
                        \App\Models\department::DEPARTMENT_INFORMATION,
                        \App\Models\department::DEPARTMENT_HEALTH,
                        \App\Models\department::DEPARTMENT_SECURITY,
                        \App\Models\department::DEPARTMENT_FINANCE,
                        \App\Models\department::DEPARTMENT_JUSTICE,
                    ];

                    $handlers = [];
                    foreach ($departments as $dept) {
                    $handlers[$dept] = \App\Models\department::getHandlerByDepartment($dept);
                    }
                @endphp
                @foreach($departments as $dept)
                    <option value="{{ $dept }}" {{ (old('dep', $ticket->dep ?? '') == $dept) ? 'selected' : '' }}> {{ $dept }}</option>
                @endforeach
            </select>

            <label for="fname">Your Name:</label>
            <input type="text" name="fname" value="{{ old('fname', $ticket->fname ?? '') }}" class="w-full border mb-2 p-2 rounded"><br>

            <label for="aname">Assigned To:</label>
            {{-- <input type="text" name="aname" value="{{ old('aname', default: $ticket->aname ?? '') }}" class="w-full border mb-2 p-2 rounded"><br> --}}
            <input type="text" id="aname" name="aname" value="{{ old('aname', $ticket->aname ?? '') }}" class="w-full border mb-2 p-2 rounded" readonly>

            <label for="deadline">Deadline:</label>
            <input type="date" name="deadline" value="{{ old('deadline', isset($ticket) ? $ticket->deadline : '') }} "class="w-full border mb-2 p-2 rounded"><br>
            
            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" class="w-full mb-2"><br>
            <input type="submit" value="{{ isset($ticket) ? 'Update Ticket' : 'Submit Ticket' }}" class="bg-blue-600 text-white px-4 py-2 rounded">
            
        </form>

        <script>
        // Pass Laravel PHP data to JavaScript
            const handlers = @json($handlers);

            function updateAssignedTo(department) {
                document.getElementById('aname').value = handlers[department] || '';
            }

            // Optional: Run once on page load (for edit form)
            document.addEventListener("DOMContentLoaded", () => {
                const selectedDep = document.getElementById('dep').value;
                if (selectedDep) {
                    updateAssignedTo(selectedDep);
                }
            });
        </script>
    </div>
</x-navbar> 