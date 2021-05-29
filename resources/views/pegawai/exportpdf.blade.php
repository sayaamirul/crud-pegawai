<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegawai</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
            <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                         <th scope="col">Nip</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                         <th scope="col">No Telp</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $no=0;
                        @endphp
                      @forelse ($pegawai as $item)
                      @php
                          $no++;
                      @endphp
                        <tr>
                            <td>{{ $no }}</th>
                            <td>{{ $item->golongan->nama }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->jenis_kelamin }}</td>
                            <td>{{ $item->tempat_lahir }}</td>
                            <td>{{ $item->tanggal_lahir }}</td>
                            <td>{{ $item->no_telp }}</td>
                      </tr>
                      @empty
                        <tr>
                            <td colspan="9" class="text-center">Belum Ada Data</td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
        </div>
    </div>
</body>
</html>
