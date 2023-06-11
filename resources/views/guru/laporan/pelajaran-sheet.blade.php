<table>
    <thead>
        <tr>
            <th rowspan="2" style="font-weight: bold; vertical-align: middle; font-size: 13px;">#</th>
            <th rowspan="2" style="font-weight: bold; vertical-align: middle; font-size: 13px;">NAMA</th>
            <th rowspan="2" style="font-weight: bold; vertical-align: middle; font-size: 13px;">NIS</th>
            <th rowspan="2" style="font-weight: bold; text-align: center; vertical-align: middle; font-size: 13px;">L/P
            </th>
            <th colspan="{{ $absensi->count() }}"
                style="min-width: 380px; font-weight: bold; text-align: center; font-size: 13px;">
                PERTEMUAN
            </th>
            <th colspan="4" style="font-weight: bold; text-align: center; font-size: 13px;">TOTAL</th>
            <th rowspan="2"
                style="width: 120px; text-align: center; font-weight: bold; vertical-align: middle; font-size: 13px;">%
                KEHADIRAN</th>
        </tr>
        <tr>
            @forelse ($absensi as $item)
                <th style="text-align: center;">
                    {{ $item->pertemuan_ke }}
                </th>
            @empty
                <th style="text-align: center;">No data</th>
            @endforelse
            <th style="text-align: center;">HADIR</th>
            <th style="text-align: center;">IZIN</th>
            <th style="text-align: center;">SAKIT</th>
            <th style="text-align: center;">ALPHA</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($kelas->siswa->where('id_tahun_ajaran', dataTahunAjaranAktif()->id) as $item)
            @php
                $total = [
                    'hadir' => 0,
                    'izin' => 0,
                    'sakit' => 0,
                    'alpa' => 0,
                ];
            @endphp

            <tr>
                <td style="width: 20px;">{{ $loop->iteration }}</td>
                <td style="width: 300px">{{ ucwords(strtolower($item->siswa->nama)) }}</td>
                <td style="width: 100px">{{ $item->siswa->nis }}</td>
                <td style="text-align: center;">{{ $item->siswa->jenis_kelamin }}</td>
                @forelse ($absensi as $data)
                    @php($status = $data->dataAbsensi->where('id_siswa', $item->siswa->id)->first()?->status)
                    @php($total[$status]++)

                    <td style="text-align: center;">{{ statusShortName($status) }}</td>
                @empty
                    <td style="text-align: center;"></td>
                @endforelse
                <td style="text-align: center;">{{ $total['hadir'] }}</td>
                <td style="text-align: center;">{{ $total['izin'] }}</td>
                <td style="text-align: center;">{{ $total['sakit'] }}</td>
                <td style="text-align: center;">{{ $total['alpa'] }}</td>
                <td style="text-align: center;">
                    {{ round(($total['hadir'] / ($absensi->count() == 0 ? 1 : $absensi->count())) * 100, 2) }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
