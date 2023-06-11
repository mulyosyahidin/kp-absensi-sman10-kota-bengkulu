@extends('layouts.metronic')
@section('title', $absensi->judul)

@section('custom_head')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&subset=devanagari,latin-ext');

        ::selection {
            color: #ffffff;
            background-color: #000000;
        }

        ::-moz-selection {
            color: #ffffff;
            background-color: #000000;
        }

        mark {
            color: #ffffff;
            background-color: #000000;
        }

        .checkbox:checked~.background-color {
            background-color: #ffffff;
        }

        .attendance-status [type="checkbox"]:checked,
        .attendance-status [type="checkbox"]:not(:checked),
        .attendance-status [type="radio"]:checked,
        .attendance-status [type="radio"]:not(:checked) {
            position: absolute;
            left: -9999px;
            width: 0;
            height: 0;
            visibility: hidden;
        }

        .attendance-status .checkbox-tools:checked+label,
        .attendance-status .checkbox-tools:not(:checked)+label {
            position: relative;
            display: inline-block;
            padding: 5px;
            width: 110px;
            font-size: 12px;
            line-height: 20px;
            letter-spacing: 1px;
            margin: 0 auto;
            margin-left: 5px;
            margin-right: 5px;
            margin-bottom: 10px;
            text-align: center;
            border-radius: 4px;
            overflow: hidden;
            cursor: pointer;
            text-transform: uppercase;
            color: #000000;
            -webkit-transition: all 300ms linear;
            transition: all 300ms linear;
        }

        .attendance-status .checkbox-tools:not(:checked)+label {
            background-color: #ffffff;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
        }

        .attendance-status .checkbox-tools:checked+label {
            background-color: transparent;
            color: #fff;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .attendance-status .checkbox-tools.status-success:checked+label {
            background-color: #55B559;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .attendance-status .checkbox-tools.status-info:checked+label {
            background-color: #00CAE3;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .attendance-status .checkbox-tools.status-warning:checked+label {
            background-color: #FF9E0F;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .attendance-status .checkbox-tools.status-danger:checked+label {
            background-color: #F55145;
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .attendance-status .checkbox-tools:not(:checked)+label:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .attendance-status .checkbox-tools:checked+label::before,
        .attendance-status .checkbox-tools:not(:checked)+label::before {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 4px;
            background-image: linear-gradient(298deg, #da2c4d, #f8ab37);
            z-index: -1;
        }

        .attendance-status .checkbox-tools:checked+label .uil,
        .attendance-status .checkbox-tools:not(:checked)+label .uil {
            font-size: 24px;
            line-height: 24px;
            display: block;
            padding-bottom: 10px;
        }

        .attendance-status .checkbox:checked~.section .container .row .col-12 .checkbox-tools:not(:checked)+label {
            background-color: #f0eff3;
            color: #1f2029;
            box-shadow: 0 1x 4px 0 rgba(0, 0, 0, 0.05);
        }
    </style>
@endsection

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
                        {{ $absensi->judul }}</h1>
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
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('guru.absensi.index') }}"
                                class="text-muted text-hover-primary">{{ $absensi->pelajaran->nama }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('guru.absensi.show', $absensi) }}"
                                class="text-muted text-hover-primary">{{ $absensi->judul }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Pertemuan ke-{{ $absensi->pertemuan_ke }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('guru.absensi.show', $absensi) }}" class="btn btn-sm fw-bold btn-primary">
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
                        <div class="card card-flush mt-5">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Absensi Siswa</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <form action="{{ route('guru.absensi.simpan-absensi', $absensi) }}" method="post">
                                @csrf

                                <!--begin::Body-->
                                <div class="card-body pt-6">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table
                                            class="table table-row-dashed table-hover table-striped table-bordered align-middle gs-0 gy-3 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>NIS</th>
                                                    <th class="text-center">Kehadiran</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @foreach ($absensi->kelas->siswa as $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item->siswa->nama }}</td>
                                                        <td>{{ $item->siswa->nis }}</td>
                                                        <td>
                                                            <div class="attendance-status text-end">
                                                                <input class="checkbox-tools status-success" type="radio"
                                                                    name="siswa[{{ $item->siswa->id }}]" value="hadir"
                                                                    id="siswa-{{ $item->siswa->id }}-hadir"
                                                                    {{ $absensi->dataAbsensi->where('id_siswa', $item->siswa->id)->first()?->status == 'hadir' ? 'checked' : 'checked' }}>
                                                                <label class="for-checkbox-tools"
                                                                    for="siswa-{{ $item->siswa->id }}-hadir">
                                                                    HADIR
                                                                </label>

                                                                <input class="checkbox-tools status-info" type="radio"
                                                                    name="siswa[{{ $item->siswa->id }}]" value="izin"
                                                                    id="siswa-{{ $item->siswa->id }}-izin"
                                                                    {{ $absensi->dataAbsensi->where('id_siswa', $item->siswa->id)->first()?->status == 'izin' ? 'checked' : '' }}>
                                                                <label class="for-checkbox-tools"
                                                                    for="siswa-{{ $item->siswa->id }}-izin">
                                                                    IZIN
                                                                </label>

                                                                <input class="checkbox-tools status-warning" type="radio"
                                                                    name="siswa[{{ $item->siswa->id }}]" value="sakit"
                                                                    id="siswa-{{ $item->siswa->id }}-sakit"
                                                                    {{ $absensi->dataAbsensi->where('id_siswa', $item->siswa->id)->first()?->status == 'sakit' ? 'checked' : '' }}>
                                                                <label class="for-checkbox-tools"
                                                                    for="siswa-{{ $item->siswa->id }}-sakit">
                                                                    SAKIT
                                                                </label>

                                                                <input class="checkbox-tools status-danger" type="radio"
                                                                    name="siswa[{{ $item->siswa->id }}]" value="alpa"
                                                                    id="siswa-{{ $item->siswa->id }}-alpa"
                                                                    {{ $absensi->dataAbsensi->where('id_siswa', $item->siswa->id)->first()?->status == 'alpa' ? 'checked' : '' }}>
                                                                <label class="for-checkbox-tools"
                                                                    for="siswa-{{ $item->siswa->id }}-alpa">
                                                                    ALPHA
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                    </div>
                                    <!--end::Table-->
                                    <!--begin::Footer-->
                                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                    <!--end::Footer-->
                                </div>
                                <!--end: Card Body-->
                            </form>
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
