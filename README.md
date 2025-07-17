Cadastro de Clientes com Validação de CEP - API Laravel

API REST para cadastro, atualização, listagem e exclusão de clientes, com validação automática de endereço via CEP usando a BrasilAPI. Desenvolvida com Laravel 12.x, PHP 8.4, utilizando Repository Pattern, testes automatizados e configurada com Docker/Sail para facilitar o desenvolvimento.
🧰 Funcionalidades

    Cadastro de clientes com validação de:
        Nome completo
        CPF (único e validado)
        Email (único e validado)
        Telefone
        CEP (validação via BrasilAPI com autopreenchimento de endereço)
    Atualização de dados do cliente
    Exclusão de clientes
    Listagem de clientes com filtros e paginação
    Consulta de cliente por ID
    Testes automatizados
    Seeders para dados iniciais

⚙️ Requisitos

    PHP ^8.4
    Laravel ^12.0
    MySQL ^8.0
    Composer ^2.8
    Docker & Docker Compose (opcional, com Laravel Sail)

🚀 Instalação
1. Clone o repositório:

git clone https://github.com/luan356/cadastro-clientes.git
# ou
git clone https://github.com/luan356/luan-teste-dev-php.git
cd cadastro-clientes
2. Instale as dependências:

composer install
3. Copie o arquivo de ambiente:

cp .env.example .env
4. Configure o .env com os dados do banco de dados:
Para uso com Docker/Sail:
env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cadastro_clientes
DB_USERNAME=user_laravel
DB_PASSWORD=123456
Para uso sem Docker:
env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cadastro_clientes
DB_USERNAME=user_laravel
DB_PASSWORD=123456
5. Configure o banco de dados:

Crie o banco de dados e o usuário:
sql
CREATE DATABASE cadastro_clientes;
CREATE USER 'user_laravel'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON cadastro_clientes.* TO 'user_laravel'@'localhost';
FLUSH PRIVILEGES;
6. Execute com Docker (Laravel Sail):

Suba os containers:

./vendor/bin/sail up -d

Execute as migrations e seeders:

./vendor/bin/sail artisan migrate --seed

Inicie o servidor:

./vendor/bin/sail artisan serve
7. Execute com Docker Compose:

Suba os containers:

docker compose up --build -d

Acesse o container da aplicação:

docker exec -it <nome-do-container> 

Execute as migrations e seeders:

php artisan migrate
php artisan db:seed

Inicie o servidor:

php artisan serve
8. Execute sem Docker:

Gere a chave da aplicação:

php artisan key:generate

Execute as migrations e seeders:

php artisan migrate
php artisan db:seed

Inicie o servidor:

php artisan serve
🌐 Acessando a API

Acesse no navegador ou via ferramenta como Postman:
text
http://127.0.0.1:8000

Headers para requisições no Postman:
plaintext
Content-Type: application/json
Accept: application/json
📡 Endpoints
1. Cadastrar Cliente

POST /api/clientes

Requisição:
json
{
  "nome_completo": "Luan Silva",
  "cpf": "06630436385",
  "email": "luan@email.com",
  "telefone": "85999999999",
  "cep": "60353190"
}

Resposta:
json
{
  "id": 1,
  "nome_completo": "Luan Silva",
  "cpf": "06630436385",
  "email": "luan@email.com",
  "telefone": "85999999999",
  "cep": "60353190",
  "logradouro": "Rua Exemplo",
  "bairro": "Centro",
  "cidade": "Fortaleza",
  "estado": "CE"
}
2. Atualizar Cliente

PUT /api/clientes/{id}

Requisição:
json
{
  "nome_completo": "Luan Atualizado",
  "email": "novo@email.com",
  "telefone": "85998887777",
  "cep": "60353190"
}

Resposta:
json
{
  "id": 1,
  "nome_completo": "Luan Atualizado",
  "cpf": "06630436385",
  "email": "novo@email.com",
  "telefone": "85998887777",
  "cep": "60353190",
  "logradouro": "Rua Exemplo",
  "bairro": "Centro",
  "cidade": "Fortaleza",
  "estado": "CE"
}
3. Excluir Cliente

DELETE /api/clientes/{id}

Resposta:
json
{ "message": "Cliente excluído com sucesso" }
4. Listar Clientes

GET /api/clientes

Parâmetros de filtro (query string):

    nome_completo
    cpf
    cep

Exemplo:
text
http://127.0.0.1:8000/api/clientes?nome_completo=Luan
5. Buscar Cliente por ID

GET /api/clientes/{id}

Resposta:
json
{
  "id": 1,
  "nome_completo": "Luan Silva",
  "cpf": "06630436385",
  "email": "luan@email.com",
  "telefone": "85999999999",
  "cep": "60353190",
  "logradouro": "Rua Exemplo",
  "bairro": "Centro",
  "cidade": "Fortaleza",
  "estado": "CE"
}
🧪 Testes

Execute os testes automatizados:

# Com Sail
./vendor/bin/sail artisan test --env=testing

# Sem Sail
php artisan test --env=testing

Use ferramentas como Postman para testar os endpoints manualmente.
📂 Containers Docker (com Sail)

    laravel.test: Laravel (PHP-FPM)
    mysql: MySQL 8
    redis (opcional): Cache
    mailhog (opcional): Servidor de e-mails para testes

🧼 Parar o ambiente
Com Sail:

./vendor/bin/sail down

Com volumes:

./vendor/bin/sail down -v
Com Docker Compose:

docker-compose down

Com volumes:

docker-compose down -v
📚 Aprendizados

Este projeto demonstrou na prática:

    Implementação do padrão Repository no Laravel
    Integração com APIs externas (BrasilAPI)
    Escrita de testes automatizados com PHPUnit
    Criação de seeders personalizados
    Configuração de ambiente com Docker e Laravel Sail

📝 Licença

Este projeto está sob a licença MIT.

    Nota: Este README segue o mesmo padrão do fornecido, mantendo todas as informações originais do seu projeto e adaptando-as para um formato consistente e organizado.

1,2s
