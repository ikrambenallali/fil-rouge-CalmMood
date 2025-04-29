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

    <title>SignUp</title>
</head>
<body class="bg-[#FBF4FA] min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-md">
        <h1 class="text-center text-3xl font-bold text-[#C447AF] mb-8">SignUp</h1>
        
        <!-- Erreurs -->
        @if ($errors->any())
            <div class="bg-red-200 p-4 mb-4 text-red-600 rounded-md">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Message de succès -->
        @if (session('success'))
            <div class="bg-green-200 p-4 mb-4 text-green-600 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="">
            @csrf
            <div class="flex flex-col">
                <label for="name" class="text-lg font-bold mb-1">Name</label>
                <input type="text" name="name" class="border border-[#C447AF] p-2 h-10 bg-[#EAEAEA] rounded-md" placeholder="Type your name">
            </div>

            <div class="flex flex-col">
                <label for="email" class="text-lg font-bold mb-1">Email</label>
                <input type="email" name="email" class="border border-[#C447AF] p-2 h-10 bg-[#EAEAEA] rounded-md" placeholder="Type your email">
            </div>

            <div class="flex flex-col">
                <label for="password" class="text-lg font-bold mb-1">Password</label>
                <input type="password" name="password" class="border border-[#C447AF] p-2 h-10 bg-[#EAEAEA] rounded-md" placeholder="Type your password">
            </div>

            <div class="flex flex-col">
                <label for="password_confirmation" class="text-lg font-bold mb-1">Repeat Password</label>
                <input type="password" name="password_confirmation" class="border border-[#C447AF] p-2 h-10 bg-[#EAEAEA] rounded-md" placeholder="Repeat your password">
            </div>

            <div class="text-center">
                <p>Already have an account? 
                    <a href="{{ route('login') }}" class="text-[#C447AF] font-bold hover:underline">Login</a>
                </p>
            </div>

            <div class="flex justify-center">
                <button class="bg-[#DD6ECA] text-[#FBF4FA] px-6 py-2 font-bold rounded-md hover:bg-[#C447AF] transition">SignUp</button>
            </div>
        </form>
    </div>
</body>
</html>
