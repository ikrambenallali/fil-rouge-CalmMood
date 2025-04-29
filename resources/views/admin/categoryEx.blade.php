@extends('layouts.appAdmin')


@section('content')
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-[#C447AF]">Categories</h1>
    </div>

    <!-- Liste des catégories -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($categories as $category)
        <a href="{{ route('exercices.parCategorie', $category->id) }}" class="block w-full transform transition-all duration-300 hover:scale-105">
            <div class="bg-white shadow-md rounded-2xl p-6 flex justify-between items-center hover:shadow-xl border-l-4 border-[#C447AF] hover:bg-gradient-to-r hover:from-white hover:to-[#FBF4FA] group">
                <div>
                    <h3 class="text-xl font-semibold text-[#C447AF]">{{ $category->name }}</h3>
                    <p class="text-gray-500 mt-1 group-hover:text-[#C447AF]">View exercises</p>
                </div>
                <div class="text-[#E192D4] group-hover:text-[#C447AF]">
                    <i class="fas fa-chevron-right text-xl"></i>
                </div>
            </div>
        </a>
        @endforeach
    </div>

    @if(count($categories) == 0)
    <div class="bg-white rounded-2xl p-12 text-center shadow-md">
        <div class="text-[#E192D4] text-5xl mb-4">
            <i class="fas fa-folder-open"></i>
        </div>
        <h3 class="text-2xl font-semibold text-[#C447AF] mb-2">No Categories Found</h3>
        <p class="text-gray-500 mb-6">Start by adding a new category for your exercises</p>
        <a href="#" class="bg-[#C447AF] text-white px-6 py-3 rounded-xl hover:bg-[#a93792] transition-all duration-300 inline-flex items-center gap-2">
            <i class="fas fa-plus"></i>
            <span>Add Category</span>
        </a>
    </div>
    @endif
@endsection
