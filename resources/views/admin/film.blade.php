    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Film</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>
    <body class="bg-light">
        <main class="container">
        <!-- START FORM -->
        <form action="{{ route('film.store')}}" method='Post' enctype="multipart/form-data">
            @csrf
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1 class="m-0">KELOLA FILM</h1>
                <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
            </div>
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='judul' value="{{ old('judul') }}" id="judul">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="sinopsis" class="col-sm-2 col-form-label">Sinopsis</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="sinopsis" id="sinopsis" rows="5"> {{ old('sinopsis') }}"</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" name="foto" value="" accept="image/*" id="foto" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="rating" class="col-sm-2 col-form-label">rating</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="rating" value="{{ old('rating') }}"  id="rating" >
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="durasi" class="col-sm-2 col-form-label">Durasi</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name='durasi' value="{{ old('durasi') }}" id="durasi">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='genre' value="{{ old('genre') }}" id="genre">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tahun_rilis" class="col-sm-2 col-form-label">Tahun Rilis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='tahun_rilis' value="{{ old('tahun_rilis') }}" id="tahun_rilis">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="link" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='link' value="{{ old('link') }}" id="link">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
                </div>
            </form>
            </div>
            <!-- AKHIR FORM -->

            <!-- START DATA -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                    <!-- FORM PENCARIAN -->
                    <div class="pb-3">
                    <form class="d-flex" action="" method="get">
                        <input class="form-control me-1" type="search" name="katakunci" placeholder="Masukkan kata kunci" aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </form>
                    </div>

                    <!-- TOMBOL TAMBAH DATA -->
                    <div class="pb-3">
                    <h3>Daftar Film</h3>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-md-2">Judul</th>
                                <th class="col-md-5">Sinopsis</th>
                                <th class="col-md-2">Foto</th>
                                <th class="col-md-2">rating</th>
                                <th class="col-md-2">Durasi</th>
                                <th class="col-md-1">Genre</th>
                                <th class="col-md-2">Tahun Rilis</th>
                                <th class="col-md-2">Link</th>
                                <th class="col-md-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($films as $film)
                                <tr>
                                    <td>{{ $film->judul }}</td>
                                    <td>{{ $film->sinopsis }}</td>
                                    <td><img src="{{ asset('img/poster/' . $film->foto) }}" alt="Foto Film" class="img-fluid"></td>
                                    <td>{{ $film->rating }}</td>
                                    <td>{{ $film->durasi }}</td>
                                    <td>{{ $film->genre }}</td>
                                    <td>{{ $film->tahun_rilis }}</td>
                                    <td>{{ $film->link }}</td>
                                    <td>
                                        <div class="d-flex flex-column">
                                            <a href="{{ route('film.edit', $film->id) }}" class="btn btn-warning btn-sm mb-2">Edit</a>
                                            <form id="delete-form-{{ $film->id }}" action="{{ route('film.destroy', $film->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger btn-sm mb-2" onclick="confirmDelete('{{ $film->id }}')">Delete</button>
                                            </form>
                                        </div>


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
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: "Apakah kamu yakin",
                text: "aksi ini tidak bisa dibatalkan",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "batal",
                confirmButtonText: "Ya,hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                    Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}'
            });
                }
            });
        }
    </script>
    </body>
    </html>
