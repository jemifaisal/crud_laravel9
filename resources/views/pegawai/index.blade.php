<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="bg-light p-5 rounded mt-3">
            <h1>Halaman Pegawai</h1>
            <div class="card">
                <div class="card-body">
                    @if(session('sukses'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('sukses') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <a href="{{ url('/') }}" class="btn btn-warning">Kembali</a>
                    <a href="{{ route('pegawai.create') }}" class="btn btn-primary">Tambah Data</a>
                    <table class="table">
                        <tr>
                            <th>AKSI</th>
                            <th>NIP</th>
                            <th>NAMA</th>
                            <th>JABATAN</th>
                            <th>ALAMAT</th>
                        </tr>

                        @foreach($pegawais as $pegawai)
                            <tr>
                                <td>
                                    <form action="{{ route('pegawai.destroy',$pegawai->id) }}" method="Post">
                                        <a class="btn btn-primary" href="{{ route('pegawai.edit',$pegawai->id) }}">Ubah</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td>{{ $pegawai->nip }}</td>
                                <td>{{ $pegawai->nama }}</td>
                                <td>{{ $pegawai->jabatan->nama }}</td>
                                <td>{{ $pegawai->alamat }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>