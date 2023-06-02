@extends('layouts.metronic')
@section('title', $absensi->judul)

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
                        <li class="breadcrumb-item text-muted">{{ $absensi->judul }}</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('guru.absensi.pertemuan', ['kelas' => $absensi->kelas, 'pelajaran' => $absensi->pelajaran]) }}"
                        class="btn btn-sm fw-bold btn-primary">
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
                                    <h3 class="fw-bold m-0">{{ $absensi->nama }}</h3>
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
                                                <strong>{{ $absensi->id }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>
                                                @if ($absensi->status == 'draft')
                                                    <span class="badge badge-secondary">Belum disimpan</span>
                                                @else
                                                    <span class="badge badge-success">Disimpan</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>
                                                <strong>{{ $absensi->kelas->nama }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pelajaran</td>
                                            <td>
                                                <strong>{{ $absensi->pelajaran->nama }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Judul</td>
                                            <td>
                                                <strong>{{ $absensi->judul }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pertemuan Ke</td>
                                            <td>
                                                <strong>{{ $absensi->pertemuan_ke }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>
                                                <strong>{{ $absensi->tanggal->translatedFormat('l, d M Y') }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td>
                                                <strong>{{ $absensi->deskripsi }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end: Card Body-->
                            <!--begin::Footer-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9 gap-2">
                                <a href="{{ route('guru.absensi.absensi', $absensi) }}" class="btn btn-sm btn-info">
                                    <i class="fa fa-list"></i>
                                    Absensi
                                </a>
                                <a href="{{ route('guru.absensi.edit', $absensi) }}" class="btn btn-sm btn-warning">
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
                                    <span class="card-label fw-bold text-gray-800">Absensi Siswa</span>
                                </h3>
                                <!--end::Title-->
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body pt-6">
                                <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Ringkasan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Absensi</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <canvas id="kt_chartjs_3" class="mh-400px"></canvas>
                                            </div>
                                            <div class="card-footer text-center">
                                                @foreach ($dataGrafik as $key => $count)
                                                    <span class="badge badge-secondary">{{ $count }}
                                                        {{ $key }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                        <!--begin::Table container-->
                                        <div class="table-responsive">
                                            <!--begin::Table-->
                                            <table
                                                class="table table-row-dashed table-hover table-striped table-bordered align-middle gs-0 gy-3 my-0"
                                                id="datatable">
                                                <!--begin::Table head-->
                                                <thead>
                                                    <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>NISN</th>
                                                        <th>Absensi</th>
                                                    </tr>
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody>
                                                    @forelse ($absensi->dataAbsensi as $item)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $item->siswa->nama }}</td>
                                                            <td>{{ $item->siswa->nisn }}</td>
                                                            <td>{!! attendanceBadge($item->status) !!}</td>
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
                                </div>
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
    <form action="{{ route('guru.absensi.destroy', $absensi) }}" method="post" id="delete-form">
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

    <script>
        var ctx = document.getElementById('kt_chartjs_3');

        // Define colors
        var primaryColor = KTUtil.getCssVariableValue('--bs-primary');
        var dangerColor = KTUtil.getCssVariableValue('--bs-danger');
        var successColor = KTUtil.getCssVariableValue('--bs-success');
        var warningColor = KTUtil.getCssVariableValue('--bs-warning');
        var infoColor = KTUtil.getCssVariableValue('--bs-info');

        console.log(primaryColor);

        // Define fonts
        var fontFamily = KTUtil.getCssVariableValue('--bs-font-sans-serif');

        // Chart labels
        const labels = ['Hadir', 'Izin', 'Sakit', 'Alpa'];

        // Chart data
        const data = {
            labels: labels,
            datasets: [{
                data: [
                    @foreach ($dataGrafik as $count)
                        {{ $count }},
                    @endforeach
                ],
                backgroundColor: [successColor, infoColor, warningColor, dangerColor]
            }]
        };

        // Chart config
        const config = {
            type: 'pie',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: false,
                    }
                },
                responsive: true,
            },
            defaults: {
                global: {
                    defaultFont: fontFamily
                }
            }
        };

        // Init ChartJS -- for more info, please visit: https://www.chartjs.org/docs/latest/
        var myChart = new Chart(ctx, config);
    </script>

    <script>
        $('#datatable').DataTable({
            dom: '<"d-flex justify-content-between"<"left"l>f>rt<"d-flex justify-content-between"ip><"clear">',
        });
    </script>
@endpush
