SELECT `last_name`, `first_name`, DATE_FORMAT(`birthdate`, "%YYYY-%m-%d") FROM user_card 
WHERE YEAR(`birthdate`) = 1989 ORDER BY `last_name` ASC;