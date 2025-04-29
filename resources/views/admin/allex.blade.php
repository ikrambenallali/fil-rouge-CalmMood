@extends('layouts.appAdmin')

@section('content')

        <!-- Contenu principal -->
        <div class=" flex-1 p-6">
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

            <!-- Button "Add Exercise" bien placé sous le titre -->
            <!-- Button "Add Exercise" bien placé sous le titre -->
            @auth
            @if (auth()->user()->role == 'admin')
            <div class="mb-8 text-center">
                <a href="{{ route('exercices.create') }}" class="bg-[#C447AF] text-white px-6 py-3 rounded-xl hover:bg-[#a93792] shadow-xl hover:scale-105 w-auto inline-flex justify-center items-center gap-2">
                    <i class="fas fa-plus"></i>
                    <span>Add exercise</span>
                </a>
            </div>
            @endif
            @endauth

            <!-- Container principal -->
            <div class="max-w-4xl mx-auto">
                <div class="mt-6">
                    @forelse ($exercices as $exercice)
                    <a href="{{ route('exercices.show', $exercice->id) }}" class="block w-auto">
                        <div class="mb-8 bg-white shadow-md rounded-2xl p-5 hover:shadow-lg transition-all duration-300 card relative transform hover:-translate-y-1">
                            <div class="pl-3">
                                <h3 class="text-xl font-semibold text-[#C447AF] mb-2">{{ $exercice->title }}</h3>
                                <p class="text-gray-600 mb-3">{{ $exercice->description }}</p>
                                <p class="font-bold">Type of stress : {{ $exercice->typeStress->name }}</p>
                                @auth
                                @if (auth()->user()->role == 'admin')
                                <div class="flex gap-3 mt-4 pt-3 border-t border-[#F8E6F5]">
                                    <a href="{{ route('exercices.edit', $exercice->id) }}" class="inline-flex items-center px-3 py-1 bg-[#E192D4] text-white rounded-lg btn-creative">
                                        <i class="fas fa-edit mr-1 text-xs"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('exercices.destroy', $exercice->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-[#C447AF] text-white rounded-lg btn-creative">
                                            <i class="fas fa-trash-alt mr-1 text-xs"></i>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                                @endif
                                @endauth
                            </div>
                        </div>
                    </a>
                    @empty
                    <div class="bg-white rounded-2xl shadow-md p-8 text-center">
                        <div class="inline-flex justify-center items-center w-16 h-16 rounded-full bg-[#F8E6F5] mb-4">
                            <i class="fas fa-exclamation text-[#C447AF] text-xl"></i>
                        </div>
                        <p class="text-gray-600 text-lg">No exercises found in this category.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            <!-- Bouton retour créatif -->
            <div class="mt-10 flex justify-center">
                <a href="{{ url()->previous() }}" class="group relative inline-flex items-center px-6 py-3 bg-[#C447AF] text-white font-medium rounded-full overflow-hidden shadow-md hover:shadow-lg transition-all duration-300 btn-creative">
                    <i class="fas fa-arrow-left mr-2 group-hover:animate-pulse"></i>
                    back
                    <span class="absolute -right-2 -top-2 w-4 h-4 rounded-full bg-[#E192D4] opacity-70"></span>
                    <span class="absolute -right-1 -bottom-1 w-3 h-3 rounded-full bg-[#E192D4] opacity-50"></span>
                </a>
            </div>
        </div>
    </div>
@endsection