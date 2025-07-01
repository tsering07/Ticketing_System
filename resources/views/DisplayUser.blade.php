<x-navbar>
<div class="container mx-auto px-4 py-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">All Users</h2>

    <div class="overflow-x-auto rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-200">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 border-b">Sr no.</th>
                    <th class="px-6 py-3 border-b">Name</th>
                    <th class="px-6 py-3 border-b">Email</th>
                    <th class="px-6 py-3 border-b">Role</th>
                    <th class="px-6 py-3 border-b">Created At</th>
                    <th class="px-6 py-3 border-b text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4 capitalize">{{ $user->role->value ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $user->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 text-center">
                            <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded transition duration-200">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<div class="max-w-md mx-auto bg-white p-6 mt-10 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">Create New User</h2>

    <form action="{{ route('store.user') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" required class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" required class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" required class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 rounded transition duration-200">
            Create User
        </button>
    </form>
</div>
</x-navbar>

