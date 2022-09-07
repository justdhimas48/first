<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .col-xs-1,
        .col-sm-1,
        .col-md-1,
        .col-lg-1,
        .col-xs-2,
        .col-sm-2,
        .col-md-2,
        .col-lg-2,
        .col-xs-3,
        .col-sm-3,
        .col-md-3,
        .col-lg-3,
        .col-xs-4,
        .col-sm-4,
        .col-md-4,
        .col-lg-4,
        .col-xs-5,
        .col-sm-5,
        .col-md-5,
        .col-lg-5,
        .col-xs-6,
        .col-sm-6,
        .col-md-6,
        .col-lg-6,
        .col-xs-7,
        .col-sm-7,
        .col-md-7,
        .col-lg-7,
        .col-xs-8,
        .col-sm-8,
        .col-md-8,
        .col-lg-8,
        .col-xs-9,
        .col-sm-9,
        .col-md-9,
        .col-lg-9,
        .col-xs-10,
        .col-sm-10,
        .col-md-10,
        .col-lg-10,
        .col-xs-11,
        .col-sm-11,
        .col-md-11,
        .col-lg-11,
        .col-xs-12,
        .col-sm-12,
        .col-md-12,
        .col-lg-12 {
            border: 0;
            padding: 0;
            margin-left: -0.00001;
        }

    </style>
</head>

<body class="m-4">
    <div>
        <p>Pencarian Pegawai : {{ app('request')->input('search') }}</p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="table-layout: fixed">
            <thead>
                <tr>
                    <th style="width: 3%">#</th>
                    <th style="width: 12%">Nama</th>
                    <th style="width: 25%">Foto</th>
                    <th style="width: 10%">Jenis Kelamin</th>
                    <th style="width: 10%">Jurusan</th>
                    <th style="width: 10%">Status</th>
                    <th style="width: 10%">Lama Bekerja</th>
                    <th style="width: 20%">Pendidikan</th>
                </tr>
            </thead>

            <tbody>
                <?php $no = 1; ?>

                @forelse($pegawai as $item)
                    <tr>
                        <td>{{ $no }}</td>
                        <td>{{ $item->nama }}</td>
                        <td class="text-center">
                            <img height="125px" src="{{ asset($item->foto_diri) }}" alt="">
                        </td>
                        <td>{{ $item->jenis_kelamin == 0 ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->status == 0 ? 'Tidak Bekerja' : 'Sedang Bekerja' }}</td>
                        <td>{{ $item->lama_bekerja }} bulan</td>
                        <td>
                            Pendidikan S1 : {{ $item->pendidikan_s1 ?? '-' }} <br>
                            Pendidikan S2 : {{ $item->pendidikan_s2 ?? '-' }} <br>
                            Pendidikan S3 : {{ $item->pendidikan_s3 ?? '-' }}
                        </td>
                    </tr>
                    <?php $no++; ?>

                @empty
                    <tr>
                        <td colspan="4"> Tidak ada data.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <script>
        window.print();
        setTimeout(function() {
            window.close();
        }, 500);
    </script>
</body>

</html>
