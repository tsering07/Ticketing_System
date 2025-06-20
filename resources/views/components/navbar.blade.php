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
                <a href="{{ route('Search Ticket')}}" class="hover:bg-gray-800 py-2 transition">Search Ticket</a>
                {{-- <a href="{{ route('Report')}}" class="hover:bg-gray-800 py-2 transition">Report</a> --}}
                <a href="{{ route('raise ticket') }}" class="hover:bg-gray-800 py-2 transition">Raise Ticket</a>
                <a href="{{ route('Admin') }}" class="hover:bg-gray-800 py-2 transition">Admin</a>
            </div>
        </nav>
    </div>
</header><br>

    {{$slot}}

</body>
</html>
