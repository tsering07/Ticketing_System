<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Ticketing System</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-orange-400 text-white shadow-md sticky top-0 z-50 w-full">
        <div class="max-w-screen-xl mx-auto px-4">
            <nav class="flex justify-between items-center text-lg font-medium py-4">
                <div class="grid grid-cols-5 gap-2 w-full text-center">
                    <a href="#" class="hover:bg-gray-800 hover:text-white py-2 px-4 rounded transition duration-200">Dashboard</a>
                    <a href="{{ route('index') }}" class="hover:bg-gray-800 hover:text-white py-2 px-4 rounded transition duration-200">Home</a>
                    @auth
                    <a href="{{ route('Search Ticket')}}" class="hover:bg-gray-800 hover:text-white py-2 px-4 rounded transition duration-200">Search Ticket</a>
                    <a href="{{ route('raise ticket') }}" class="hover:bg-gray-800 hover:text-white py-2 px-4 rounded transition duration-200">Raise Ticket</a>
                    @endauth

                    @guest
                    <a href="{{ route('login') }}" class="hover:bg-gray-800 hover:text-white py-2 px-4 rounded transition duration-200">Login</a>
                    <a href="{{ route('register') }}" class="hover:bg-gray-800 hover:text-white py-2 px-4 rounded transition duration-200">Register</a>
                    @endguest

                    @if(auth()->check() && auth()->user()->role->name === 'Superadmin')
                    <a href="{{ route('Users') }}" class="hover:bg-gray-800 hover:text-white py-2 px-4 rounded transition duration-200">Users</a>
                    @endif

                    @auth
                    <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="hover:bg-red-600 hover:text-white py-2 px-4 rounded transition duration-200">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    @endauth
                </div>
            </nav>
        </div>
</header><br>

    {{$slot}}

</body>
</html>
