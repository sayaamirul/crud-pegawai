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
    <div class="wrapper">
    <div class="box">
        <div class="box-header">
           <center> Data Pegawai Kabupaten Sidoarjo</center>
           <br>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Golongan</th>
                        <th>Nama</th>
                        <th>Email</th>
                         <th>Nip</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Lahir</th>
                        <th>Tanggal Lahir</th>
                         <th>No Telp</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no=0;

                    @endphp
                    @foreach ($pegawai as $item)
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
                    @endforeach

                </tbody>

            </table>
        </div>
    </div>

   </div>
     <footer class="fixed-bottom">
         <span class="blockquote-footer"> Printed by Kabupaten Sidoarjo </span>
     </footer>
</body>
</html>
