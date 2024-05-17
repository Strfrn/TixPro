<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TIXPRO - Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous">
  <link rel="stylesheet" href="Home.css">
</head>

<body>
  <header>
    <h1><a href="{{ route('user-home') }}">TIXPRO</a></h1>
    <nav>
      <ul>
        <li><a href="Home.html">Home</a></li>
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
      foreach ($films as $film) {
      ?>
      <div class="card">
          <img src="{{ asset('img/poster/' . $film->foto) }}" alt="{{ $film->title }}">
          <div class="info">
              <h2>{{ $film->judul }}</h2>
              <p>{{ $film->durasi }} menit</p>
              <p>{{ $film->genre }}</p>
              <div class="buttons">
                  <a href="{{ route('beli-tiket', ['id' => $film->id]) }}"><button class="stream-btn">Beli Tiket</button></a>
                  <span class="rating">
                    {{ number_format($film->rating, 1) }} <i class="fas fa-star"></i>
                </span>
                  <div class="buttons">
                </div>
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
