@extends('layouts.app')

@section('title', 'Stress Result')

@section('content')

<div class="flex-1 p-4 flex justify-center items-center">
  <div class="bg-white rounded-2xl shadow-lg p-8 max-w-xl w-full">
    <h1 class="text-3xl font-bold text-center text-[#C447AF] mb-6">Your Stress Type</h1>

    @if ($type)
      <div class="bg-[#E192D4] text-white rounded-xl p-6 text-center mb-6">
          <h2 class="text-2xl font-semibold mb-2">{{ $type->name }}</h2>
          <p class="text-base">{{ $type->content }}</p>
      </div>
    @else
      <div class="bg-red-500 text-white rounded-xl p-6 text-center mb-6">
          <p>Il n'y a pas de type de stress associé à cet utilisateur.</p>
      </div>
    @endif

    <div class="mb-6">
      <h3 class="text-xl font-bold text-[#C447AF] mb-4">Our Recommendations:</h3>
      <ul class="space-y-3">
        <li class="flex items-start">
          <span class="inline-block w-2 h-2 bg-[#DD6ECA] rounded-full mt-2 mr-3"></span>
          <p>Practice deep breathing exercises daily.</p>
        </li>
        <li class="flex items-start">
          <span class="inline-block w-2 h-2 bg-[#DD6ECA] rounded-full mt-2 mr-3"></span>
          <p>Write down 3 positive things each evening in a journal.</p>
        </li>
        <li class="flex items-start">
          <span class="inline-block w-2 h-2 bg-[#DD6ECA] rounded-full mt-2 mr-3"></span>
          <p>Take time to meditate or relax without using screens.</p>
        </li>
      </ul>
    </div>

    <div class="flex justify-center">
      <a href="{{ route('categoryExUser') }}" class="bg-[#C447AF] hover:bg-[#DD6ECA] text-white font-bold py-3 px-6 rounded-xl transition">
        Start Exercises
      </a>
    </div>
  </div>
</div>

@endsection
