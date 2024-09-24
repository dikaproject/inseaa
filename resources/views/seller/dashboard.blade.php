@extends('seller.components.base')

@section('title', 'Seller UMKM Inseaa || Dashboard')

@section('dashboard')
    <div class="nxl-content">
        <!-- [ page-header ] start -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                </ul>
            </div>
            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <div class="d-flex d-md-none">
                        <a href="javascript:void(0)" class="page-header-right-close-toggle">
                            <i class="feather-arrow-left me-2"></i>
                            <span>Back</span>
                        </a>
                    </div>
                    <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                        <div id="reportrange" class="reportrange-picker d-flex align-items-center">
                            <span class="reportrange-picker-field"></span>
                        </div>
                        <div class="dropdown filter-dropdown">
                            <a class="btn btn-md btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10"
                                data-bs-auto-close="outside">
                                <i class="feather-filter me-2"></i>
                                <span>Filter</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Role"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer" for="Role">Role</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Team"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer" for="Team">Team</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Email"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer" for="Email">Email</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Member"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer" for="Member">Member</label>
                                    </div>
                                </div>
                                <div class="dropdown-item">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="Recommendation"
                                            checked="checked" />
                                        <label class="custom-control-label c-pointer"
                                            for="Recommendation">Recommendation</label>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-plus me-3"></i>
                                    <span>Create New</span>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item">
                                    <i class="feather-filter me-3"></i>
                                    <span>Manage Filter</span>
                                </a>
                            </div>
                        </div>
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
                <!-- [Invoices Awaiting Payment] start -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="feather-check-circle"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            <span class="counter">{{ $approvedProductsCount }}</span>
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Approved Products</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Menampilkan jumlah produk yang telah dibeli -->
                <div class="col-xxl-3 col-md-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="d-flex align-items-start justify-content-between mb-4">
                                <div class="d-flex gap-4 align-items-center">
                                    <div class="avatar-text avatar-lg bg-gray-200">
                                        <i class="feather-dollar-sign"></i>
                                    </div>
                                    <div>
                                        <div class="fs-4 fw-bold text-dark">
                                            <span class="counter">{{ $soldProductsCount }}</span>
                                        </div>
                                        <h3 class="fs-13 fw-semibold text-truncate-1-line">Items Sold</h3>
                                    </div>
                                </div>
                                <a href="javascript:void(0);" class="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- [Converted Leads] end -->
                <!-- [Projects In Progress] start -->




                <!-- [Mini] end !-->
                <!-- [Leads Overview] start -->

                <!-- [Leads Overview] end -->
                <!-- [Latest Leads] start -->

                <!-- [Latest Leads] end -->
                <!--! BEGIN: [Upcoming Schedule] !-->

                <!--! END: [Upcoming Schedule] !-->
                <!--! BEGIN: [Project Status] !-->

                <!--! END: [Project Status] !-->
                <!--! BEGIN: [Team Progress] !-->

                <!--! END: [Team Progress] !-->
            </div>
        </div>
        <div class="main-content">
            <div class="row">
                <div class="col-xxl-4 col-xl-6">
                    <div class="card stretch stretch-full">
                        <div class="card-body">
                            <div class="mb-4 text-center">
                                <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                    <div class="avatar-image wd-150 ht-150 border border-5 border-gray-3">
                                        <img src="{{ asset('assets/images/avatar/1.png') }}" alt="Avatar" class="img-fluid">
                                    </div>
                                    <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle" style="top: 76%; right: 10px">
                                        <i class="bi bi-patch-check-fill"></i>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <a href="javascript:void(0);" class="fs-14 fw-bold d-block">{{ Auth::user()->name }}</a>
                                    <a href="javascript:void(0);" class="fs-12 fw-normal text-muted d-block">{{ Auth::user()->email }}</a>
                                </div>
                                <div class="fs-12 fw-normal text-muted text-center d-flex flex-wrap gap-3 mb-4">

                                </div>
                            </div>
                            <ul class="list-unstyled mb-4">
                                <li class="hstack justify-content-between mb-4">
                                    <span class="text-muted fw-medium hstack gap-3"><i class="feather-mail"></i>Email</span>
                                    <span class="float-end">{{ Auth::user()->email }}</span>
                                </li>
                                <li class="hstack justify-content-between mb-4">
                                    <span class="text-muted fw-medium hstack gap-3"><i class="feather-phone"></i>Nomer HP</span>
                                    <span class="float-end">{{ Auth::user()->sellerProfile->no_telepon ?? 'N/A' }}</span>
                                </li>
                                <li class="hstack justify-content-between mb-4">
                                    <span class="text-muted fw-medium hstack gap-3"><i class="feather-clock"></i>Last Login Time</span>
                                    <span class="float-end">
                                        {{ session('last_login_time') ?? 'N/A' }}
                                        ({{ session('last_location') ?? 'Unknown City' }})
                                    </span>
                                </li>
                                <li class="hstack justify-content-between mb-4">
                                    <span class="text-muted fw-medium hstack gap-3"><i class="feather-map"></i>Last Login IP</span>
                                    <span class="float-end">{{ session('last_login_ip') ?? 'N/A' }}</span>
                                </li>
                                <li class="hstack justify-content-between mb-4">
                                    <span class="text-muted fw-medium hstack gap-3"><i class="feather-smartphone"></i>Last Device Used</span>
                                    <span class="float-end text-wrap" style="word-break: break-word; max-width: 300px;">
                                        {{ session('last_device_used') ?? 'N/A' }}
                                    </span>
                                </li>
                            </ul>


                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-6">
                    <div class="card border-top-0">
                        <div class="card-header p-0">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs flex-wrap w-100 text-center customers-nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link active" data-bs-toggle="tab" data-bs-target="#overviewTab" role="tab">Overview</a>
                                </li>

                                <li class="nav-item flex-fill border-top" role="presentation">
                                    <a href="javascript:void(0);" class="nav-link" data-bs-toggle="tab" data-bs-target="#activityTab" role="tab">Activity</a>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">
                                <div class="profile-details mb-5">
                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                        <h5 class="fw-bold mb-0">Profile Details:</h5>
                                    </div>
                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Full Name:</div>
                                        <div class="col-sm-6 fw-semibold"></div>
                                    </div>
                                    <div class="row g-0 mb-4">
                                        <div class="col-sm-6 text-muted">Email Address:</div>
                                        <div class="col-sm-6 fw-semibold"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="activityTab" role="tabpanel">
                                <div class="recent-activity p-4 pb-0">
                                    <div class="mb-4 pb-2 d-flex justify-content-between">
                                        <h5 class="fw-bold">Recent Activity:</h5>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-light-brand">View All</a>
                                    </div>
                                    <ul class="list-unstyled activity-feed">
                                        @forelse($activities as $activity)
                                            <li class="d-flex justify-content-between feed-item">
                                                <div>
                                                    <span class="text-truncate-1-line">
                                                        <span class="date">{{ $activity->created_at->format('Y-m-d H:i') }}</span>
                                                        - Uploaded Product: <strong>{{ $activity->name }}</strong>
                                                    </span>
                                                    <span class="text-muted">
                                                        Status: {{ $activity->status == 'approved' ? 'Approved' : ($activity->status == 'rejected' ? 'Rejected' : 'Pending') }}
                                                    </span>
                                                </div>
                                                <div class="ms-3 d-flex gap-2 align-items-center">
                                                    <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="tooltip" title="More Options"><i class="feather feather-more-vertical"></i></a>
                                                </div>
                                            </li>
                                        @empty
                                            <li class="d-flex justify-content-between feed-item">
                                                <div>
                                                    <span class="text-muted">No activities yet</span>
                                                </div>
                                            </li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
        <!-- [ Main Content ] end -->
    </div>
@endsection
