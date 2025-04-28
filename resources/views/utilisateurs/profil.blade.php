<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Utilisateur - CalmMood</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>
<body class="bg-[#FBF4FA] min-h-screen flex">

  <!-- Sidebar -->
  <div class="w-64 bg-[#C447AF] text-white p-6 flex flex-col">
    <h1 class="text-2xl font-bold mb-10 text-center">CalmMood</h1>
    <nav class="flex-1">
      <ul>
        <li class="mb-4">
          <a href="{{ route('dashboardUser') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
            <ion-icon name="home-outline" class="text-xl"></ion-icon>
            <span class="ml-3">Dashboard</span>
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('categoryExUser') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
            <ion-icon name="reader-outline" class="text-xl"></ion-icon>
            <span class="ml-3">Exercises</span>
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('allAdvice') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
            <ion-icon name="bulb-outline" class="text-xl"></ion-icon>
            <span class="ml-3">Anti-Stress Tips</span>
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('type') }}" class="flex items-center hover:bg-[#FBF4FA] hover:text-[#C447AF] p-2 rounded-xl">
            <ion-icon name="help-circle-outline" class="text-xl"></ion-icon>
            <span class="ml-3">Types of Stress</span>
          </a>
        </li>
        <li class="mb-4">
          <a href="{{ route('profile') }}" class="flex items-center bg-[#FBF4FA] text-[#C447AF] p-2 rounded-xl">
            <ion-icon name="person-outline" class="text-xl"></ion-icon>
            <span class="ml-3">Profile</span>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Logout Button -->
    <div>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full bg-[#FBF4FA] text-[#C447AF] font-semibold py-2 px-4 rounded-lg flex items-center justify-center transition-all duration-200">
          <ion-icon name="log-out-outline" class="mr-2 text-xl"></ion-icon> Logout
        </button>
      </form>
    </div>
  </div>

  <!-- Main Content -->
  <div class="flex-1 p-10 overflow-y-auto">
    <!-- Logo -->
    <div class="-ml-6">
      <img class="w-[15%] -my-12" src="{{ asset('storage/images/logo.png') }}" alt="logo">
    </div>
    
    <h2 class="text-3xl font-semibold mb-8 mt-12 text-[#C447AF]">Hi {{ auth()->user()->name }}</h2>

    <!-- Profile Content -->
    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-4xl">
      <!-- Profile Display Section -->
      <div id="profile-display">
        <h1 class="text-3xl font-bold text-center text-[#C447AF] mb-8">Your Profile</h1>
        
        <div class="flex flex-col md:flex-row items-center md:items-start gap-8 mb-8">
          <!-- Profile Picture -->
          <div class="flex-shrink-0">
            <div class="w-32 h-32 rounded-full bg-[#E192D4] flex items-center justify-center text-white text-4xl font-bold">
              {{ substr($user->name, 0, 1) }}
            </div>
          </div>
          
          <!-- User Information -->
          <div class="flex-grow bg-[#FBF4FA] rounded-xl p-6 w-full">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div>
                <h3 class="text-sm font-medium text-[#C447AF] mb-1">Name</h3>
                <p class="text-lg font-semibold">{{ $user->name }}</p>
              </div>
              
              <div>
                <h3 class="text-sm font-medium text-[#C447AF] mb-1">Email</h3>
                <p class="text-lg font-semibold">{{ $user->email }}</p>
              </div>
              
             
              
              <div>
                <h3 class="text-sm font-medium text-[#C447AF] mb-1">Member since</h3>
                <p class="text-lg font-semibold">{{ $user->created_at->format('d/m/Y') }}</p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Stats Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
         
          <div class="bg-[#FBF4FA] rounded-xl p-4 text-center">
            <h3 class="text-[#C447AF] font-medium mb-1">Stress Type</h3>
            <p class="text-2xl font-bold">{{ ucfirst($user->stressResult->main_type) }}</p>
          </div>
        </div>
        <div class="bg-white rounded-2xl shadow-md p-6 mb-6">
    <h2 class="text-2xl font-bold text-[#C447AF] mb-4">My Progress</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="p-4 bg-[#FBF4FA] rounded-xl text-center shadow">
          <a href="{{ route('ExerciceProgress') }}" class="text-[#C447AF] hover:text-[#E192D4] font-semibold">
            <h3 class="text-lg font-semibold text-gray-700">Exercises Completed</h3>
            <p class="text-3xl font-bold text-[#C447AF]">{{ $completedExercisesCount }}</p>
          </a>
        </div>

        <div class="p-4 bg-[#FBF4FA] rounded-xl text-center shadow">
            <h3 class="text-lg font-semibold text-gray-700">Advices Completed</h3>
            <p class="text-3xl font-bold text-[#C447AF]">{{ $completedAdvicesCount }}</p>
        </div>
    </div>
</div>
        <!-- Edit Button -->
        <div class="flex justify-center">
          <button id="edit-profile-btn" class="bg-[#C447AF] hover:bg-[#DD6ECA] text-white font-bold py-3 px-8 rounded-xl transition flex items-center">
            <ion-icon name="create-outline" class="mr-2 text-xl"></ion-icon>
            Edit Profile
          </button>
        </div>
      </div>
      
      <!-- Edit Profile Form (hidden by default) -->
      <div id="profile-edit" class="hidden">
        <h1 class="text-3xl font-bold text-center text-[#C447AF] mb-8">Edit Your Profile</h1>
        
        <form id="profile-form" action="{{ route('profile.update') }}" method="POST">
            @method('PUT')
            @csrf
          <div class="space-y-6 mb-8">
            <div>
              <label for="name" class="block text-sm font-medium text-[#C447AF] mb-1">Name</label>
              <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full px-4 py-3 border border-[#E192D4] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C447AF]">
            </div>
            
            <div>
              <label for="email" class="block text-sm font-medium text-[#C447AF] mb-1">Email</label>
              <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full px-4 py-3 border border-[#E192D4] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C447AF]">
            </div>
            
           
            
            <div>
              <label for="password" class="block text-sm font-medium text-[#C447AF] mb-1">New Password (leave blank to keep current)</label>
              <input type="password" id="password" name="password" class="w-full px-4 py-3 border border-[#E192D4] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C447AF]">
            </div>
            
            <div>
              <label for="password_confirmation" class="block text-sm font-medium text-[#C447AF] mb-1">Confirm Password</label>
              <input type="password" id="password_confirmation" name="password_confirmation" class="w-full px-4 py-3 border border-[#E192D4] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C447AF]">
            </div>
            
            <!-- <div>
              <label for="avatar" class="block text-sm font-medium text-[#C447AF] mb-1">Profile Picture</label>
              <input type="file" id="avatar" name="avatar" class="w-full px-4 py-3 border border-[#E192D4] rounded-xl focus:outline-none focus:ring-2 focus:ring-[#C447AF]">
            </div> -->
          </div>
          
          <div class="flex justify-center space-x-4">
            <button type="submit" class="bg-[#C447AF] hover:bg-[#DD6ECA] text-white font-bold py-3 px-6 rounded-xl transition flex items-center">
              <ion-icon name="save-outline" class="mr-2 text-xl"></ion-icon>
              Save Changes
            </button>
            
            <button type="button" id="cancel-edit-btn" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-3 px-6 rounded-xl transition flex items-center">
              <ion-icon name="close-outline" class="mr-2 text-xl"></ion-icon>
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    // Script pour le basculement entre l'affichage et l'édition du profil
    document.addEventListener('DOMContentLoaded', function() {
      const profileDisplay = document.getElementById('profile-display');
      const profileEdit = document.getElementById('profile-edit');
      const editProfileBtn = document.getElementById('edit-profile-btn');
      const cancelEditBtn = document.getElementById('cancel-edit-btn');
      
      editProfileBtn.addEventListener('click', function() {
        profileDisplay.classList.add('hidden');
        profileEdit.classList.remove('hidden');
      });
      
      cancelEditBtn.addEventListener('click', function() {
        profileEdit.classList.add('hidden');
        profileDisplay.classList.remove('hidden');
      });
      
     
    });
  </script>
</body>
</html>