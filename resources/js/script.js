function scrollToFilm(filmId) {
    const filmSection = document.getElementById(filmId);
    if (filmSection) {
        filmSection.scrollIntoView({ behavior: 'smooth' });
    }
}

function handleSearch() {
    const searchInput = document.getElementById('searchInput').value.toLowerCase();
    
    if (searchInput) {
        const movies = document.querySelectorAll('.card');
        for (const movie of movies) {
            const movieTitle = movie.querySelector('h2').textContent.toLowerCase();
            if (movieTitle.includes(searchInput)) {
                const filmId = movie.id;
                scrollToFilm(filmId);
                return;
            }
        }
        console.log('Film not found');
    }
}

function openTrailer(trailerId) {
    const trailerMap = {
        'trailer_ancika': 'https://youtu.be/DbOa2bGLNWA?si=10qRrrnyPSXlhjus',
        'trailer_siksa': 'https://youtu.be/C-iH2aQ-ewY?si=U3HBqoZ9vcvv4JtJ',
        'trailer_glenn': 'https://youtu.be/I7OGOQfaFgE?si=Gp2WYY-3qWdphp-Z',
        'trailer_dua_hati': 'https://youtu.be/RxlI5cI93Ug?si=oUgHCfSGjVr2071V',
        'trailer_fall_guys': 'https://youtu.be/QuBnHBLUKPs?si=hPx162BiLXB6-E84',
        'trailer_kingdom': 'https://youtu.be/wlCifmmSAD0?si=8oKJkdNbWwbmMju4',
        'trailer_panda': 'https://youtu.be/_inKs4eeHiI?si=iIYxYRYi3NiwmKrJ',
        'trailer_ghostbusters': 'https://youtu.be/HpOBXh02rVc?si=at83rRIAiwbahYwO',
        'trailer_godzilla': 'https://youtu.be/lV1OOlGwExM?si=QkdT0ZtYOLiQj22X',
        'trailer_jkt48': 'https://youtu.be/XQpA7bqIcyY?si=2jkNH4kbS9ZHqvzS'
    };

    const trailerLink = trailerMap[trailerId];
    if (trailerLink) {
        window.location.href = trailerLink;
    } else {
        console.error('Trailer link not found for ID:', trailerId);
    }
}
