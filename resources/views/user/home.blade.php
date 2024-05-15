<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TIXPRO - Home</title>
  <link rel="stylesheet" href="Home.css">
</head>

<body>
  <header>
    <h1><a href="{{ route('user-home') }}">TIXPRO</a></h1>
    <nav>
      <ul>
        <li><a href="Home.html">Home</a></li>
        <li><a href="#">Movies</a></li>
        <li><a href="#">Theaters</a></li>
        <li><a href="Contact Us.html">Contact Us</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <section class="description">
      <img src="img/Cinema.png">
      <h2>Welcome to TIXPRO!</h2>
      <p>Selamat datang di destinasi utama untuk pengalaman nonton bioskop secara daring yang tak tertandingi. Dengan
        koleksi film terbaru dan terpanas, kami mengundang Anda untuk memasuki dunia yang penuh dengan keajaiban
        sinematik. Rasakan kenyamanan dari kursi rumah Anda sendiri sambil menikmati film-film blockbuster terbaru dalam
        kualitas gambar yang menakjubkan. Dari aksi yang mendebarkan hingga drama yang mendalam, kami memiliki semua
        yang Anda inginkan untuk pengalaman nonton bioskop yang tak terlupakan. Siapkan popcorn Anda dan bersiaplah
        untuk terhanyut dalam dunia magis layar lebar.</p>
    </section>

    <section class="movies-list">
      <!-- Mulai Looping Kartu -->
      <?php
      // Misalkan $films adalah array yang berisi data film


      foreach ($films as $film) {
      ?>
      <div class="card">
        <img src="{{ asset('img/poster/' . $film->foto) }}" alt="{{ $film->title }}">
        <div class="info">
          <h2>{{ $film->judul }}</h2>
          <p>{{ $film->durasi }} menit</p>
          <p>{{ $film->genre }}</p>
          <div class="rating">
            <i class="fas fa-star"></i><span>{{ $film->rating }}</span>
          </div>
          <div class="buttons">
            <button class="stream-btn">Beli Tiket</button>
            <button class="trailer-btn" onclick="openTrailer('{{ 'trailer_' . strtolower(str_replace(" ", "_", $film->title)) }}')">Watch Trailer</button>
          </div>
        </div>
      </div>

      <?php
      }
      ?>
      <!-- Selesai Looping Kartu -->
    </section>
  </main>

</body>

</html>
