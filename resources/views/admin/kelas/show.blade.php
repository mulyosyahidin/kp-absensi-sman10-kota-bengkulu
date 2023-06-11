@extends('layouts.metronic')
@section('title', $kela->nama)

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
                        {{ $kela->nama }}</h1>
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
                        <li class="breadcrumb-item text-muted">{{ $kela->nama }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('admin.kelas.index') }}" class="btn btn-sm fw-bold btn-primary">
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
                                    <h3 class="fw-bold m-0">{{ $kela->nama }}</h3>
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
                                                <strong>{{ $kela->id }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Wali Kelas</td>
                                            <td>
                                                <strong>{{ $kela->waliKelas->where('aktif', true)->first()->guru->nama ?? '' }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>
                                                <strong>{{ $kela->nama }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tingkat</td>
                                            <td>
                                                <strong>{{ $kela->tingkat }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jurusan</td>
                                            <td>
                                                <strong>{{ $kela->jurusan->nama }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Siswa</td>
                                            <td>
                                                <strong>{{ $kela->siswa->where('id_tahun_ajaran', $tahunAjaranAktif->id)->count() }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end: Card Body-->
                            <!--begin::Footer-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9 gap-2">
                                <a href="{{ route('admin.kelas.wali-kelas.select', $kela) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-user"></i>
                                    Wali Kelas
                                </a>
                                <a href="{{ route('admin.kelas.edit', $kela) }}" class="btn btn-sm btn-warning">
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
                                    <span class="card-label fw-bold text-gray-800">Riwayat Wali Kelas</span>
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
                                                <th>Semester</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @forelse ($kela->waliKelas as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->guru->nama }}</td>
                                                    <td>{{ $item->tahunAjaran->tahun_ajaran }}</td>
                                                    <td>{{ $item->tahunAjaran->semester == 1 ? 'Ganjil' : 'Genap' }}</td>
                                                    <td>
                                                        @if ($item->aktif)
                                                            <span class="badge badge-success">Aktif</span>
                                                        @else
                                                            <span class="badge badge-secondary">Tidak Aktif</span>
                                                        @endif
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

                        <!--begin::Tables widget 14-->
                        <div class="card card-flush mt-5">
                            <!--begin::Header-->
                            <div class="card-header pt-7 d-flex-justify-content-between">
                                <!--begin::Title-->
                                <h3 class="card-title align-items-start flex-column">
                                    <span class="card-label fw-bold text-gray-800">Siswa</span>
                                </h3>
                                <!--end::Title-->

                                <a href="{{ route('admin.kelas.siswa.select', $kela) }}" class="btn btn-sm btn-info"
                                    style="height: 35px;">
                                    <i class="fa fa-user"></i> Siswa
                                </a>
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
                                                <th>Tahun Ajaran</th>
                                                <th>Nama</th>
                                                <th>NIS</th>
                                                <th>Jenis Kelamin</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @forelse ($kela->siswa->where('id_tahun_ajaran', $tahunAjaranAktif->id) as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->tahunAjaran->tahun_ajaran }}
                                                        ({{ $item->tahunAjaran->semester == 1 ? 'Ganjil' : 'Genap' }})
                                                    </td>
                                                    <td>{{ $item->siswa->nama }}</td>
                                                    <td>{{ $item->siswa->nis }}</td>
                                                    <td>{{ $item->siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
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

@section('custom_html')
    <form action="{{ route('admin.kelas.destroy', $kela) }}" method="post" id="delete-form">
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
