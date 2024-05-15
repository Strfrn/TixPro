<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Studio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  </head>
  <body class="bg-light">
    <main class="container">
       <!-- START FORM -->
       <form action="{{ route('studio.update',$studio->id)}}" method='Post' enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="m-0">EDIT STUDIO</h1>
            <a href="{{ route('studio.index') }}" class="btn btn-danger">Back</a>
        </div>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ $studio->nama }}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="foto" accept="image/*" value="{{ $studio->foto }}" id="foto" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="durasi" class="col-sm-2 col-form-label">Lokasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='lokasi' value="{{ $studio->lokasi }}" id="lokasi">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">UPDATE</button></div>
            </div>
          </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 document.addEventListener("DOMContentLoaded", function() {
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    @endif
});
</script>
        <!-- AKHIR FORM -->

        <!-- START DATA -->
  {{--       <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='' class="btn btn-primary">+ Tambah Data</a>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-2">Judul</th>
                            <th class="col-md-2">Sinopsis</th>
                            <th class="col-md-2">Durasi</th>
                            <th class="col-md-2">Genre</th>
                            <th class="col-md-2">Tahun Rilis</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($films as $film)
                            <tr>
                                <td>{{ $film->judul }}</td>
                                <td>{{ $film->sinopsis }}</td>
                                <td>{{ $film->durasi }}</td>
                                <td>{{ $film->genre }}</td>
                                <td>{{ $film->tahun_rilis }}</td>
                                <td>
                                    <a href="{{ route('film.edit',['id' => $film->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

          </div>
          <!-- AKHIR DATA -->
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 document.addEventListener("DOMContentLoaded", function() {
    @if(session('error'))
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    @endif
});
</script>
  </body>
</html>
 --}}
