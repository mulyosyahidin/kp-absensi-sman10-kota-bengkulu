@extends('layouts.metronic')
@section('title', $guru->nama . ' - Edit Profil')

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
                        Edit Profil</h1>
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
                        <li class="breadcrumb-item text-muted">Edit Profil</li>
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
                        <form action="{{ route('guru.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!--begin::Tables widget 14-->
                            <div class="card">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title m-0">
                                        <h3 class="fw-bold m-0">Edit Profil</h3>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--begin::Card header-->
                                <!--begin::Body-->
                                <div class="card-body pt-6 border-top">
                                    <h4>User</h4>

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
                                                <input type="text" name="nama" value="{{ old('nama', $guru->nama) }}"
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
                                                    <span>Username</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="username"
                                                    value="{{ old('username', $guru->user->username) }}"
                                                    class="form-control @error('username') is-invalid @enderror" required>
                                                <!--end::Input-->

                                                @error('username')
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
                                                    <span>Email</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="email" name="email"
                                                    value="{{ old('email', $guru->user->email) }}"
                                                    class="form-control @error('email') is-invalid @enderror" required>
                                                <!--end::Input-->

                                                @error('email')
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
                                                    <span>Password</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror">
                                                <!--end::Input-->

                                                <small class="text-muted">Masukan password baru jika ingin mengganti
                                                    password lama.</small>

                                                @error('password')
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
                                            <span>Foto Profil</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="file" name="picture"
                                            class="form-control @error('picture') is-invalid @enderror">
                                        <!--end::Input-->

                                        @error('picture')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <!--end::Input group-->

                                    <h4>Data Guru</h4>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <!--begin::Input group-->
                                            <div class="fv-row mb-7">
                                                <!--begin::Label-->
                                                <label class="fs-6 fw-semibold form-label mt-3">
                                                    <span>NIP</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="nip" value="{{ old('nip', $guru->nip) }}"
                                                    class="form-control @error('nip') is-invalid @enderror">
                                                <!--end::Input-->

                                                @error('nip')
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
                                                    <span>NUPTK</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="nuptk"
                                                    value="{{ old('nuptk', $guru->nuptk) }}"
                                                    class="form-control @error('nuptk') is-invalid @enderror">
                                                <!--end::Input-->

                                                @error('nuptk')
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
                                                    <span>Tempat Lahir</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="text" name="tempat_lahir"
                                                    value="{{ old('tempat_lahir', $guru->tempat_lahir) }}"
                                                    class="form-control @error('tempat_lahir') is-invalid @enderror">
                                                <!--end::Input-->

                                                @error('tempat_lahir')
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
                                                    <span>Tanggal Lahir</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <input type="date" name="tanggal_lahir"
                                                    value="{{ old('tanggal_lahir', $guru->tanggal_lahir?->format('Y-m-d')) }}"
                                                    class="form-control @error('tanggal_lahir') is-invalid @enderror">
                                                <!--end::Input-->

                                                @error('tanggal_lahir')
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
                                                    <span>Jenis Kelamin</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="jenis_kelamin" id="jenis-kelamin"
                                                    class="2select form-control @error('jenis_kelamin') is-invalid @enderror">
                                                    <option value="">Pilih Jenis Kelamin</option>
                                                    <option value="L"
                                                        @if (old('jenis_kelamin', $guru->jenis_kelamin) == 'L') selected @endif>Laki-laki
                                                    </option>
                                                    <option value="P"
                                                        @if (old('jenis_kelamin', $guru->jenis_kelamin) == 'P') selected @endif>Perempuan
                                                    </option>
                                                </select>
                                                <!--end::Input-->

                                                @error('jenis_kelamin')
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
                                                    <span>Agama</span>
                                                </label>
                                                <!--end::Label-->
                                                <!--begin::Input-->
                                                <select name="agama" id="agama"
                                                    class="2select form-control @error('agama') is-invalid @enderror">
                                                    <option selected disabled>Pilih Agama</option>
                                                    <option value="Islam"
                                                        @if (old('agama', $guru->agama) == 'Islam') selected @endif>Islam</option>
                                                    <option value="Kristen"
                                                        @if (old('agama', $guru->agama) == 'Kristen') selected @endif>Kristen</option>
                                                    <option value="Protestan"
                                                        @if (old('agama', $guru->agama) == 'Protestan') selected @endif>Protestan
                                                    </option>
                                                    <option value="Hindu"
                                                        @if (old('agama', $guru->agama) == 'Hindu') selected @endif>Hindu</option>
                                                    <option value="Buddha"
                                                        @if (old('agama', $guru->agama) == 'Buddha') selected @endif>Buddha</option>
                                                    <option value="Kong Hu Chu"
                                                        @if (old('agama', $guru->agama) == 'Kong Hu Chu') selected @endif>Kong Hu Chu
                                                    </option>
                                                    <option value="Lainnya"
                                                        @if (old('agama', $guru->agama) == 'Lainnya') selected @endif>Lainnya</option>
                                                </select>
                                                <!--end::Input-->

                                                @error('agama')
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
                                            <span>Alamat</span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <textarea name="alamat" id="alamat" class="form-control @error('alamat') is-invalid @enderror">{{ old('alamat') }}</textarea>
                                        <!--end::Input-->

                                        @error('alamat')
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
