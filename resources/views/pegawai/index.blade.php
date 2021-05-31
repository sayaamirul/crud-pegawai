@extends('layouts.admin')

@section('title')
    Pegawai
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success d-block">{{ session('success') }}</div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <a href="{{ route('pegawai.create') }}" class="btn btn-primary"><i class="fa fa-plus"> Tambah Pegawai</i></a>
                         <a href="{{ route('export.pdf') }}" class="btn btn-danger"><i class="fa fa-file-pdf"> Export PDF</i></a>
                         <a href="{{ route('export.excel') }}" class="btn btn-success"><i class="fa fa-file-excel"> Export excel</i></a>
                    </h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right"
                                   placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Golongan</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($pegawai as $item)
                            <tr>
                                <td>{{ $item->nip }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->golongan->nama }}</td>
                                <td>{{ $item->jenis_kelamin }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    <a id="delete" data-id="{{ $item->id }}" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Belum Ada Data</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function () {
            $('.delete').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                console.log(id);
                Swal.fire({
                    title: 'Kamu yakin hapus data ini?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Oke, Hapus!',
                    cancelButtonText: 'Batalkan',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: 'DELETE',
                            url: '/pegawai/'+ id,
                            data: {
                                'id': id,
                                '_token': "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                console.log(response)
                                Swal.fire(
                                    'Dihapus!',
                                    'Data berhasil dihapus.',
                                    'success'
                                )

                                location.reload(true);
                            },
                        });
                    }
                })
            })
        })
    </script>
@endpush
