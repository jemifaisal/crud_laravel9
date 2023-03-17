<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <div class="bg-light p-5 rounded mt-3">
            <h1>Halaman Tambah Pegawai</h1>
            <div class="card">
                <div class="card-body">
                    <p>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-primary">Kembali</a>
                    </p>
                    <div class="col-md-6">
                        <form action="{{ route('pegawai.store') }}" method="post">
                            @csrf
                            <p>    
                                <label>NIP</label>
                                <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip') }}">
                            </p>
                            <p>    
                                <label>NAMA</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
                            </p>
                            <p>    
                                <label>JABATAN</label>
                                <select name="jabatan_id" id="jabatan_id" class="form-control">
                                    <option disabled selected>--Pilih Jabatan--</option>
                                    @foreach($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                    @endforeach
                                </select>
                            </p>
                            <p>    
                                <label>ALAMAT</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{ old('alamat') }}</textarea>
                            </p>
                            <p>
                                <button type="submit" class="btn btn-success">SIMPAN</button>
                            </p>
                        </form>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>