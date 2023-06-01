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
                            <a href="{{ route('admin.pelajaran.index') }}"
                                class="text-muted text-hover-primary">Pelajaran</a>
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
                    <a href="{{ route('admin.pelajaran.index') }}" class="btn btn-sm fw-bold btn-primary">
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
                            <!--begin::Footer-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9 gap-2">
                                <a href="#" class="btn btn-sm btn-info">
                                    <i class="fa fa-user"></i>
                                    Guru Mata Pelajaran
                                </a>
                                <a href="{{ route('admin.pelajaran.edit', $pelajaran) }}" class="btn btn-sm btn-warning">
                                    <i class="fa fa-edit"></i>
                                    Edit
                                </a>
                                <a href="#" class="btn btn-sm btn-danger btn-delete">
                                    <i class="fa fa-trash"></i>
                                    Hapus
                                </a>
                            </div>
                            <!--end::Footer-->
                        </div>
                        <!--end::Tables widget 14-->

                        <!--begin::Tables widget 14-->
                        <div class="card card-flush mt-5">
                            <!--begin::Header-->
                            <div class="card-header pt-7">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Guru Mata Pelajaran</span>
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
                                                <th>Tahun Ajaran</th>
                                                <th>Kelas</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
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

@section('custom_html')
    <form action="{{ route('admin.pelajaran.destroy', $pelajaran) }}" method="post" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
@endsection

@push('custom_js')
    <script>
        let btnDelete = document.querySelector('.btn-delete');

        btnDelete.addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Hapus Data?',
                text: "Yakin ingin menghapus data? Data yang sudah dihapus tidak dapat dikembalikan.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Hapus',
            }).then((result) => {
                if (result.isConfirmed) {
                    let deleteForm = document.querySelector('#delete-form');

                    deleteForm.submit();
                }
            })
        });
    </script>
@endpush
