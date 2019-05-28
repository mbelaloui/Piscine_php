SELECT * FROM `user_card` 
WHERE   `first_name` like "%-%" OR
        `last_name` like "%-%"
ORDER BY `last_name`, `first_name`