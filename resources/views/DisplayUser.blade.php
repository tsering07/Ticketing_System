<x-navbar>
<div class="container mx-auto px-4 py-6">
    <h2 class="text-3xl font-bold mb-6 text-gray-800">All Users</h2>

    {{-- @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif --}}

    <div class="overflow-x-auto rounded-lg shadow-md">
        <table class="w-full text-sm text-left text-gray-700 bg-white border border-gray-200">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3 border-b">Sr no.</th>
                    <th class="px-6 py-3 border-b">Name</th>
                    <th class="px-6 py-3 border-b">Email</th>
                    <th class="px-6 py-3 border-b">Role</th>
                    <th class="px-6 py-3 border-b">Created At</th>
                    <th class="px-6 py-3 border-b text-center">Edit</th>
                    <th class="px-6 py-3 border-b text-center">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $u)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $index + 1 }}</td>
                        <td class="px-6 py-4">{{ $u->name }}</td>
                        <td class="px-6 py-4">{{ $u->email }}</td>
                        <td class="px-6 py-4 capitalize">{{ $u->role ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $u->created_at->format('Y-m-d') }}</td>
                        <td class="px-6 py-4 text-center">
                            <a href="{{ route('user.edit', $u->id) }}"
                               class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-5 py-2 rounded transition duration-200">
                                Edit
                            </a>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <form method="POST" action="{{ route('user.destroy', $u->id) }}">
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
                        <td colspan="7" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Create or Edit Form --}}
<div class="max-w-md mx-auto bg-white p-6 mt-10 rounded-lg shadow-lg">
    <h2 class="text-2xl font-semibold mb-4 text-gray-800">
        {{ isset($user) ? 'Edit User' : 'Create New User' }}
    </h2>

    <form action="{{ isset($user) ? route('user.update', $user->id) : route('store.user') }}" method="POST" class="space-y-4">
        @csrf
        @if(isset($user))
            @method('PUT')
        @endif

        <div>
            <label class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}" required
                   class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}" required
                   class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" {{ isset($user) ? '' : 'required' }}
                   class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" {{ isset($user) ? '' : 'required' }}
                   class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" class="mt-1 border rounded-md p-2 w-full focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                <option value="user" {{ old('role', $user->role ?? '') === 'user' ? 'selected' : '' }}>User</option>
                <option value="admin" {{ old('role', $user->role ?? '') === 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
        </div>

        <button type="submit" class="w-full {{ isset($user) ? 'bg-green-600 hover:bg-green-700' : 'bg-blue-600 hover:bg-blue-700' }} text-white font-semibold py-2 rounded transition duration-200">
            {{ isset($user) ? 'Update User' : 'Create User' }}
        </button>
    </form>
</div>
</x-navbar>

