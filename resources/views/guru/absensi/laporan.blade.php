@extends('layouts.metronic')
@section('title', 'Laporan Absensi Kelas ' . $kelas->nama . ' Pelajaran ' . $pelajaran->nama)

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
                        Laporan Absensi Kelas {{ $kelas->nama }} Pelajaran {{ $pelajaran->nama }}
                    </h1>
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
                                class="text-muted text-hover-primary">{{ $pelajaran->nama }}</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Laporan</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
                <!--begin::Actions-->
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Primary button-->
                    <a href="{{ route('guru.absensi.pelajaran', ['kelas' => $kelas->id]) }}"
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
                                    <h3 class="fw-bold m-0">Laporan Absensi</h3>
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
                                            <td>Kelas</td>
                                            <td>
                                                <strong>{{ $kelas->nama }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pelajaran</td>
                                            <td>
                                                <strong>{{ $pelajaran->nama }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pertemuan</td>
                                            <td>
                                                <strong>{{ $absensi->count() }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end: Card Body-->
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
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table
                                        class="table table-row-dashed table-hover table-bordered align-middle gs-0 gy-3 my-0"
                                        id="datatable">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center">#</th>
                                                <th rowspan="2">Nama</th>
                                                <th rowspan="2">NISN</th>
                                                <th colspan="{{ $absensi->count() }}" class="text-center">Pertemuan
                                                </th>
                                                <th colspan="4" class="text-center">Total</th>
                                                <th rowspan="2" class="text-center">% KEHADIRAN</th>
                                            </tr>
                                            <tr class="fs-7 fw-bold text-gray-400 border-bottom-0">
                                                @forelse ($absensi as $item)
                                                    <th class="text-center">
                                                        {{ $item->pertemuan_ke }}
                                                    </th>
                                                @empty
                                                    <th class="text-center">No data</th>
                                                @endforelse
                                                <th class="text-center">HADIR</th>
                                                <th class="text-center">IZIN</th>
                                                <th class="text-center">SAKIT</th>
                                                <th class="text-center">ALPHA</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @foreach ($kelas->siswa->where('id_tahun_ajaran', dataTahunAjaranAktif()->id) as $item)
                                                @php($total = [
                                                    'hadir' => 0,
                                                    'izin' => 0,
                                                    'sakit' => 0,
                                                    'alpa' => 0,
                                                ])
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td>{{ $item->siswa->nama }}</td>
                                                    <td>{{ $item->siswa->nisn }}</td>
                                                    @forelse ($absensi as $data)
                                                        @php($status = $data->dataAbsensi->where('id_siswa', $item->siswa->id)->first()?->status)
                                                        @php($total[$status]++)
                                                        <td class=" text-center">{!! kehadiranBadge($status) !!}</td>
                                                    @empty
                                                        <td></td>
                                                    @endforelse
                                                    <td class="text-center">{{ $total['hadir'] }}</td>
                                                    <td class="text-center">{{ $total['izin'] }}</td>
                                                    <td class="text-center">{{ $total['sakit'] }}</td>
                                                    <td class="text-center">{{ $total['alpa'] }}</td>
                                                    <td class="text-center">
                                                        {{ round($total['hadir'] / ($absensi->count() == 0 ? 1 : $absensi->count()) * 100, 2) }}
                                                    </td>
                                                </tr>                                                
                                            @endforeach
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

@push('custom_js')
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
