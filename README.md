# Cadastro de Clientes com Validação de CEP - API Laravel

Este projeto é uma API REST para cadastro, atualização, listagem e exclusão de clientes, com validação automática de endereço via CEP usando a BrasilAPI. Foi construído com Laravel 10, PHP 8 e utiliza padrões modernos como Repository Pattern e testes automatizados.

### Pré-requisitos

- PHP 8.x
- Composer
- MySQL ou PostgreSQL
- Laravel 

### funcionalidades 
- Cadastro de clientes com:
  - Nome completo
  - CPF (único e validado)
  - Email (único e validado)
  - Telefone
  - CEP (validação via BrasilAPI)
- Autopreenchimento de endereço
- Listagem com filtros e paginação
- Edição e exclusão de clientes
- Testes automatizados
- Seeders para dados iniciais






### Passos

```bash
git clone https://github.com/luan356/cadastro-clientes.git
cd cadastro-clientes

composer install
## criar banco de dados :

CREATE DATABASE cadastro_clientes;
CREATE USER user_laravel WITH PASSWORD '123456';
GRANT ALL PRIVILEGES ON DATABASE cadastro_clientes TO user_laravel;


cp .env.example .env
# Configure o .env com os dados do seu banco de dados
## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cadastro_clientes
DB_USERNAME=user_laravel
DB_PASSWORD=123456

## execute as migrations
php artisan migrate

## execute as suas Seeders
php artisan db:seed

## execute as seus testes
php artisan test --env=testing
## execute o servidor
php artisan serve

### Header no postman 
Content-Type : application/json
Accept : application/json

###Rotas

Post : http://127.0.0.1:8000/api/
Get : http://127.0.0.1:8000/api/clientes/{id}
Put : http://127.0.0.1:8000/api/clientes/{id}
Delete : http://127.0.0.1:8000/api/clientes/{id}

### Criar cliente
```json
{
    "nome_completo": "Luan Silva",
    "cpf": "06630436385",
    "email": "luan@email.com",
    "telefone": "85999999999",
    "cep": "60353190"
}


### Atualizar cliente

{
    "nome_completo": "Luan Atualizado",
    "email": "novo@email.com",
    "telefone": "85998887777",
    "cep": "60353190"
}





### Se for usar Docker com Laravel Sail:

./vendor/bin/sail up -d
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail artisan serve




## Aprendizados

Este projeto demonstrou na prática:

- Como utilizar o padrão Repository no Laravel
- Como integrar APIs externas (BrasilAPI)
- Como escrever testes automatizados com PHPUnit
- Como criar seeders personalizados


## Licença

Este projeto está sob a licença MIT.