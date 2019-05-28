SELECT
	genre.id_genre as "id_genre",
    genre.name as "name_genre",
    distrib.id_distrib as "id_distrib",
    distrib.name as "name_distrib",
    film.title as "title_film"
FROM
    film
    LEFT JOIN genre ON film.id_genre = genre.id_genre
    LEFT JOIN distrib ON distrib.id_distrib = film.id_distrib
WHERE genre.id_genre >= 4 AND genre.id_genre <= 8;