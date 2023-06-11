@extends('layouts.metronic')
@section('title', 'Tahun Ajaran ' . $tahun_ajaran->tahun_ajaran)

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
                        {{ $tahun_ajaran->tahun_ajaran }}</h1>
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
                        <li class="breadcrumb-item text-muted">{{ $tahun_ajaran->tahun_ajaran }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('admin.tahun-ajaran.index') }}" class="btn btn-sm fw-bold btn-primary">
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
                                    <h3 class="fw-bold m-0">{{ $tahun_ajaran->tahun_ajaran }}</h3>
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
                                                <strong>{{ $tahun_ajaran->id }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Ajaran</td>
                                            <td>
                                                <strong>{{ $tahun_ajaran->tahun_ajaran }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td>
                                                <strong>{{ $tahun_ajaran->semester }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Mulai</td>
                                            <td>
                                                <strong>{{ $tahun_ajaran->tanggal_mulai->translatedFormat('l, d M Y') }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Selesai</td>
                                            <td>
                                                <strong>{{ $tahun_ajaran->tanggal_selesai->translatedFormat('l, d M Y') }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                @if ($tahun_ajaran->aktif == 1)
                                                    <span class="badge badge-light-success">Aktif</span>
                                                @else
                                                    <span class="badge badge-secondary">Tidak Aktif</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end: Card Body-->
                            <!--begin::Footer-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9 gap-2">
                                @if (!$tahun_ajaran->aktif)
                                    <a href="{{ route('admin.tahun-ajaran.jadikan-aktif', $tahun_ajaran) }}"
                                        class="btn btn-sm btn-secondary"><i class="fa fa-check"></i>
                                        Jadikan Aktif</a>
                                @endif
                                <a href="{{ route('admin.tahun-ajaran.edit', $tahun_ajaran) }}"
                                    class="btn btn-sm btn-warning">
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
    <form action="{{ route('admin.tahun-ajaran.destroy', $tahun_ajaran) }}" method="post" id="delete-form">
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
