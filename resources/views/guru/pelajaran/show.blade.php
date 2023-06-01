@extends('layouts.metronic')
@section('title', $pelajaran->nama)

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
                        {{ $pelajaran->nama }}</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('guru.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('guru.pelajaran.index') }}"
                                class="text-muted text-hover-primary">Pelajaran Saya</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">{{ $pelajaran->nama }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('guru.pelajaran.index') }}" class="btn btn-sm fw-bold btn-primary">
                        Kembali
                    </a>
                    <!--end::Primary button-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-fluid">
                <!--begin::Row-->
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-12">
                        <!--begin::Tables widget 14-->
                        <div class="card">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0">{{ $pelajaran->nama }}</h3>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--begin::Card header-->
                            <!--begin::Body-->
                            <div class="table-responsive border-top px-10">
                                <table
                                    class="table table-hover table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                    <tbody>
                                        <tr>
                                            <td>ID</td>
                                            <td>
                                                <strong>{{ $pelajaran->id }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>
                                                <strong>{{ $pelajaran->nama }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tingkat</td>
                                            <td>
                                                <strong>{{ $pelajaran->tingkat }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis</td>
                                            <td>
                                                <strong>{{ $pelajaran->jenis == 'umum' ? 'Pelajaran Umum' : 'Pelajaran Penjurusan' }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end: Card Body-->
                        </div>
                        <!--end::Tables widget 14-->
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
