<x-navbar>
<div class="container mx-auto px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">All Users</h2>

    <div>
        <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-200">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 border-b">Srno.</th>
                    <th class="px-6 py-3 border-b">Name</th>
                    <th class="px-6 py-3 border-b">Email</th>
                    <th class="px-6 py-3 border-b">Role</th>
                    <th class="px-6 py-3 border-b">Created At</th>
                    <th class="px-6 py-3 border-b">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4">{{ $user->role->value ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                        <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger px-6 py-4">Delete</button>
                        </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="max-w-md px-4 py-6">
    <h2 class="text-2xl font-semibold mb-4">Create New User</h2>

    <form action="{{ route('store.user') }}" method="POST" class="space-y-4" >
        @csrf
        <div>
            <label>Name</label>
            <input type="text" name="name" required class="border p-2 w-full">
        </div>
        <div>
            <label>Email</label>
            <input type="email" name="email" required class="border p-2 w-full">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" required class="border p-2 w-full">
        </div>
        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required class="border p-2 w-full">
        </div>
        <div>
            <label>Role</label>
            <select name="role" class="border p-2 w-full" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <option value="superadmin">SuperAdmin</option>
            </select>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create User</button>
    </form>
</div>
</x-navbar>
