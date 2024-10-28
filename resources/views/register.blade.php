<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- DaisyUI CDN -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.14.0/dist/full.css" rel="stylesheet">
    <!-- Include Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-100">
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-center">Buat Akun</h2>
            
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

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div class="form-control">
                    <label class="label" for="name">
                        <span class="label-text">Name</span>
                    </label>
                    <input type="text" id="name" name="name" class="input input-bordered w-full" value="{{ old('name') }}" required>
                </div>
                <div class="form-control">
                    <label class="label" for="email">
                        <span class="label-text">Email</span>
                    </label>
                    <input type="email" id="email" name="email" class="input input-bordered w-full" value="{{ old('email') }}" required>
                </div>
                <div class="form-control">
                    <label class="label" for="password">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" id="password" name="password" class="input input-bordered w-full" required>
                </div>
                <div class="form-control">
                    <label class="label" for="password_confirmation">
                        <span class="label-text">Confirm Password</span>
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="input input-bordered w-full" required>
                </div>
                <input type="hidden" name="role_id" value="3"> <!-- Assuming 3 is the ID for 'guest' role -->
           
            
                <div class="form-control mt-6">
                    <button type="submit" class="btn btn-primary w-full">Daftar</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>


