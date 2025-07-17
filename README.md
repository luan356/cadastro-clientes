# Cadastro de Clientes com Validação de CEP - API Laravel

Este projeto é uma API REST para cadastro, atualização, listagem e exclusão de clientes, com validação automática de endereço via CEP usando a BrasilAPI. Foi construído com Laravel 10, PHP 8 e utiliza padrões modernos como Repository Pattern e testes automatizados.

---

## Tecnologias Utilizadas

- PHP 8.x
- Laravel 10.x
- MySQL ou PostgreSQL
- Composer
- PHPUnit (testes automatizados)



---

## Funcionalidades

- Cadastro de clientes com:
  - Nome completo
  - CPF (validado e único)
  - Email (validado e único)
  - Telefone
  - CEP
  - Endereço automático via BrasilAPI (logradouro, bairro, cidade, estado)
- Edição, exclusão e listagem de clientes com filtros e paginação.
- Repository Pattern para organização do código.
- Testes automatizados para garantir qualidade.
- Seeders para popular a base com dados iniciais.

---

## Como rodar o projeto

### 1. Clonar o repositório

```bash
git clone <URL_DO_REPOSITORIO>
cd cadastro-clientes


composer install

cp .env.example .env


DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=seu_banco
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha


php artisan migrate --seed


php artisan serve



Rotas Principais
Método	Rota	Descrição
GET	/api/clientes	Listar clientes (com filtros e paginação)
POST	/api/clientes	Criar um cliente
GET	/api/clientes/{id}	Buscar cliente por ID
PUT	/api/clientes/{id}	Atualizar cliente
DELETE	/api/clientes/{id}	Deletar cliente


O projeto inclui testes para as principais funcionalidades da API, como criação, atualização, listagem e exclusão de clientes.

### Rodar os testes

```bash
php artisan test


Seeders

Seeders populam a base de dados com dados iniciais para testes e desenvolvimento.

    EnderecoSeeder: cria múltiplos endereços para teste.

    ClienteSeeder: cria clientes vinculados a endereços existentes.

Para rodar manualmente os seeders:


php artisan db:seed --class=ClienteSeeder



## Como usar a API

### Criar cliente (exemplo payload)

```json
{
    "nome_completo": "Luan Silva",
    "cpf": "06630436385",
    "email": "luan@email.com",
    "telefone": "85999999999",
    "cep": "60353190"
}


Atualizar cliente (exemplo payload)

{
    "nome_completo": "Luan Silva Atualizado",
    "email": "luan_atualizado@email.com",
    "telefone": "85998887777",
    "cep": "60353190"
}



Observações

    A validação de CPF é feita para garantir formato correto e unicidade.

    A validação do CEP consulta a BrasilAPI para garantir endereço real.

    Caso a BrasilAPI esteja indisponível, operações podem falhar (exemplo: testes com mocks são recom