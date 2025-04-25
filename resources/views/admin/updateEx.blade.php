<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un exercice</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>

<body class="bg-[#FBF4FA] min-h-screen py-12 px-4 sm:px-6">
    <div class="max-w-4xl mx-auto">
        <!-- Header with icon -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-[#C447AF] text-white mb-4">
                <i class="fas fa-edit text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-[#C447AF]">Edit Exercise</h1>
            <p class="text-gray-600 mt-2">Update the exercise information "{{ $exercice->title }}"</p>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <!-- Progress indicator -->
            <div class="w-full bg-[#F0E4EE] h-2">
                <div class="bg-[#C447AF] h-2 w-full rounded-r-full"></div>
            </div>
            
            <form action="{{ route('exercices.update', $exercice->id) }}" method="POST" class="p-8 space-y-6" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Basic Information Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 text-[#C447AF] font-medium border-b border-gray-200 pb-2">
                        <i class="fas fa-info-circle"></i>
                        <h2 class="text-xl">General information</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-2">
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Title of the exercise</label>
                            <input type="text" name="title" id="title" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#C447AF] focus:border-transparent bg-white" 
                                value="{{ $exercice->title }}" required>
                        </div>

                        <div class="col-span-2">
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                            <div class="relative">
                                <select name="category_id" id="category_id" 
                                    class="w-full pl-4 pr-10 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#C447AF] focus:border-transparent bg-white appearance-none" 
                                    required>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $exercice->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                                    <i class="fas fa-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-span-2">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Detailed description</label>
                            <textarea name="description" id="description" rows="4" 
                                class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#C447AF] focus:border-transparent bg-white" 
                                required>{{ $exercice->description }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Media Section -->
                <div class="space-y-6">
                    <div class="flex items-center gap-2 text-[#C447AF] font-medium border-b border-gray-200 pb-2">
                        <i class="fas fa-play-circle"></i>
                        <h2 class="text-xl">Multimedia content</h2>
                    </div>
                    
                    <div>
                        <label for="video_url" class="block text-sm font-medium text-gray-700 mb-1">Video URL (YouTube)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-gray-500">
                                <i class="fab fa-youtube"></i>
                            </div>
                            <input type="url" name="video_url" id="video_url" 
                                class="w-full pl-10 px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#C447AF] focus:border-transparent bg-white" 
                                value="{{ $exercice->video_url }}">
                        </div>
                    </div>

                    @if($exercice->video_url)
                    <div class="bg-gray-50 p-4 rounded-xl">
                        <div class="flex items-center gap-2 text-gray-700 mb-2">
                            <i class="fas fa-link text-sm"></i>
                            <span class="text-sm">Current video</span>
                        </div>
                        <div class="text-sm text-gray-600 overflow-hidden text-ellipsis">
                            {{ $exercice->video_url }}
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Respiration Parameters Section -->
                @php
                    $respirationData = json_decode($exercice->respiration_data ?? '{}');
                @endphp
                <div class="space-y-6">
                    <div class="flex items-center gap-2 text-[#C447AF] font-medium border-b border-gray-200 pb-2">
                        <i class="fas fa-lungs"></i>
                        <h2 class="text-xl">Breathing parameters</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label for="inspireDuration" class="block text-sm font-medium text-gray-700 mb-1">Inspiration duration (sec)</label>
                            <div class="relative">
                                <input type="number" name="inspireDuration" id="inspireDuration" min="0" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#C447AF] focus:border-transparent bg-white"
                                    onchange="updateRespirationData()" value="{{ $respirationData->inspireDuration ?? 0 }}">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-[#C447AF]">
                                    <i class="fas fa-arrow-up"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="retainDuration" class="block text-sm font-medium text-gray-700 mb-1">Retention time (sec)</label>
                            <div class="relative">
                                <input type="number" name="retainDuration" id="retainDuration" min="0" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#C447AF] focus:border-transparent bg-white"
                                    onchange="updateRespirationData()" value="{{ $respirationData->retainDuration ?? 0 }}">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-[#C447AF]">
                                    <i class="fas fa-pause"></i>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="expireDuration" class="block text-sm font-medium text-gray-700 mb-1">Expiration time (sec)</label>
                            <div class="relative">
                                <input type="number" name="expireDuration" id="expireDuration" min="0" 
                                    class="w-full px-4 py-3 rounded-xl border border-gray-300 shadow-sm focus:ring-2 focus:ring-[#C447AF] focus:border-transparent bg-white"
                                    onchange="updateRespirationData()" value="{{ $respirationData->expireDuration ?? 0 }}">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-[#C447AF]">
                                    <i class="fas fa-arrow-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="respiration_data" id="respiration_data">

                <!-- Action Buttons -->
                <div class="pt-6 flex flex-col sm:flex-row justify-center sm:justify-between gap-4">
                    <a href="{{ route('exercices.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 font-medium rounded-xl hover:bg-gray-200 transition-all text-center">
                        <div class="flex items-center justify-center gap-2">
                            <i class="fas fa-times"></i>
                            <span>Cancel</span>
                        </div>
                    </a>
                    
                    <div class="flex gap-4">
                       
                        
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-[#C447AF] to-[#E192D4] text-white font-medium rounded-xl shadow-lg hover:shadow-xl transition-all">
                            <div class="flex items-center gap-2">
                                <i class="fas fa-save"></i> 
                                <span>Update</span>
                            </div>
                        </button>
                    </div>
                </div>
            </form>
            
          
        </div>
    </div>

    <script>
        function updateRespirationData() {
            const expire = document.getElementById('expireDuration').value;
            const retain = document.getElementById('retainDuration').value;
            const inspire = document.getElementById('inspireDuration').value;

            const data = {
                expireDuration: parseInt(expire) || 0,
                retainDuration: parseInt(retain) || 0,
                inspireDuration: parseInt(inspire) || 0
            };

            document.getElementById('respiration_data').value = JSON.stringify(data);
        }

       

        // Initialize respiration data on page load
        window.addEventListener('DOMContentLoaded', updateRespirationData);
    </script>
</body>

</html>