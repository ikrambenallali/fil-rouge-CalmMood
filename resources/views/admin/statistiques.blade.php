@extends('layouts.appAdmin')

@section('title', 'Tableau de bord Admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold text-[#C447AF] mb-8">Tableau de bord - Statistiques</h1>

        <!-- Statistiques générales -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-2xl shadow-lg p-6 transition hover:shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-[#C447AF]">Utilisateurs</h2>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalUsers }}</p>
                    </div>
                    <div class="h-14 w-14 rounded-full bg-[#E192D4] flex items-center justify-center">
                        <ion-icon name="people-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 transition hover:shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-[#C447AF]">Catégories</h2>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalCategories }}</p>
                    </div>
                    <div class="h-14 w-14 rounded-full bg-[#E192D4] flex items-center justify-center">
                        <ion-icon name="folder-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 transition hover:shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-[#C447AF]">Conseils</h2>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalAdvices }}</p>
                    </div>
                    <div class="h-14 w-14 rounded-full bg-[#E192D4] flex items-center justify-center">
                        <ion-icon name="bulb-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-6 transition hover:shadow-xl">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-[#C447AF]">Exercices</h2>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalExercises ?? 0 }}</p>
                    </div>
                    <div class="h-14 w-14 rounded-full bg-[#E192D4] flex items-center justify-center">
                        <ion-icon name="trophy-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                </div>
            </div>
        </div>

        <!-- Répartition des types de stress -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">
            <h2 class="text-xl font-bold text-[#C447AF] mb-6">Répartition des types de stress</h2>
            
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="bg-[#FBF4FA]">
                            <th class="py-3 px-6 text-left text-sm font-medium text-[#C447AF] rounded-tl-xl">Type de stress</th>
                            <th class="py-3 px-6 text-left text-sm font-medium text-[#C447AF]">Nombre</th>
                            <th class="py-3 px-6 text-left text-sm font-medium text-[#C447AF] rounded-tr-xl">Pourcentage</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#FBF4FA]">
                        @php
                            $stressCount = $stressResults->groupBy('main_type')->map->count();
                            $total = $stressResults->count();
                        @endphp
                        @foreach($stressCount as $type => $count)
                            <tr class="hover:bg-[#FBF4FA]/50 transition">
                                <td class="py-4 px-6 text-gray-800 font-medium">{{ ucfirst($type) }}</td>
                                <td class="py-4 px-6 text-gray-800">{{ $count }}</td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <span class="mr-2 text-gray-800">{{ number_format(($count / $total) * 100, 1) }}%</span>
                                        <div class="w-full max-w-xs bg-gray-200 rounded-full h-2.5">
                                            <div class="bg-[#E192D4] h-2.5 rounded-full" style="width: {{ ($count / $total) * 100 }}%"></div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

     
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Vous pouvez ajouter ici du JavaScript pour des graphiques ou des fonctionnalités interactives
        });
    </script>
@endsection