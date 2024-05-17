<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Tiket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('tiket.css')}}">
</head>
<body>
    <div class="container">
        <div class="trailer">
            <iframe src="{{ $film->link }}"></iframe>
        </div>
        
        <aside>
            @foreach ($films as $film)
            <div class="card">
                <img src="{{ asset('img/poster/' . $film->foto) }}" alt="{{ $film->title }}">
                <div class="info">
                    <h2>{{ $film->judul }}</h2>
                    <p>{{ $film->durasi }} menit</p>
                    <p>{{ $film->genre }}</p>
                    <div class="buttons">
                        <a href="{{ route('beli-tiket', ['id' => $film->id]) }}">
                            <button class="stream-btn">Beli Tiket</button>
                        </a>
                        <span class="rating">
                            {{ number_format($film->rating, 1) }} <i class="fas fa-star"></i>
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </aside>
    </div>
</body>
</html>
