@extends('layouts.metronic')
@section('title', 'Dashboard Guru')

@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Sistem Informasi Absensi SMA N 10 Kota Bengkulu
                    </h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Home</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Dashboards</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-4 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <i class="ki-duotone ki-compass fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span
                                        class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $count['pelajaran'] }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-400">Pelajaran</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-4 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <i class="ki-duotone ki-chart-simple fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $count['kelas'] }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-400">Kelas</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-4 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <i class="ki-duotone ki-abstract-39 fs-2hx text-gray-600">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-3x text-gray-800 lh-1 ls-n2">{{ $count['absensi'] }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-gray-400">Pertemuan</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-xl-4">
                        <!--begin::Chart widget 19-->
                        <div class="card card-flush mb-5 mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-dark">Kelas Saya</span>
                                </h3>
                                <!--end::Title-->
                                <!--begin::Toolbar-->
                                <div class="card-toolbar">
                                    <!--begin::Nav-->
                                    <ul class="nav" id="kt_chart_widget_19_tabs">
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm btn-primary fw-bold px-4 me-1"
                                                href="{{ route('guru.kelas.index') }}">Lihat Semua</a>
                                        </li>
                                    </ul>
                                </div>
                                <!--end::Toolbar-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6">
                                <div class="table-responsive">
                                    <table class="table table-hover table-row-dashed align-middle gs-0 gy-3 my-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                                <th>#</th>
                                                <th>Kelas</th>
                                                <th>Tingkat</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @forelse ($kelas as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->kelas->nama }}</td>
                                                    <td>{{ $item->kelas->tingkat }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>No data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Chart widget 19-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xl-8 mb-5 mb-xl-10">
                        <!--begin::Chart widget 38-->
                        <div class="card card-flush mb-xl-10">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Absensi</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6">
                                <div class="table-responsive">
                                    <table class="table table-hover table-row-dashed align-middle gs-0 gy-3 my-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                                <th>#</th>
                                                <th>Kelas</th>
                                                <th>Pertemuan Ke</th>
                                                <th>Tanggal</th>
                                                <th>Laporan</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @forelse ($absensi as $item)
                                                <tr>
                                                   <td>{{ $loop->iteration }}</td>
                                                   <td>{{ $item->kelas->nama }}</td>
                                                   <td>{{ $item->pertemuan_ke }}</td>
                                                   <td>{{ $item->tanggal->translatedFormat('l, d M Y') }}</td>
                                                   <td><a href="{{ route('guru.absensi.show', $item) }}" class="btn btn-sm btn-info"><i class="fa fa-pie-chart"></i> Laporan</a></td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>No data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Chart widget 38-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection
