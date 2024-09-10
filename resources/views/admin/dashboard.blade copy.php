@extends('admin.components.callback')

@section('title', 'Dashboard')

@section('dashboard')
<div class="px-4 pt-6">
    <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
        <!-- Main widget -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <div class="flex-shrink-0">
                    <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">Traffic Website</span>
                    <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Traffic in {{ ucfirst($period) }}</h3>
                </div>
                <div class="flex items-center justify-end flex-1 text-base font-medium text-green-500 dark:text-green-400">
                    <!-- Traffic change percentage, dynamically calculated -->
                </div>
            </div>
            <canvas id="analytics-chart" class="h-64"></canvas>
            <!-- Card Footer -->
            <div class="flex items-center justify-between pt-3 mt-4 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                <div>
                    <form method="GET" action="{{ route('admin_dashboard') }}" class="inline-flex items-center">
                        <select name="period" onchange="this.form.submit()" class="p-2 text-sm font-medium text-gray-500 bg-white border border-gray-200 rounded-lg dark:text-gray-400 dark:bg-gray-800 dark:border-gray-700">
                            <option value="day" {{ $period == 'day' ? 'selected' : '' }}>Last 24 hours</option>
                            <option value="week" {{ $period == 'week' ? 'selected' : '' }}>Last 7 days</option>
                            <option value="month" {{ $period == 'month' ? 'selected' : '' }}>Last 30 days</option>
                            <option value="quarter" {{ $period == 'quarter' ? 'selected' : '' }}>Last 90 days</option>
                            <option value="year" {{ $period == 'year' ? 'selected' : '' }}>Last year</option>
                        </select>
                    </form>
                </div>
                <div class="flex-shrink-0">
                    <button id="download-report" class="inline-flex items-center p-2 text-xs font-medium uppercase rounded-lg text-primary-700 sm:text-sm hover:bg-gray-100 dark:text-primary-500 dark:hover:bg-gray-700">
                        Download Report
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Active Users in Month</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $monthlyTraffic->first()['activeUsers'] ?? 'N/A' }}</span>
            </div>
        </div>
        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Traffic Track Website</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $monthlyTraffic->first()['screenPageViews'] ?? 'N/A' }}</span>
            </div>
        </div>
        <div class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Popular Page</h3>
                @php
                    $maxPageViews = 0;
                    $maxPageUrl = '';
                    foreach ($popularPages as $page) {
                        if ($page['screenPageViews'] > $maxPageViews) {
                            $maxPageViews = $page['screenPageViews'];
                            $maxPageUrl = $page['fullPageUrl'];
                        }
                    }
                @endphp
                <span class="text-2xl font-bold leading-none text-gray-900 dark:text-white">{{ $maxPageViews }} in URL {{ $maxPageUrl }}</span>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ensure Chart.js library is loaded
        if (typeof Chart === 'undefined') {
            console.error('Chart.js library is not loaded.');
            return;
        }

        // Fetch the traffic data from the backend and render it with Chart.js
        const trafficData = @json($trafficData);

        // Debugging: Output the trafficData to the console
        console.log('Traffic Data:', trafficData);

        if (!trafficData || trafficData.length === 0) {
            console.error('No traffic data available.');
            return;
        }

        const labels = trafficData.map(data => data.date);
        const pageViewsData = trafficData.map(data => data.pageViews);
        const visitorsData = trafficData.map(data => data.visitors);

        // Debugging: Output the processed data to the console
        console.log('Labels:', labels);
        console.log('Page Views Data:', pageViewsData);
        console.log('Visitors Data:', visitorsData);

        const ctx = document.getElementById('analytics-chart').getContext('2d');
        const mainChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Page Views',
                    data: pageViewsData,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }, {
                    label: 'Visitors',
                    data: visitorsData,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Date',
                            color: '#666',
                            font: {
                                size: 14
                            }
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12
                            }
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Count',
                            color: '#666',
                            font: {
                                size: 14
                            }
                        },
                        ticks: {
                            color: '#666',
                            font: {
                                size: 12
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        labels: {
                            color: '#666',
                            font: {
                                size: 14
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0,0,0,0.8)',
                        titleColor: '#fff',
                        bodyColor: '#fff',
                        footerColor: '#fff'
                    }
                }
            }
        });

        // Download report functionality
        document.getElementById('download-report').addEventListener('click', function () {
            const link = document.createElement('a');
            link.href = '/path-to-your-report-endpoint';
            link.download = 'traffic-report.csv';
            link.click();
        });
    });
</script>
@endsection
@endsection








{{-- @extends('admin.components.callback')

@section('title', 'Dashboard')

@section('dashboard')
<div class="px-4 pt-6">
    <div class="grid gap-4 xl:grid-cols-2 2xl:grid-cols-3">
        <!-- Traffic Data -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <div class="flex-shrink-0">
                    <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">Website Traffic</span>
                </div>
            </div>
            <ul>
                <li class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                    <span>Daily Visitors Active</span>
                    <span>{{ $dailyTraffic->first()['activeUsers'] ?? 'N/A' }}</span>
                    <span>Daily Visitors Screen View</span>
                    <span>{{ $dailyTraffic->first()['screenPageViews'] ?? 'N/A' }}</span>
                </li>
                <li class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                    <span>Weekly Visitors Active</span>
                    <span>{{ $weeklyTraffic->first()['activeUsers'] ?? 'N/A' }}</span>
                    <span>Weekly Visitors Screen View</span>
                    <span>{{ $weeklyTraffic->first()['screenPageViews'] ?? 'N/A' }}</span>
                </li>
                <li class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                    <span>Bi-Weekly Visitors Active</span>
                    <span>{{ $biWeeklyTraffic->first()['activeUsers'] ?? 'N/A' }}</span>
                    <span>Bi-Weekly Visitors Screen View</span>
                    <span>{{ $biWeeklyTraffic->first()['screenPageViews'] ?? 'N/A' }}</span>
                </li>
                <li class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                    <span>Monthly Visitors Active</span>
                    <span>{{ $monthlyTraffic->first()['activeUsers'] ?? 'N/A' }}</span>
                    <span>Monthly Visitors Screen View</span>
                    <span>{{ $monthlyTraffic->first()['screenPageViews'] ?? 'N/A' }}</span>
                </li>
                <li class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                    <span>Quarterly Visitors Active</span>
                    <span>{{ $quarterlyTraffic->first()['activeUsers'] ?? 'N/A' }}</span>
                    <span>Quarterly Visitors Screen View</span>
                    <span>{{ $quarterlyTraffic->first()['screenPageViews'] ?? 'N/A' }}</span>
                </li>
                <li class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                    <span>Yearly Visitors Active</span>
                    <span>{{ $yearlyTraffic->first()['activeUsers'] ?? 'N/A' }}</span>
                    <span>Yearly Visitors Screen View</span>
                    <span>{{ $yearlyTraffic->first()['screenPageViews'] ?? 'N/A' }}</span>
                </li>
            </ul>
        </div>

        <!-- Country Data -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Traffic by Country</h3>
            <ul>
                @foreach ($countryData as $country)
                    <li class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                        <span>{{ $country['pageReferrer'] ?? 'N/A' }}</span>
                        <span>{{ $country['screenPageViews'] ?? 'N/A' }}</span>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Popular Pages -->
        <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Popular Pages</h3>
            <ul>
                @foreach ($popularPages as $page)
                    <li class="flex justify-between py-2 border-b border-gray-200 dark:border-gray-700">
                        <span>{{ $page['fullPageUrl'] ?? 'N/A' }}</span>
                        <span>{{ $page['screenPageViews'] ?? 'N/A' }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection --}}
