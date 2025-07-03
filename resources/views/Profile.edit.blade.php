<x-navbar>

@section('content')
    <div class="container">
        <h2>User Profile</h2>

        @if (session('status') === 'profile-updated')
            <div style="color: green;">Profile updated successfully.</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div>
                <label>Name:</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}">
                @error('name') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}">
                @error('email') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <button type="submit">Update Profile</button>
        </form>

        <hr>

        <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account?');">
            @csrf
            @method('DELETE')

            <div>
                <label for="password">Confirm Password:</label>
                <input type="password" name="password" required>
                @error('password', 'userDeletion') <div style="color: red;">{{ $message }}</div> @enderror
            </div>

            <button type="submit" style="color: red;">Delete Account</button>
        </form>
    </div>
@endsection

</x-navbar>