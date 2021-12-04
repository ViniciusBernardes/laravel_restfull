## Sobre o projeto

- Utilizei laradock para virtualizaçao do servidor e banco de dados
- Para ler a planilha excel foi utilizado a biblioteca Maatwebsite
- Para processar a planilha em background foi criado um job com um delay de 10 segundos para efeito de teste da consulta de retorno do status da planilha
- Foi criado rotas para a busca, atualizaçao e exclusao do registro 
- Criado a migration de criaçao da tabela do banco residuos
- Na importaçao da planilha, foi utilizado recurso da biblioteca Maatwebsite para verificaçao do titulo e das colunas vazia.
- a importaçao da planilha foi fiel a enviada
- Para liberar o job da fila basta executar: php artisan queue:work
- Todos os teste foram realizados no postman

