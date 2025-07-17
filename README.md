# Cadastro de Clientes com Validação de CEP - API Laravel

Este projeto é uma API REST para cadastro, atualização, listagem e exclusão de clientes, com validação automática de endereço via CEP usando a BrasilAPI. Foi construído com Laravel 10, PHP 8 e utiliza padrões modernos como Repository Pattern e testes automatizados.

### Pré-requisitos

- PHP 8.x
- Composer
- MySQL ou PostgreSQL
- Laravel CLI (opcional)

### Passos

```bash
git clone https://github.com/luan356/cadastro-clientes.git
cd cadastro-clientes

composer install

cp .env.example .env
# Configure o .env com os dados do seu banco de dados

php artisan migrate --seed
php artisan serve
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

***************************************************************

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

## Variáveis de Ambiente

Para rodar esse projeto, você vai precisar adicionar as seguintes variáveis de ambiente no seu .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cadastro_clientes
DB_USERNAME=root
DB_PASSWORD=senha


## Licença

Este projeto está sob a licença MIT.

## Aprendizados

Este projeto demonstrou na prática:

- Como utilizar o padrão Repository no Laravel
- Como integrar APIs externas (BrasilAPI)
- Como escrever testes automatizados com PHPUnit
- Como criar seeders personalizados


