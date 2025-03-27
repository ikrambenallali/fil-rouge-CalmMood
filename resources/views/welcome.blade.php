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

     
    <title>welcome Screen </title>
</head>
<body class="bg-[#FBF4FA]">
  <h1 class="flex justify-center text-5xl  font-bold	text-[#C447AF] m-12 ">CalmMood</h1>
  <div class="flex justify-center items-center">
  <img class="rounded-full w-[350px] h-[350px]" src="{{ asset('storage/images/photo1.png') }}" alt="photo" />
  </div>
  <h2 class="font-bold text-3xl text-center m-4">Welcome </h2>
  <h4 class="flex justify-center text-lg"> Your personal space to reduce stress, find inner peace, and regain balance in your daily life</h4>
  <p class=" font-bold flex justify-center text-md mt-2">Click the button to go to the home page</p>

  <div class="flex justify-center">
      <a href="{{ url('/home') }}" class=" bg-[#DD6ECA] text-[#FBF4FA] w-[100px] h-[40px] m-8 text-center font-bold text-lg rounded-md">Home</a>
  </div>
 
</body>
</html>