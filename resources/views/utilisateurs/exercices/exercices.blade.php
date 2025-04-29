@extends('layouts.app')

@section('title', 'Exercices - ' . $category->name)

@section('content')
    <!-- Titre avec décoration simple -->
    <div class="flex flex-col items-center mb-8">
        <h2 class="text-4xl font-bold text-[#C447AF] mb-2">{{ $category->name }}</h2>
        <div class="flex space-x-1">
            <span class="inline-block w-2 h-2 bg-[#E192D4] rounded-full"></span>
            <span class="inline-block w-2 h-2 bg-[#D76CBF] rounded-full"></span>
            <span class="inline-block w-2 h-2 bg-[#C447AF] rounded-full"></span>
            <span class="inline-block w-2 h-2 bg-[#D76CBF] rounded-full"></span>
            <span class="inline-block w-2 h-2 bg-[#E192D4] rounded-full"></span>
        </div>
    </div>

    <!-- Container principal -->
    <div class="max-w-4xl mx-auto">
        <div class="mt-6">
            <form action="{{ route('exercises.complete') }}" method="POST">
                @csrf
                @forelse ($exercices as $exercice)
                <div class="mb-8 bg-white shadow-md rounded-2xl p-5 hover:shadow-lg transition-all duration-300 card relative transform hover:-translate-y-1">
                    <div class="pl-3">
                        <a href="{{ route('showExDetails', $exercice->id) }}" class="block w-auto">
                            <h3 class="text-xl font-semibold text-[#C447AF] mb-2">{{ $exercice->title }}</h3>
                        </a>
                        <p class="text-gray-600 mb-3">{{ $exercice->description }}</p>
                        <p class="font-bold">Type of stress: {{ $exercice->typeStress->name }}</p>

                        <!-- Custom checkbox stylé -->
                        <div class="flex items-center mt-4">
                            <input type="checkbox" id="exercise-{{ $exercice->id }}" name="exercices[]" value="{{ $exercice->id }}" class="w-5 h-5 text-[#C447AF] bg-gray-100 border-gray-300 rounded focus:ring-[#C447AF] focus:ring-2">
                            <label for="exercise-{{ $exercice->id }}" class="ml-2 text-gray-700 font-medium">Mark as completed</label>
                        </div>
                    </div>
                </div>
                @empty
                <div class="bg-white rounded-2xl shadow-md p-8 text-center">
                    <div class="inline-flex justify-center items-center w-16 h-16 rounded-full bg-[#F8E6F5] mb-4">
                        <i class="fas fa-exclamation text-[#C447AF] text-xl"></i>
                    </div>
                    <p class="text-gray-600 text-lg">No exercises found in this category.</p>
                </div>
                @endforelse

                <!-- Bouton stylé et cohérent -->
                <div class="flex justify-center mt-8">
                    <button type="submit" class="group relative inline-flex items-center px-8 py-3 bg-[#C447AF] text-white font-semibold rounded-full overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 btn-creative">
                        <i class="fas fa-check mr-2 group-hover:animate-pulse"></i>
                        Save my progress
                        <span class="absolute -right-2 -top-2 w-4 h-4 rounded-full bg-[#E192D4] opacity-70"></span>
                        <span class="absolute -right-1 -bottom-1 w-3 h-3 rounded-full bg-[#E192D4] opacity-50"></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bouton retour créatif -->
    <div class="mt-10 flex justify-center">
        <a href="{{ url()->previous() }}" class="group relative inline-flex items-center px-6 py-3 bg-[#C447AF] text-white font-medium rounded-full overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 btn-creative">
            <i class="fas fa-arrow-left mr-2 group-hover:animate-pulse"></i>
            Back
            <span class="absolute -right-2 -top-2 w-4 h-4 rounded-full bg-[#E192D4] opacity-70"></span>
            <span class="absolute -right-1 -bottom-1 w-3 h-3 rounded-full bg-[#E192D4] opacity-50"></span>
        </a>
    </div>

    <style>
        .card {
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 8px;
            height: 100%;
            background: linear-gradient(to bottom, #C447AF, #E192D4);
            border-radius: 5px 0 0 5px;
        }

        .btn-creative {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .btn-creative::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
            z-index: -1;
        }

        .btn-creative:hover::before {
            left: 100%;
        }
    </style>
@endsection