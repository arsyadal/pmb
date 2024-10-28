<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mahasiswa Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- DaisyUI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center">
            <div class="text-xl font-bold">Mahasiswa Dashboard</div>
            <div class="flex space-x-4 items-center">
                <a href="#" class="text-gray-700 hover:text-gray-900">Home</a>
                     
                @if(Auth::user()->profile_picture)
                    <img src="{{ asset('storage/images/' . Auth::user()->profile_picture) }}" alt="Profile Picture" class="w-10 h-10 rounded-full">
                @else
                    <img src="{{ asset('default-profile.png') }}" alt="Default Profile Picture" class="w-10 h-10 rounded-full">
                @endif

                <a href="{{ route('profile.edit') }}" class="text-gray-700 hover:text-gray-900">Profile</a>
      
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-error">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>

        <!-- Main Content -->
        <div class="flex-grow container mx-auto px-6 py-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-bold mb-4">Welcome, Mahasiswa!</h2>
                <p class="text-gray-700">This is your mahasiswa dashboard where you can view your courses, profile, and more.</p>
                <!-- Add more content here -->
            </div>
        </div>
    </div>
</body>
</html>