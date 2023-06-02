@extends('layouts.metronic')
@section('title', 'Pilih Pelajaran')

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
                        Pilih Pelajaran</h1>
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
                        <li class="breadcrumb-item text-muted">Pilih Pelajaran</li>
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
                <div class="row g-5 g-xl-10 mb-5 mb-xl-10">
                    <!--begin::Col-->
                    <div class="col-12">
                        <!--begin::Tables widget 14-->
                        <div class="card card-flush h-md-100">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Pilih Pelajaran (Kelas
                                        {{ $kelas->nama }})</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Tingkat</th>
                                                <th>Jenis</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @forelse ($kelas->pelajaran->where('guruPelajaran.id_guru', auth()->user()->guru->id) as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->guruPelajaran->pelajaran->nama }}</td>
                                                    <td>{{ $item->guruPelajaran->pelajaran->tingkat }}</td>
                                                    <td>{{ $item->guruPelajaran->pelajaran->jenis == 'umum' ? 'Pelajaran Umum' : 'Pelajaran Jurusan' }}
                                                    </td>
                                                    <td class="text-end">
                                                        <a href="{{ route('guru.absensi.laporan', ['kelas' => $kelas, 'pelajaran' => $item->guruPelajaran->pelajaran]) }}" class="btn btn-sm btn-info"><i class="fa fa-pie-chart"></i> Laporan</a>
                                                        <a href="{{ route('guru.absensi.pertemuan', ['kelas' => $kelas, 'pelajaran' => $item->guruPelajaran->pelajaran]) }}"
                                                            class="btn btn-success btn-sm">Absen <i
                                                                class="fa fa-arrow-circle-right"></i></a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td>No data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                </div>
                                <!--end::Table-->
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
