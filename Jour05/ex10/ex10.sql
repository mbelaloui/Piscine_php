SELECT `title` as `Title`,`summary` as `Summary`, `prod_year` as `Prod_year`  FROM `film`
WHERE (SELECT `id_genre` FROM `genre` WHERE `name` = 'erotic')
ORDER BY `film`.`prod_year` DESC;