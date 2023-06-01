@extends('layouts.metronic')
@section('title', $kela->nama . ' - Edit Kelas')

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
                        Edit Kelas</h1>
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
                            <a href="{{ route('admin.kelas.index') }}" class="text-muted text-hover-primary">Kelas</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="{{ route('admin.kelas.show', $kela) }}"
                                class="text-muted text-hover-primary">{{ $kela->nama }}</a>
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
                    <a href="{{ route('admin.kelas.show', $kela) }}" class="btn btn-sm fw-bold btn-primary">
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
                        <form action="{{ route('admin.kelas.update', $kela) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!--begin::Tables widget 14-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Edit Kelas</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Body-->
                                <div class="card-body pt-6 border-top">
                                    <!--begin::Input group-->
                                    <div class="fv-row mb-7">
                                        <!--begin::Label-->
                                        <label class="fs-6 fw-semibold form-label mt-3">
                                            <span>Jurusan</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <select name="id_jurusan" id="jurusan"
                                            class="form-control 2select @error('id_jurusan') is-invalid @enderror">
                                            <option selected disabled>Pilih Jurusan</option>
                                            @foreach ($jurusan as $item)
                                                <option value="{{ $item->id }}"
                                                    @if (old('id_jurusan', $kela->id_jurusan) == $item->id) selected @endif>{{ $item->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <!--end::Input-->

                                        @error('id_jurusan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->

                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>Nama</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="nama" value="{{ old('nama', $kela->nama) }}"
                                                    class="form-control @error('nama') is-invalid @enderror" required>
                                                <!--end::Input-->

                                                @error('nama')
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
                                                    <span>Tingkat</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="tingkat" id="tingkat"
                                                    class="form-control 2select @error('tingkat') is-invalid @enderror">
                                                    <option selected disabled>Pilih Tingkat</option>
                                                    <option value="1"
                                                        @if (old('tingkat', $kela->tingkat) == '1') selected @endif>X</option>
                                                    <option value="2"
                                                        @if (old('tingkat', $kela->tingkat) == '2') selected @endif>XI</option>
                                                    <option value="3"
                                                        @if (old('tingkat', $kela->tingkat) == '3') selected @endif>XII</option>
                                                </select>
                                                <!--end::Input-->

                                                @error('tingkat')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                    </div>
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
