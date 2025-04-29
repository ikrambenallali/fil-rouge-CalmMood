<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <script src="https://cdn.tailwindcss.com"></script>

    <title>login</title>
</head>

<body class="bg-[#FBF4FA] min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md px-4 py-8 sm:px-6 md:px-8">
        <h1 class="text-2xl sm:text-3xl font-bold text-[#C447AF] text-center mb-8">Login</h1>

        <form action="{{ route('login') }}" method="POST" class="w-full">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-lg font-bold mb-2">Email</label>
                <input type="email" name="email" class="border border-[#C447AF] p-2 w-full h-10 bg-[#EAEAEA] rounded" 
                    placeholder="Tape ton email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                <div class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <div class="mb-4">
                <label for="password" class="block text-lg font-bold mb-2">Password</label>
                <input type="password" name="password" class="border border-[#C447AF] p-2 w-full h-10 bg-[#EAEAEA] rounded" 
                    placeholder="Tape ton mot de passe" required>
                @if ($errors->has('password'))
                <div class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</div>
                @endif
            </div>
            
            <div class="text-center mb-6">
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-[#C447AF] font-bold">SignUp</a></p>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="bg-[#DD6ECA] text-[#FBF4FA] px-6 py-2 font-bold rounded-md hover:bg-[#C447AF] transition-colors">Login</button>
            </div>
        </form>
    </div>
</body>

</html>