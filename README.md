## GraphQL Order API

Implementação do GraphQL na API Orders utilizando Laravel (Products, Customers, Orders, LineItems);

* GraphQL (definição): Linguagem de consulta que serve de alternativa para arquiteturas REST, além de oferecer um serviço runtime para rodar comandos e consumir uma API.

Requisitos:
- PHP 7.4*;
- Laravel
- Composer;
- MySQL.

Como executar as consultas GraphQL:
- Copiar o arquivo .env.example, renomear pra .env e colocar as configurações do seu banco local
- Executar o comando "php artisan key:generate"
- Executar o comando "php artisan migrate"
- Executar o comando "composer install"
- Executar o comando "php artisan serve" (Endereço do servidor local: "http://127.0.0.1:8000")
- Testar as Queries acessando o endereço local "http://localhost:8000/graphql-playground".
