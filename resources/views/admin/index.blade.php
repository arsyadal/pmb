<!-- resources/views/admin/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
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
                    <div class="text-xl font-bold">Admin Dashboard</div>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-700 hover:text-gray-900">Home</a>
                        <a href="#" class="text-gray-700 hover:text-gray-900">Users</a>
                        <a href="#" class="text-gray-700 hover:text-gray-900">Settings</a>
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
                <h2 class="text-2xl font-bold mb-4">Welcome, Admin!</h2>
                <p class="text-gray-700 mb-4">This is your admin dashboard where you can manage users, settings, and more.</p>
                
                <!-- Success Alert -->
                @if(Session::has('success'))
                    <div class="alert alert-success mb-4">
                        <div class="flex-1">
                            <label>{{ Session::get('success') }}</label>
                        </div>
                    </div>
                @endif

                <a href="{{ route('admin.create') }}" class="btn btn-primary mb-4">Create User</a>

                <!-- Users Table -->
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Alamat KTP</th>
                                <th>Alamat Saat Ini</th>
                                <th>Kecamatan</th>
                                <th>Kabupaten</th>
                                <th>Provinsi</th>
                                <th>Nomor Telepon</th>
                                <th>Nomor HP</th>
                                <th>Kewarganegaraan</th>
                                <th>Tanggal Lahir</th>
                                <th>Tempat Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Status Menikah</th>
                                <th>Agama</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->name }}</td>
                                    <td>{{ $user->alamat_ktp }}</td>
                                    <td>{{ $user->alamat_saat_ini }}</td>
                                    <td>{{ $user->kecamatan }}</td>
                                    <td>{{ $user->kabupaten }}</td>
                                    <td>{{ $user->provinsi }}</td>
                                    <td>{{ $user->nomor_telepon }}</td>
                                    <td>{{ $user->nomor_hp }}</td>
                                    <td>{{ $user->kewarganegaraan }}</td>
                                    <td>{{ $user->tanggal_lahir }}</td>
                                    <td>{{ $user->tempat_lahir }}</td>
                                    <td>{{ $user->jenis_kelamin }}</td>
                                    <td>{{ $user->status_menikah }}</td>
                                    <td>{{ $user->agama }}</td>
                                    <td>
                                        @if($user->role->name == 'guest')
                                            <form action="{{ route('admin.verify', $user->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-success">Verify</button>
                                            </form>
                                        @endif
                                        <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('admin.delete', $user->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-error">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>