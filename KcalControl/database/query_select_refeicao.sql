SELECT refeicao.nome, refeicao.data, refeicao_alimento.quantidade,
(select alimentos.nome from alimentos where refeicao_alimento.id_alimento = alimentos.id ) as alimento_nome 
FROM `refeicao` inner join refeicao_alimento where refeicao.id = refeicao_alimento.id_refeicao