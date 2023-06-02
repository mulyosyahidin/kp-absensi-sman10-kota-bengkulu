@extends('layouts.metronic')
@section('title', 'Absensi Kelas')

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
                        Absensi Kelas</h1>
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
                            <a href="{{ route('guru.absensi.index') }}" class="text-muted text-hover-primary">Absensi</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Absensi Kelas</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('guru.absensi.create', ['id_kelas' => $kelas->id, 'id_pelajaran' => $pelajaran->id]) }}"
                        class="btn btn-sm fw-bold btn-primary">
                        Pertemuan Baru
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
                    @forelse ($absensi as $item)
                        <div class="col-md-3">
                            <!--begin::Tables widget 14-->
                            <div class="card {{ $item->status == 'draft' ? 'bg-secondary' : '' }}">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Pertemuan Ke {{ $item->pertemuan_ke }}</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Body-->
                                <div class="card-body pt-6 border-top">
                                    {{ $item->judul }}
                                    <br>
                                    {{ $item->tanggal->translatedFormat('l, d M Y') }}
                                </div>
                                <!--end::Body-->
                                <!--begin::Footer-->
                                <div class="card-footer d-flex justify-content-between py-6 px-9">
                                    <div>
                                        <a href="{{ route('guru.absensi.show', $item) }}" class="btn btn-sm btn-success"><i
                                                class="fa fa-eye"></i></a>
                                    </div>

                                    <div>
                                        @if ($item->status == 'draft')
                                            <a href="{{ route('guru.absensi.absensi', $item) }}"
                                                class="btn btn-info btn-sm">Absensi <i
                                                    class="fa fa-arrow-circle-right"></i></a>
                                        @endif
                                    </div>
                                </div>
                                <!--end::Footer-->
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info">Belum ada pertemuan. Silahkan membuat absensi pertemuan kelas.
                            </div>
                        </div>
                    @endforelse
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
