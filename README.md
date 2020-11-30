## Teste Laravel para vaga de Analista de sistemas

### O teste consiste na criação de um blog, com 3 cruds e 2 relacionamentos, sendo os cruds de categoria, autores e noticias, a tabela autores se relaciona com a tabela noticias (1:N), e a tabela categoria se relaciona com a tabela noticia (N:N). Foi criado também o sistema de login.

## Requisitos
```bash
PHP >= 7.3
```
```bash
Composer 
```
```bash
Laravel 8.x
```
```bash
Banco mySQL ou MARIADB
```

## Instalação

```bash
Configure o .env de acordo com os dados do seu banco.
```
```bash
Suba o banco de dados que está nesse arquivo (blog.sql), ou dentro da pasta do projeto execute: php artisan migrate.
```
```bash
Caso obte por gerar automaticamente o banco, execute o comando: artisan db:seed para gerar o login
```
```bash
Execute o servidor: php artisan serve
```
```bash
Login: carlos@carlos
senha: carlos
```