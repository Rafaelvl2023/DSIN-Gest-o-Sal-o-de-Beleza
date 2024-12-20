# Sistema de Gestão Salão de Beleza

Este sistema foi desenvolvido para facilitar o gerenciamento de agendamentos, serviços e dados financeiros de um salão de beleza. Ele oferece funcionalidades para clientes e administradores, com uma interface intuitiva e fácil de usar.

## Requisitos

Antes de começar, verifique se você tem as seguintes ferramentas instaladas:

- [VS Code](https://code.visualstudio.com/) 
- [PHP](https://www.php.net/) versão X.X ou superior
- [Composer](https://getcomposer.org/) - gerenciador de dependências PHP
- [Node.js](https://nodejs.org/) - para rodar o npm
- [XAMPP](https://www.apachefriends.org/pt_br/index.html)

## Instalação

Siga os passos abaixo para configurar o projeto em sua máquina local:


### 1. Clone o Repositório

Clone o repositório do projeto:
git clone https://github.com/Rafaelvl2023/DSIN-Gest-o-Sal-o-de-Beleza


### 2. Acesse o Diretório do Projeto

Entre no diretório do projeto:
cd gestao-salao-beleza


### 3. Instale as Dependências

Instale as dependências do Composer:
composer install

Instale as dependências do npm (para o frontend):
npm install


### 4. Execute as Migrations

Execute as migrations para criar as tabelas no banco de dados:

php artisan migrate
Explicação: O sistema já possui todas as migrations necessárias, então este comando criará as tabelas no banco de dados.


### 5. Execute os Seeders

Execute as seeders para popular o banco com dados iniciais, incluindo o cadastro do administrador:

php artisan db:seed
Explicação: O cadastro do administrador já está configurado no seeder. O e-mail de acesso esta abaixo.
e-mail = leila@gmail.com
senha = Gestao@2024



## Funcionalidades

### 1. Tela de Login e Registro

Tela de Login: O administrador (Leila) pode acessar o painel administrativo utilizando o e-mail leila@gmail.com e a senha Gestao@2024.
Tela de Registro: Destinada a clientes do salão. Nessa tela, os clientes podem registrar seus agendamentos para serviços de beleza.

### 2. Agendamentos de Clientes

Cadastro de Agendamentos: O cliente pode agendar serviços no salão. Se o cliente já tiver um agendamento para a mesma semana, o sistema oferecerá a opção de editar o agendamento existente ou cadastrar um novo no mesmo horário/data.
Edição de Agendamentos: O cliente só poderá editar os agendamentos se faltarem mais de dois dias para o atendimento. Caso contrário, a edição não será permitida.

### 3. Acesso do Administrador

Tela Admin (Leila): O acesso do administrador leva à tela de dashboard, onde é possível visualizar os agendamentos, dados financeiros do salão e outras informações do negócio.
Cadastro de Serviços: O administrador pode cadastrar serviços oferecidos pelo salão, incluindo preços e descrição.
Cadastro de Gastos: O administrador pode cadastrar gastos fixos e variáveis para o salão, ajudando no controle financeiro.
Estrutura de Diretórios
app/: Contém os arquivos principais do seu aplicativo, incluindo controladores, modelos e serviços.
database/: Contém migrações, seeds e fábricas.
resources/views/: Contém as views Blade.
routes/: Contém as rotas da aplicação.

php artisan serve
O servidor será iniciado na URL http://127.0.0.1:8000.
