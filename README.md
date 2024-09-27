# Sistema de Cadastro de Usuários

Este projeto é uma aplicação full-stack que consiste em um frontend Vue.js e um backend Laravel para gerenciar o cadastro e listagem de usuários.

## Estrutura do Projeto

- `cadastro-usuario/`: Diretório principal do projeto Vue.js
  - `cadastro-api/`: Subdiretório contendo o projeto Laravel

## Requisitos

- PHP 8.2.23 ou superior
- Composer
- Node.js e npm
- SQLite

## Configuração do Backend (Laravel)

1. Navegue até o diretório do projeto Laravel:
   ```
   cd cadastro-usuario/cadastro-api
   ```

2. Instale as dependências do PHP:
   ```
   composer install
   ```

3. Copie o arquivo de ambiente e gere a chave da aplicação:
   ```
   cp .env.example .env
   php artisan key:generate
   ```

4. Configure o banco de dados SQLite no arquivo `.env`:
   ```
   DB_CONNECTION=sqlite
   DB_DATABASE=/caminho/absoluto/para/database.sqlite
   ```

5. Execute as migrações:
   ```
   php artisan migrate
   ```

6. Inicie o servidor Laravel:
   ```
   php artisan serve
   ```

O backend estará rodando em `http://127.0.0.1:8000`.


## Configuração do Frontend (Vue.js)

1. Navegue até o diretório principal do projeto Vue.js:
   ```
   cd cadastro-usuario
   ```

2. Instale as dependências do Node.js:
   ```
   npm install
   ```

3. Instale as dependências adicionais:
   ```
   npm install vue-router@4 vuex@4 axios chart.js@3 vuetify@3
   ```

4. Compile e hot-reload para desenvolvimento:
   ```
   npm run serve
   ```

O frontend estará disponível em `http://localhost:8080`.

## Dependências Principais

### Backend (Laravel)
- Laravel Framework 11.25.0
- [Outras dependências do Laravel, se houver]

### Frontend (Vue.js)
- Vue.js 3.x
- Vue Router 4.x
- Vuex 4.x
- Axios
- Chart.js 3.x
- Vuetify 3.x

Certifique-se de verificar o arquivo `package.json` para a lista completa de dependências e suas versões exatas.

## Uso

- A listagem de usuários do Laravel está disponível em: `http://127.0.0.1:8000/users`
- O dashboard Vue.js está disponível em: `http://localhost:8080`

## API

A API Laravel fornece os seguintes endpoints:

- `GET /api/users`: Lista todos os usuários
- `POST /api/users`: Cria um novo usuário
- `GET /api/dashboard`: Retorna dados para o dashboard

Para mais detalhes sobre a API, consulte a documentação do Laravel ou os arquivos de rota.

## Banco de Dados

O projeto utiliza SQLite como banco de dados. O arquivo do banco de dados deve estar localizado conforme especificado no arquivo `.env` do projeto Laravel.

## Versões

- Laravel: 11.25.0
- PHP: 8.2.23
- Vue.js: 3.2.13

## Comandos Úteis

- Para rodar as migrações do Laravel:
  ```
  php artisan migrate
  ```

- Para iniciar o servidor de desenvolvimento do Vue.js:
  ```
  npm run serve
  ```

- Para construir o projeto Vue.js para produção:
  ```
  npm run build
  ```

## Notas Adicionais

- Certifique-se de que o PHP e o Composer estão instalados e configurados corretamente em seu sistema.
- Verifique se o Node.js e o npm estão instalados para o desenvolvimento frontend.
- Para um ambiente de produção, considere usar um servidor web como Nginx ou Apache.
