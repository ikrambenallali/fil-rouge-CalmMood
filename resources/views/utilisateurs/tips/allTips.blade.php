@extends('layouts.app')

@section('title', 'Anti-Stress Tips')

@section('content')
    <div class="max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold text-[#C447AF] mb-6">Anti-Stress Tips</h1>

        <!-- Tableau des conseils -->
        <form action="{{ route('advices.complete') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($advices as $advice)
                <div class="bg-white rounded-2xl shadow-md p-5 hover:shadow-lg transition-all duration-300 card relative transform hover:-translate-y-1">
                    <div class="flex flex-col">
                        <img src="{{ asset('storage/' . $advice->image) }}" alt="Image" class="h-40 w-full object-cover rounded-xl mb-4">
                        <h3 class="text-xl font-semibold text-[#C447AF] mb-2">{{ $advice->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ $advice->content }}</p>

                        <!-- Checkbox customisée -->
                        <div class="flex items-center mt-2">
                            <input type="checkbox" id="advice-{{ $advice->id }}" name="advices[]" value="{{ $advice->id }}" class="w-5 h-5 text-[#C447AF] bg-gray-100 border-gray-300 rounded focus:ring-[#C447AF] focus:ring-2">
                            <label for="advice-{{ $advice->id }}" class="ml-2 text-gray-700 font-medium">Mark as completed</label>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-1 sm:col-span-2 lg:col-span-3">
                    <div class="bg-white rounded-2xl shadow-md p-8 text-center">
                        <div class="inline-flex justify-center items-center w-16 h-16 rounded-full bg-[#F8E6F5] mb-4">
                            <i class="fas fa-exclamation text-[#C447AF] text-xl"></i>
                        </div>
                        <p class="text-gray-600 text-lg">No advice available at the moment.</p>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Bouton stylé cohérent -->
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