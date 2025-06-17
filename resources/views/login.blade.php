<x-navbar>
<div>
    <div class="h-screen flex items-center justify-center bg-gray-100">

        <form action="#" method="POST" class="bg-white p-8 rounded shadow-md w-96">
            <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

            <label class="mb-2 font-semibold">Login As</label>
            <select name="role" class="w-full mb-4 px-3 py-2 border rounded">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
    
            <label class="mb-2 font-semibold">Email</label>
            <input type="email" name="email" required class="w-full mb-4 px-3 py-2 border rounded">

            <label class="mb-2 font-semibold">Password</label>
            <input type="password" name="password" required class="w-full mb-6 px-3 py-2 border rounded">

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Log In</button>
        </form>
</div>
</x-navbar>
