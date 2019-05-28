(SELECT UPPER(`last_name`) as "NAME", `first_name`, `price`
FROM (user_card INNER JOIN member
       ON member.id_user_card = user_card.id_user
) INNER JOIN subscription
ON subscription.id_sub = member.id_sub WHERE subscription.price > 42)
ORDER BY `last_name` ASC, `first_name`ASC;