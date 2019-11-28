/*Qual o local público onde estão registadas mais anomalias?*/

with count_places as(
    select local.nome, count(local.nome)
    from local_publico as local, item as it, anomalia as anom, incidencia as inc
    where it.id = inc.item_id
    and anom.id = inc.anomalia_id
    and it.latitude = local.latitude
    and it.longitude = local.longitude
    group by local.nome),
max_count as(
    select MAX(count)
    from count_places
)
select count_p.nome 
from count_places as count_p, max_count as max_c
where max_c.max = count_p.count;

