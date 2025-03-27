
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
<body class="bg-[#FBF4FA]">
    <div>
        <h1 class="flex justify-center text-3xl  font-bold	text-[#C447AF] m-12 ">SignUp</h1>
        <div  class="flex flex-col items-center">
  <!-- Afficher les erreurs -->
  @if ($errors->any())
  <div class="bg-red-200 p-4 mb-4 text-red-600 rounded-md w-96">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif

<!-- Afficher le message de succès -->
@if (session('success'))
  <div class="bg-green-200 p-4 mb-4 text-green-600 rounded-md w-96">
      {{ session('success') }}
  </div>
@endif
<form action="{{ route('register') }}" method="POST" class="flex flex-col items-center">
    @csrf
            <div class="flex flex-col ">
                <label for="name" class="text-lg font-bold mb-4">Name</label>
                <input type="text" name="name" class="border border-[#C447AF] p-2 w-96 h-10 bg-[#EAEAEA]" placeholder="tape your name">
            </div>
          
            <div class="flex flex-col ">
                <label for="email" class="text-lg font-bold mb-4">Email</label>
                <input type="email" name="email" class="border border-[#C447AF] p-2 w-96 h-10  bg-[#EAEAEA]" placeholder="tape your email">
            </div>
            <div class="flex flex-col ">
                <label for="password" class="text-lg font-bold mb-4">Password</label>
                <input type="password" name="password" class="border border-[#C447AF] p-2 w-96 h-10  bg-[#EAEAEA]" placeholder="tape your password">
            </div>
            <div class="flex flex-col ">
                <label for="password_confirmation" class="text-lg font-bold mb-4">Repeat Password</label>
                <input type="password"  name="password_confirmation" class="border border-[#C447AF] p-2 w-96 h-10  bg-[#EAEAEA]" placeholder="tape your  Password  ">
            </div>
            <div class="mt-4">
                <p>Already have an account? <a href="{{ route('login') }}" class="text-[#C447AF] font-bold ">Login</a></p>
            </div>
            <div class="flex justify-center">
                <button class=" bg-[#DD6ECA] text-[#FBF4FA] w-[100px] h-[40px] m-8 font-bold rounded-md">SignUp</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>