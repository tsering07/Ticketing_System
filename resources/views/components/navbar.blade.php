<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Ticketing System</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-gray-700 text-white shadow-md sticky top-0 z-50 w-full">
    <div class="max-w-screen-xl mx-auto px-4">
        <nav class="flex justify-between items-center text-lg font-medium py-4">
            <div class="grid grid-cols-5 gap-0 w-full text-center">
                <a href="{{ route('index') }}" class="hover:bg-gray-800 py-2 transition">Home</a>
                @auth
                <a href="{{ route('Search Ticket')}}" class="hover:bg-gray-800 py-2 transition">Search Ticket</a>
                <a href="{{ route('raise ticket') }}" class="hover:bg-gray-800 py-2 transition">Raise Ticket</a>
                @endauth
                {{-- <a href="{{ route('Report') }}" class="hover:bg-gray-800 py-2 transition">Report</a> --}}


                @guest
                <a href="{{ route('login') }}" class="text-white hover:bg-gray-800">Login</a>
                <a href="{{ route('register') }}" class="text-white hover:bg-gray-800">Register</a>
                @endguest

                @auth
                {{-- <span class="text-whit mr-2">Welcome, {{ Auth::user()->name }}</span> --}}
                <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="text-white hover:bg-gray-800">Logout</a>
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
