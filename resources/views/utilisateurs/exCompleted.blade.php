@extends('layouts.app')

@section('title', 'exCompleted')

@section('content')
        <!-- Exercises Grid -->
        <div class="mt-16 flex flex-col gap-4">
            @forelse ($exercices as $exercice)

            <div class="bg-white shadow-md rounded-2xl overflow-hidden hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                <!-- Exercise Image or Icon -->
                <div class="p-6 ">
                    <h3 class="text-xl font-semibold text-[#C447AF]">{{ $exercice->exercice->title }}</h3>

                    <p class="text-gray-600">{{ $exercice->exercice->description }}</p>
                    <!-- Custom Checkbox -->
                    <div class="flex items-center justify-between">
                        <a href="{{ route('showExDetails', $exercice->exercice_id) }}" class="block w-auto">
                            <span>Start</span>
                            <ion-icon name="arrow-forward-outline" class="ml-1"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full bg-white p-8 rounded-2xl shadow text-center">
                <ion-icon name="sad-outline" class="text-6xl text-[#C447AF] mb-4"></ion-icon>
                <h3 class="text-xl font-semibold text-[#C447AF] mb-2">No exercises found</h3>
                <p class="text-gray-600">We couldn't find any exercises matching your criteria.</p>
            </div>
            @endforelse
        </div>



    <style>
        /* Custom Styles for Checkbox Toggle */
        .toggle-checkbox:checked {
            right: 0;
            border-color: #C447AF;
        }

        .toggle-checkbox:checked+.toggle-label {
            background-color: #E192D4;
        }
    </style>
@endsection
