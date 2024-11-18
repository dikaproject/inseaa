@extends('admin.components.base')

@section('title', 'Admin INSEAA || Dashboard')

@section('dashboard')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <!-- Period Filter -->
                        <form method="GET" action="{{ route('admin.dashboard') }}" class="d-flex align-items-center">
                            <label for="period" class="me-2">Period:</label>
                            <select name="period" id="period" class="form-select" onchange="this.form.submit()">
                                <option value="week" {{ $period == 'week' ? 'selected' : '' }}>1 Week</option>
                                <option value="month" {{ $period == 'month' ? 'selected' : '' }}>1 Month</option>
                                <option value="quarter" {{ $period == 'quarter' ? 'selected' : '' }}>3 Months</option>
                                <option value="year" {{ $period == 'year' ? 'selected' : '' }}>1 Year</option>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="d-md-none d-flex align-items-center">
                    <a href="javascript:void(0)" class="page-header-right-open-toggle">
                        <i class="feather-align-right fs-20"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- [ page-header ] end -->

        <!-- [ Main Content ] start -->
        <div class="main-content">
            <div class="row">
                <!-- [Total Visitors] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-primary text-white">
                                        <i class="feather-user"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            {{ $totalTraffic->sum('activeUsers') }}
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Visitors ({{ ucfirst($period) }})</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Total Visitors] end -->

                <!-- [Total Page Views] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-success text-white">
                                        <i class="feather-eye"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            {{ $totalTraffic->sum('screenPageViews') }}
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Total Page Views ({{ ucfirst($period) }})</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Total Page Views] end -->

                <!-- [Popular Pages] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-warning text-white">
                                        <i class="feather-star"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            {{ count($popularPages) }}
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Popular Pages ({{ ucfirst($period) }})</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Popular Pages] end -->

                <!-- [Active Users Today] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-info text-white">
                                        <i class="feather-users"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            {{ $trafficData->last()['visitors'] ?? 0 }}
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Visitors on {{ $trafficData->last()['date'] ?? 'N/A' }}</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);">
                                    <i class="feather-more-vertical"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Active Users Today] end -->

                <!-- [Traffic Chart] start -->
                <div class="col-12">
                    <div class="card stretch">
                        <div class="card-body">
                            <h5 class="card-title">Website Traffic ({{ ucfirst($period) }})</h5>
                            @if($trafficData->isEmpty())
                                <p>No data available for the selected period.</p>
                            @else
                                <canvas id="trafficChart"></canvas>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- [Traffic Chart] end -->

                <!-- [Popular Pages List] start -->
                <div class="col-12">
                    <div class="card stretch">
                        <div class="card-body">
                            <h5 class="card-title">Top 10 Popular Pages ({{ ucfirst($period) }})</h5>
                            @if($popularPages->isEmpty())
                                <p>No popular pages data available for the selected period.</p>
                            @else
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Page Title</th>
                                            <th>URL</th>
                                            <th>Page Views</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($popularPages as $page)
                                        <tr>
                                            <td>{{ $page['pageTitle'] ?? 'N/A' }}</td>
                                            <td><a href="{{ $page['pagePath'] ?? '#' }}" target="_blank">{{ $page['pagePath'] ?? 'N/A' }}</a></td>
                                            <td>{{ $page['screenPageViews'] ?? 0 }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- [Popular Pages List] end -->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>


@endsection

@section('scripts')
<!-- Include Chart.js library -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@if(!$trafficData->isEmpty())
<script>
    // Prepare data for the traffic chart
    var trafficData = @json($trafficData);

    var dates = trafficData.map(function(item) {
        return item.date;
    });

    var visitors = trafficData.map(function(item) {
        return item.visitors;
    });

    var pageViews = trafficData.map(function(item) {
        return item.pageViews;
    });

    var ctx = document.getElementById('trafficChart').getContext('2d');

    var trafficChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: dates,
            datasets: [
                {
                    label: 'Visitors',
                    data: visitors,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                },
                {
                    label: 'Page Views',
                    data: pageViews,
                    borderColor: 'rgba(153, 102, 255, 1)',
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    fill: true,
                },
            ],
        },
        options: {
            responsive: true,
            interaction: {
                mode: 'index',
                intersect: false,
            },
            stacked: false,
            plugins: {
                tooltip: {
                    mode: 'index',
                    intersect: false,
                },
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Date',
                    },
                },
                y: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Count',
                    },
                },
            },
        },
    });
</script>
@endif
@endsection
