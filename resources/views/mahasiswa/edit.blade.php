<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- DaisyUI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center">Edit Profile</h2>
            
            <!-- Success Alert -->
            @if(Session::has('success'))
                <div class="alert alert-success">
                    <div class="flex-1">
                        <label>{{ Session::get('success') }}</label>
                    </div>
                </div>
            @endif

            <!-- Error Alert -->
            @if($errors->any())
                <div class="alert alert-error">
                    <div class="flex-1">
                        <label>{{ $errors->first() }}</label>
                    </div>
                </div>
            @endif

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                @method('PUT')
                <div class="form-control">
                    <label class="label" for="name">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" id="name" name="name" class="input input-bordered w-full" value="{{ $user->name }}" required>
                </div>
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" id="email" name="email" class="input input-bordered w-full" value="{{ $user->email }}" required>
                </div>
                <div class="form-control">
                    <label class="label" for="profile_picture">
                        <span class="label-text">Profile Picture</span>
                    </label>
                    <input type="file" id="profile_picture" name="profile_picture" class="input input-bordered w-full">
                    @if($user->profile_picture)
                        <img src="{{ Storage::url($user->profile_picture) }}" alt="Profile Picture" class="mt-4 w-32 h-32 rounded-full">
                    @endif
                </div>
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary w-full">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>