@extends('layouts.metronic')
@section('title', $tahun_ajaran->tahun_ajaran . ' - Edit Tahun Ajaran')

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
                        Edit Tahun Ajaran</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.dashboard') }}" class="text-muted text-hover-primary">Dashboard</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.tahun-ajaran.index') }}" class="text-muted text-hover-primary">Tahun
                                Ajaran</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.tahun-ajaran.show', $tahun_ajaran) }}"
                                class="text-muted text-hover-primary">{{ $tahun_ajaran->tahun_ajaran }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Edit</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('admin.tahun-ajaran.show', $tahun_ajaran) }}" class="btn btn-sm fw-bold btn-primary">
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
                        <form action="{{ route('admin.tahun-ajaran.update', $tahun_ajaran) }}" method="POST"
                           >
                            @csrf
                            @method('PUT')

                            <!--begin::Tables widget 14-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Edit Tahun Ajaran</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Body-->
                                <div class="card-body pt-6 border-top">
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Tahun Ajaran</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="tahun_ajaran"
                                                    value="{{ old('tahun_ajaran', $tahun_ajaran->tahun_ajaran) }}"
                                                    class="form-control @error('tahun_ajaran') is-invalid @enderror"
                                                    required>
                                                <!--end::Input-->

                                                @error('tahun_ajaran')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Semester</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="semester" id="semester"
                                                    class="form-control 2select @error('semester') is-invalid @enderror">
                                                    <option selected disabled>Pilih Semester</option>
                                                    <option value="1"
                                                        {{ old('semester', $tahun_ajaran->semester) == '1' ? 'selected' : '' }}>
                                                        Ganjil</option>
                                                    <option value="2"
                                                        {{ old('semester', $tahun_ajaran->semester) == '2' ? 'selected' : '' }}>
                                                        Genap</option>
                                                </select>
                                                <!--end::Input-->

                                                @error('semester')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Tanggal Mulai</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="date" name="tanggal_mulai"
                                                    value="{{ old('tanggal_mulai', $tahun_ajaran->tanggal_mulai->format('Y-m-d')) }}"
                                                    class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                                    required>
                                                <!--end::Input-->

                                                @error('tanggal_mulai')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Tanggal Selesai</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="date" name="tanggal_selesai"
                                                    value="{{ old('tanggal_selesai', $tahun_ajaran->tanggal_selesai->format('Y-m-d')) }}"
                                                    class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                                    required>
                                                <!--end::Input-->

                                                @error('tanggal_selesai')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>

                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Status</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="status" id="status"
                                            class="form-control 2select @error('status') is-invalid @enderror">
                                            <option selected disabled>Pilih Status</option>
                                            <option value="1"
                                                {{ old('status', $tahun_ajaran->aktif) == '1' ? 'selected' : '' }}>
                                                Aktif (Semester Saat Ini)</option>
                                            <option value="2"
                                                {{ old('status', $tahun_ajaran->aktif) == '2' ? 'selected' : '' }}>
                                                Tidak Aktif</option>
                                        </select>
                                        <!--end::Input-->

                                        @error('status')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->
                                </div>
                                <!--end: Card Body-->
                                <!--begin::Footer-->
                                <div class="card-footer d-flex justify-content-end py-6 px-9">
                                    <button type="submit" class="btn btn-primary"
                                        id="kt_forms_widget_14_submit_button">Simpan</button>
                                </div>
                                <!--end::Footer-->
                            </div>
                            <!--end::Tables widget 14-->
                        </form>
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
