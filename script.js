const numberOfFilms = prompt('Сколько фильмов было посмотрено'); 

const pesonalMovieDB = {
    count: numberOfFilms,
    movies: {},
    actors: {},
    genres: {},
    privat: false
};

const a = prompt('Один из последних?', ''),
      b = prompt('Насколько оцените его?', ''),      
      c = prompt('Один из последних?', ''),
      d = prompt('Насколько оцените его?', '');

pesonalMovieDB.movies[a] = b;
pesonalMovieDB.movies[c] = d;

console.log(pesonalMovieDB);