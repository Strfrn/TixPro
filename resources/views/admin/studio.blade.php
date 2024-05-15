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
    <form action="{{ route('studio.store')}}" method='Post' enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="m-0">KELOLA STUDIO</h1>
            <a href="{{ route('home') }}" class="btn btn-danger">Back</a>
        </div>
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ old('nama') }}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="foto" accept="image/*" id="foto" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='lokasi' value="{{ old('lokasi') }}" id="lokasi">
                </div>
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
                <h3>Daftar Studio</h3>
                </div>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-2">Nama Studio</th>
                            <th class="col-md-5">Foto</th>
                            <th class="col-md-2">Lokasi</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($studios as $studio)
                            <tr>
                                <td>{{ $studio->nama }}</td>
                                \
                                <td><img src="{{ asset('img/' . $studio->foto) }}" alt="Foto Studio" class="img-fluid"></td>
                                <td>{{ $studio->lokasi }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('studio.edit', $studio->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                                        <form id="delete-form-{{ $studio->id }}" action="{{ route('studio.destroy',$studio->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $studio->id }}')">Delete</button>
                                        </form>


                                    </form>
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
