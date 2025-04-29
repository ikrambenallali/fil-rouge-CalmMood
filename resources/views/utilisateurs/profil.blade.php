@extends('layouts.app')

@section('title', 'profil')

@section('content')
    <!-- Tabs Navigation -->
    <div class="mb-8">
      <div class="flex border-b border-gray-200">
        <button id="tab-profile" class="tab-btn py-3 px-6 font-medium text-lg border-b-2 border-[#C447AF] text-[#C447AF]">Profile</button>
        <button id="tab-progress" class="tab-btn py-3 px-6 font-medium text-lg border-b-2 border-transparent text-gray-500 hover:text-[#C447AF]">My Progress</button>
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
            <a href="{{ route('AdviceProgress') }}" class="mt-4 block text-[#C447AF] hover:text-[#DD6ECA] font-medium">
              View details <ion-icon name="arrow-forward-outline" class="inline-block ml-1"></ion-icon>
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

      const tabButtons = document.querySelectorAll('.tab-btn');
      const tabContents = document.querySelectorAll('.tab-content');
      
      tabButtons.forEach(button => {
        button.addEventListener('click', () => {
          tabButtons.forEach(btn => {
            btn.classList.remove('border-[#C447AF]', 'text-[#C447AF]');
            btn.classList.add('border-transparent', 'text-gray-500');
          });
          
          tabContents.forEach(content => {
            content.classList.add('hidden');
          });
          
          button.classList.remove('border-transparent', 'text-gray-500');
          button.classList.add('border-[#C447AF]', 'text-[#C447AF]');
          
          const tabId = button.id.replace('tab-', 'content-');
          document.getElementById(tabId).classList.remove('hidden');
        });
      });
    });
  </script>
@endsection
