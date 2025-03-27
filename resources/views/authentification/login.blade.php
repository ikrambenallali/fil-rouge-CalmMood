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
<body class="bg-[#FBF4FA]">
    <div class="flex flex-col items-center m-20" >
        <h1 class="flex justify-center text-3xl  font-bold	text-[#C447AF] m-12 ">Login</h1>

         <form action="{{ route('login') }}" method="POST" class="flex flex-col items-center">
            @csrf 
            
            <div class="flex flex-col mb-4">
                <label for="email" class="text-lg font-bold mb-2">Email</label>
                <input type="email" name="email" class="border border-[#C447AF] p-2 w-96 h-10 bg-[#EAEAEA]" placeholder="Tape ton email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <div class="text-red-500 text-sm">{{ $errors->first('email') }}</div>
                @endif
            </div>
            
            <div class="flex flex-col mb-4">
                <label for="password" class="text-lg font-bold mb-2">Password</label>
                <input type="password" name="password" class="border border-[#C447AF] p-2 w-96 h-10 bg-[#EAEAEA]" placeholder="Tape ton mot de passe" required>
                @if ($errors->has('password'))
                    <div class="text-red-500 text-sm">{{ $errors->first('password') }}</div>
                @endif
            </div>
            <div>
                <p>Don't have an account? <a href="{{ route('register') }}" class="text-[#C447AF] font-bold ">SignUp</a></p>
            </div>
            
            <div class="flex justify-center">
                <button type="submit" class="bg-[#DD6ECA] text-[#FBF4FA] w-[100px] h-[40px] m-8 font-bold rounded-md">Login</button>
            </div>
        </form>
    </div>
</body>
</html>