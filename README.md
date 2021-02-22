# API pets-appointments

## Sobre o projeto
Projeto desenvolvido com o propósito de consumir os recursos de API do Framework Laravel, utilizando por exemplo:
- Listagem de dados com paginação
- Filtrando registros por Parâmetros na Url
- Relacionamentos simples
- etc..

## Sobre a API
A API é um gerenciamento simples dos Atendimentos de Pets em Consultas Médicas.

### Baixando o projeto

    git clone https://github.com/dominguesjunior/pets-appointments
    cd pets-appointments/

### Configurando
    
    #instalando dependências
    composer install

    #copiando arquivo de configuração
    cp .env.example .env

    #gerando chave da aplicação
    php artisan key:generate

### Banco de dados
Deve ser criado um banco de dados sql e configurar os dados de conexão no arquivo `.env`, exemplo:

    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=database
    DB_USERNAME=usuario
    DB_PASSWORD=senha
    
Após isso criar as tabelas no banco de dados

    php artisan migrate
    

### Pronto!!!
Execute o comando `php artisan serve` e você já tem o projeto rodando em `http://localhost:8000`

## Documentação
[Clique aqui para acessar a documentação online.](https://pets.dariojunior.me) <br>
Ou acessando a página `http://localhost:8000/documentation` no browser com o projeto rodando.