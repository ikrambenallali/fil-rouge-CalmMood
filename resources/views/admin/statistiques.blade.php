@extends('layouts.appAdmin')

@section('content')
    <!-- Main content -->
    <div class="flex-1">
        <!-- Header section -->
        <div class="bg-white py-6 px-8 shadow-sm mb-8">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-primary">Statistics Dashboard</h1>
            </div>
        </div>

        <div class="px-8">
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h2 class="text-xl font-medium text-gray-700">Overview of Stress Types</h2>
                    <p class="text-gray-500">Visualize the stress test results</p>
                </div>
            </div>

            <!-- Cards for Statistics -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div class="card bg-white rounded-2xl shadow-custom p-6">
                    <h3 class="text-lg font-semibold text-primary mb-3">Total Tests Taken</h3>
                    <p class="text-4xl font-bold text-gray-700">{{ $totalTests }}</p>
                </div>
                <div class="card bg-white rounded-2xl shadow-custom p-6">
                    <h3 class="text-lg font-semibold text-primary mb-3">Users with Stress</h3>
                    <p class="text-4xl font-bold text-gray-700">{{ $usersWithStress }}</p>
                </div>
                <div class="card bg-white rounded-2xl shadow-custom p-6">
                    <h3 class="text-lg font-semibold text-primary mb-3">Active Users</h3>
                    <p class="text-4xl font-bold text-gray-700">{{ $activeUsers }}</p>
                </div>
            </div>

            <!-- Stress Type Distribution as Bars -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-primary mb-6">Stress Type Distribution</h3>
                <div class="space-y-4">
                    @foreach ($stressTypes as $type)
                        <div class="flex items-center justify-between">
                            <span class="text-lg font-medium text-gray-700">{{ $type->name }}</span>
                            <div class="w-full bg-gray-200 rounded-full h-4">
                                <div class="h-4 bg-primary rounded-full" style="width: {{ ($type->tests_count / $totalTests) * 100 }}%"></div>
                            </div>
                            <span class="ml-4 text-gray-700">{{ $type->tests_count }} tests</span>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Table of Stress Types -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-primary mb-6">Stress Types Breakdown</h3>
                <div class="bg-white p-6 rounded-lg shadow-custom">
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Stress Type</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Number of Tests</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Percentage</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stressTypes as $type)
                                <tr>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $type->name }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ $type->tests_count }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-700">{{ number_format(($type->tests_count / $totalTests) * 100, 2) }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
