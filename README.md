## Projeto feito para desafio técnico

Feito com PHP 8.3, laravel 11 e PostgreSQL 15.7
Para testes é necessário ter o docker e o docker compose instalado.

Para rodar este projeto execute os seguintes comandos:

## Instalando   o projeto:

git clone https://github.com/JulianoPiresSantos/biblioteca

cd biblioteca

cp .env-example .env

docker compose up -d --build

acessar o sistema pela seguinte url: http://localhost

## Testando o projeto:

Para rodar os testes automatizados execute o comando:

docker compose exec -it biblioteca-laravel.test-1 php artisan test --env=testing

## Conectando com o banco:

Para conectar o banco de dados, use as seguintes credenciais:

user: sail

password: password

database: laravel
