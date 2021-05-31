<h1 align="center">IBank - Sistema de gerencimaneto de contas</h1>

## Sobre o IBank

Tenha todas informações de suas contas bancárias com apenas um app. Com ele, poderás saber os saldos de cada conta, e simular ações como sacar, depositar e transferir saldos de uma conta para outra de forma simples e rápida. 

## Pré-requisios

Antes de começar, você precisará ter instalado em sua máquina as seguintes ferramentas:
<b>PHP</b>, um banco de dados relacional <b>MySql</b> e um servidor Web (<b>Apache</b>, por exemplo) .
O ideal seria baixar um dos programas muito utilizado para instalar todas estas tecnologias citadas anteriomente ao mesmo tempo: O XAMPP.
Instale também o gerenciador de dependências do <b>PHP</b> chamado <b>composer</b> e, para codificar, instale um editor para trabalhar com os códigos como o <b>VSCode</b>, por exemplo.
Tendo tudo isso, faça-os funcionarem e vamos ao que interessa.

## Building
Clone em sua máquina o projeto através do link https://github.com/VitorParisio/Ibank.git, ou baixe-o clicando na opção CODE/Download ZIP.
Com o projeto em sua máquina, navegue até ele utlizando a janela de comandos (O prompt de comandos, por exemplo) e digite os seguintes comandos:
- <i>composer install</i> (instalará todas as dependecias necessárias para o projeto);
- <i>copy .env.example .env;</i>
- <i>php artisan key:generate;</i>

Em seguida, crie uma base de dados no MySql (CREATE DATABASE nome_banco) com o nome que desejar e depois vá ate o arquivo <i>.env</i> do projeto e altere as seguintes variáveis:

- <i>DB_DATABASE=</i> name_database (Nome do bando de dados que você criou anteriomente);
- <i>DB_USERNAME=</i>root
- <i>DB_PASSWORD=</i>

Após isso, navegue em seguida ate as pastas database/seeds/UsersTableSeeder e altere os índices 'email' e 'senha' para poder "logar" no sistema.

Volte para a janela de comandos e digite:
- <i>php artisan migrate</i>
- <i>php artisa db:seed</i>
E, para finalizar, digite o comando:
- <i>php artisan serve</i>

Você será redirecionado para a página de login.

