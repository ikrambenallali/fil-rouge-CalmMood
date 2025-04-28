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

    <h2 class="text-3xl font-semibold mb-6 mt-12 text-[#C447AF]">Hi {{ auth()->user()->name }}</h2>

    <!-- Tabs Navigation -->
    <div class="mb-8">
      <div class="flex border-b border-gray-200">
        <button id="tab-profile" class="tab-btn py-3 px-6 font-medium text-lg border-b-2 border-[#C447AF] text-[#C447AF]">Profile</button>
        <button id="tab-progress" class="tab-btn py-3 px-6 font-medium text-lg border-b-2 border-transparent text-gray-500 hover:text-[#C447AF]">My Progress</button>
        <button id="tab-exercises" class="tab-btn py-3 px-6 font-medium text-lg border-b-2 border-transparent text-gray-500 hover:text-[#C447AF]">Recommended Exercises</button>
      </div>
    </div>

    <!-- Profile Tab Content -->
    <div id="content-profile" class="tab-content">
      <div class="bg-white rounded-2xl shadow-lg p-8 max-w-4xl">
        <!-- Profile Display Section -->
        <div id="profile-display">
          <h1 class="text-2xl font-bold text-[#C447AF] mb-8">Your Profile</h1>

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
                
                <div>
                  <h3 class="text-sm font-medium text-[#C447AF] mb-1">Stress Type</h3>
                  <p class="text-lg font-semibold">{{ ucfirst($user->stressResult->main_type) }}</p>
                </div>
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
          <h1 class="text-2xl font-bold text-[#C447AF] mb-8">Edit Your Profile</h1>

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

    <!-- Progress Tab Content -->
    <div id="content-progress" class="tab-content hidden">
      <div class="bg-white rounded-2xl shadow-lg p-8">
        <h1 class="text-2xl font-bold text-[#C447AF] mb-8">My Progress</h1>

        <!-- Overall Progress Card -->
        <div class="mb-8 bg-[#FBF4FA] rounded-xl p-6">
          <h3 class="text-xl font-semibold text-[#C447AF] mb-3">Overall Progress</h3>
          <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
            <div class="bg-[#E192D4] h-4 rounded-full" style="width:{{ $progress}}%"></div> 
          </div>
          <div class="flex justify-between text-sm text-gray-600">
            <span>{{ $completedExercisesCount}} /{{$nombreExercicesDansMonTypeDeStress }} exercises completed</span>
            <span>{{ $progress }} %</span>
          </div>
        </div>

        <!-- Progress Stats -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
          <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-[#C447AF] mb-4">Exercises Progress</h3>
            <div class="flex items-center justify-between">
              <div>
                <p class="text-3xl font-bold text-[#C447AF]">{{ $completedExercisesCount  }}</p>
                <p class="text-sm text-gray-500">Exercises completed</p>
              </div>
              <div class="h-16 w-16 rounded-full bg-[#E192D4] flex items-center justify-center">
                <ion-icon name="trophy-outline" class="text-2xl text-white"></ion-icon>
              </div>
            </div>
            <a href="{{ route('ExerciceProgress') }}" class="mt-4 block text-[#C447AF] hover:text-[#DD6ECA] font-medium">
              View details <ion-icon name="arrow-forward-outline" class="inline-block ml-1"></ion-icon>
            </a>
          </div>

          <div class="bg-white rounded-xl shadow p-6">
            <h3 class="text-lg font-semibold text-[#C447AF] mb-4">Anti-Stress Tips Progress</h3>
            <div class="flex items-center justify-between">
              <div>
                <p class="text-3xl font-bold text-[#C447AF]">{{ $completedAdvicesCount  }}</p>
                <p class="text-sm text-gray-500">Tips completed</p>
              </div>
              <div class="h-16 w-16 rounded-full bg-[#E192D4] flex items-center justify-center">
                <ion-icon name="bulb-outline" class="text-2xl text-white"></ion-icon>
              </div>
            </div>
            <a href="#" class="mt-4 block text-[#C447AF] hover:text-[#DD6ECA] font-medium">
              View details <ion-icon name="arrow-forward-outline" class="inline-block ml-1"></ion-icon>
            </a>
          </div>
        </div>

        <!-- Recent Activity -->
        <div class="bg-white rounded-xl shadow p-6">
          <h3 class="text-lg font-semibold text-[#C447AF] mb-4">Recent Activity</h3>
          <div class="space-y-4">
            <div class="flex items-start p-3 border-l-4 border-[#E192D4] bg-[#FBF4FA]">
              <div class="mr-4 bg-[#E192D4] p-2 rounded-full text-white">
                <ion-icon name="checkmark-outline" class="text-xl"></ion-icon>
              </div>
              <div>
                <p class="font-medium">Completed "Deep Breathing" exercise</p>
                <p class="text-sm text-gray-500">Yesterday at 15:30</p>
              </div>
            </div>
            <div class="flex items-start p-3 border-l-4 border-[#E192D4] bg-[#FBF4FA]">
              <div class="mr-4 bg-[#E192D4] p-2 rounded-full text-white">
                <ion-icon name="checkmark-outline" class="text-xl"></ion-icon>
              </div>
              <div>
                <p class="font-medium">Read "Mindfulness at Work" tip</p>
                <p class="text-sm text-gray-500">2 days ago at 09:15</p>
              </div>
            </div>
            <div class="flex items-start p-3 border-l-4 border-[#E192D4] bg-[#FBF4FA]">
              <div class="mr-4 bg-[#E192D4] p-2 rounded-full text-white">
                <ion-icon name="checkmark-outline" class="text-xl"></ion-icon>
              </div>
              <div>
                <p class="font-medium">Completed "Progressive Muscle Relaxation"</p>
                <p class="text-sm text-gray-500">3 days ago at 20:45</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Recommended Exercises Tab Content -->
    <div id="content-exercises" class="tab-content hidden">
      <div class="bg-white rounded-2xl shadow-lg p-8">
        <div class="flex justify-between items-center mb-6">
          <h1 class="text-2xl font-bold text-[#C447AF]">Recommended For You</h1>
          <div class="text-sm text-gray-500">Based on your stress type: <span class="font-medium text-[#C447AF]">{{ ucfirst($user->stressResult->main_type ?? 'Work-related') }}</span></div>
        </div>

        <!-- Filter and Search Section -->
        <div class="flex flex-col md:flex-row justify-between items-center bg-[#FBF4FA] rounded-xl p-4 mb-8">
          <div class="flex items-center mb-4 md:mb-0">
            <div class="relative">
              <input type="text" placeholder="Search exercises..." class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#C447AF] w-full md:w-64">
              <ion-icon name="search-outline" class="absolute left-3 top-2.5 text-gray-400 text-lg"></ion-icon>
            </div>
          </div>
          
          <div class="flex flex-wrap gap-2">
            <button class="px-4 py-2 rounded-lg bg-[#C447AF] text-white hover:bg-[#DD6ECA] transition">All</button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Breathing</button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Meditation</button>
            <button class="px-4 py-2 rounded-lg bg-gray-100 text-gray-700 hover:bg-gray-200 transition">Physical</button>
          </div>
        </div>

        <!-- Exercises Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Exercise Card 1 -->
          <div class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="bg-[#E192D4] text-white text-xs font-bold uppercase px-3 py-1 inline-block absolute top-4 right-4 rounded-full">
              Breathing
            </div>
            
            <div class="h-40 bg-[#FBF4FA] flex items-center justify-center">
              <ion-icon name="cloud-outline" class="text-6xl text-[#C447AF]"></ion-icon>
            </div>
            
            <div class="p-6">
              <h3 class="text-xl font-semibold text-[#C447AF] mb-2">Deep Breathing</h3>
              <p class="text-gray-600 mb-4">Simple breathing exercise to reduce stress and anxiety in minutes.</p>
              
              <div class="flex items-center justify-between mb-4 text-sm">
                <div class="flex items-center text-gray-500">
                  <ion-icon name="time-outline" class="mr-1"></ion-icon>
                  <span>5 mins</span>
                </div>
                <div class="flex items-center text-gray-500">
                  <ion-icon name="fitness-outline" class="mr-1"></ion-icon>
                  <span>Easy</span>
                </div>
              </div>
              
              <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                  <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" name="toggle-1" id="toggle-1" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 border-gray-300 appearance-none cursor-pointer peer checked:right-0 checked:border-[#C447AF]" />
                    <label for="toggle-1" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer peer-checked:bg-[#E192D4]"></label>
                  </div>
                  <label for="toggle-1" class="text-sm text-gray-600">Completed</label>
                </div>
                
                <a href="#" class="block w-auto">
                  <span>Start</span>
                  <ion-icon name="arrow-forward-outline" class="ml-1"></ion-icon>
                </a>
              </div>
            </div>
          </div>

          <!-- Exercise Card 2 -->
          <div class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="bg-[#E192D4] text-white text-xs font-bold uppercase px-3 py-1 inline-block absolute top-4 right-4 rounded-full">
              Meditation
            </div>
            
            <div class="h-40 bg-[#FBF4FA] flex items-center justify-center">
              <ion-icon name="leaf-outline" class="text-6xl text-[#C447AF]"></ion-icon>
            </div>
            
            <div class="p-6">
              <h3 class="text-xl font-semibold text-[#C447AF] mb-2">Mindfulness Meditation</h3>
              <p class="text-gray-600 mb-4">Focus on the present moment to reduce work-related stress and improve focus.</p>
              
              <div class="flex items-center justify-between mb-4 text-sm">
                <div class="flex items-center text-gray-500">
                  <ion-icon name="time-outline" class="mr-1"></ion-icon>
                  <span>10 mins</span>
                </div>
                <div class="flex items-center text-gray-500">
                  <ion-icon name="fitness-outline" class="mr-1"></ion-icon>
                  <span>Medium</span>
                </div>
              </div>
              
              <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                  <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" name="toggle-2" id="toggle-2" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 border-gray-300 appearance-none cursor-pointer peer checked:right-0 checked:border-[#C447AF]" />
                    <label for="toggle-2" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer peer-checked:bg-[#E192D4]"></label>
                  </div>
                  <label for="toggle-2" class="text-sm text-gray-600">Completed</label>
                </div>
                
                <a href="#" class="block w-auto">
                  <span>Start</span>
                  <ion-icon name="arrow-forward-outline" class="ml-1"></ion-icon>
                </a>
              </div>
            </div>
          </div>

          <!-- Exercise Card 3 -->
          <div class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
            <div class="bg-[#E192D4] text-white text-xs font-bold uppercase px-3 py-1 inline-block absolute top-4 right-4 rounded-full">
              Physical
            </div>
            
            <div class="h-40 bg-[#FBF4FA] flex items-center justify-center">
              <ion-icon name="body-outline" class="text-6xl text-[#C447AF]"></ion-icon>
            </div>
            
            <div class="p-6">
              <h3 class="text-xl font-semibold text-[#C447AF] mb-2">Progressive Muscle Relaxation</h3>
              <p class="text-gray-600 mb-4">Release physical tension with this body-focused relaxation technique.</p>
              
              <div class="flex items-center justify-between mb-4 text-sm">
                <div class="flex items-center text-gray-500">
                  <ion-icon name="time-outline" class="mr-1"></ion-icon>
                  <span>15 mins</span>
                </div>
                <div class="flex items-center text-gray-500">
                  <ion-icon name="fitness-outline" class="mr-1"></ion-icon>
                  <span>Easy</span>
                </div>
              </div>
              
              <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                  <div class="relative inline-block w-10 mr-2 align-middle select-none transition duration-200 ease-in">
                    <input type="checkbox" name="toggle-3" id="toggle-3" class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 border-gray-300 appearance-none cursor-pointer peer checked:right-0 checked:border-[#C447AF]" />
                    <label for="toggle-3" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer peer-checked:bg-[#E192D4]"></label>
                  </div>
                  <label for="toggle-3" class="text-sm text-gray-600">Completed</label>
                </div>
                
                <a href="#" class="block w-auto">
                  <span>Start</span>
                  <ion-icon name="arrow-forward-outline" class="ml-1"></ion-icon>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="mt-8 text-center">
          <a href="{{ route('categoryExUser') }}" class="inline-block bg-[#C447AF] hover:bg-[#DD6ECA] text-white font-semibold py-3 px-8 rounded-xl transition">
            View All Exercises
          </a>
        </div>
      </div>
    </div>
  </div>

  <style>
    /* Custom Styles for Checkbox Toggle */
    .toggle-checkbox:checked {
      right: 0;
      border-color: #C447AF;
    }
    .toggle-checkbox:checked + .toggle-label {
      background-color: #E192D4;
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Profile edit form toggle
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

      // Tab navigation
      const tabButtons = document.querySelectorAll('.tab-btn');
      const tabContents = document.querySelectorAll('.tab-content');
      
      tabButtons.forEach(button => {
        button.addEventListener('click', () => {
          // Remove active class from all buttons and contents
          tabButtons.forEach(btn => {
            btn.classList.remove('border-[#C447AF]', 'text-[#C447AF]');
            btn.classList.add('border-transparent', 'text-gray-500');
          });
          
          tabContents.forEach(content => {
            content.classList.add('hidden');
          });
          
          // Add active class to clicked button
          button.classList.remove('border-transparent', 'text-gray-500');
          button.classList.add('border-[#C447AF]', 'text-[#C447AF]');
          
          // Show corresponding content
          const tabId = button.id.replace('tab-', 'content-');
          document.getElementById(tabId).classList.remove('hidden');
        });
      });
    });
  </script>
</body>
</html>