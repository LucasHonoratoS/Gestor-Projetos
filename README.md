# Gestor de Projetos

Um sistema de gerenciamento de projetos desenvolvido em Laravel, com funcionalidades para gerenciar tarefas, projetos e equipes. O sistema permite a criação, edição e exclusão de projetos e tarefas, além de acompanhar o status de cada tarefa.

## Funcionalidades

- Cadastro de Projetos
- Edição de Projetos
- Exclusão de Projetos
- Cadastro de Tarefas vinculadas a Projetos
- Edição de Tarefas
- Exclusão de Tarefas
- Marcação de Tarefas como concluídas
- Sistema de autenticação para usuários

## Tecnologias Utilizadas

- **PHP**: Linguagem de programação utilizada para o backend.
- **Laravel**: Framework PHP utilizado para desenvolvimento da aplicação.
- **MySQL**: Banco de dados utilizado para armazenar os dados da aplicação.
- **Bootstrap**: Framework CSS utilizado para estilização da aplicação.
- **JavaScript**: Para interatividade e manipulação do DOM.

## Como Começar

Instruções para configurar o ambiente local para desenvolvimento e testes.

### Pré-requisitos

Antes de começar, verifique se você tem os seguintes softwares instalados:

- **PHP** (>= 7.3): Certifique-se de que o PHP está instalado e acessível no seu terminal.
- **Composer**: Gerenciador de dependências para PHP. [Instruções de instalação do Composer](https://getcomposer.org/download/).
- **MySQL**: Sistema de gerenciamento de banco de dados. Você pode usar ferramentas como XAMPP, MAMP, ou instalar o MySQL separadamente.
- **Node.js** e **NPM** (opcional, para compilação de assets): [Instruções de instalação do Node.js](https://nodejs.org/).
- Um servidor web (como Apache ou Nginx) configurado para executar o Laravel.

### Instalação

Siga os passos abaixo para configurar o projeto localmente:

1. **Clone o repositório**:

   Abra o terminal e execute o seguinte comando:
   ```bash
   git clone https://github.com/LucasHonoratoS/Gestor-Projetos.git
   ```

2. **Navegue até o diretório do projeto**:
   ```bash
   cd Gestor-Projetos
   ```

3. **Instale as dependências do PHP**:

   Execute o Composer para instalar as dependências do Laravel:
   ```bash
   composer install
   ```

4. **Configure o arquivo .env**:

   Renomeie o arquivo `.env.example` para `.env`:
   ```bash
   cp .env.example .env
   ```

   Em seguida, abra o arquivo `.env` em um editor de texto e configure as seguintes variáveis:

   - **DB_CONNECTION**: O tipo de banco de dados (ex: `mysql`).
   - **DB_HOST**: O endereço do servidor do banco de dados (normalmente `127.0.0.1`).
   - **DB_PORT**: A porta do banco de dados (normalmente `3306` para MySQL).
   - **DB_DATABASE**: O nome do banco de dados que você irá utilizar.
   - **DB_USERNAME**: Seu nome de usuário do MySQL.
   - **DB_PASSWORD**: Sua senha do MySQL.

   Exemplo:
   ```plaintext
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nome_do_banco
   DB_USERNAME=seu_usuario
   DB_PASSWORD=sua_senha
   ```

5. **Execute as migrações do banco de dados**:

   Crie as tabelas necessárias no banco de dados executando:
   ```bash
   php artisan migrate
   ```

   Se você quiser popular o banco de dados com dados de teste, pode executar:
   ```bash
   php artisan db:seed
   ```

6. **Instale as dependências do Node.js** (opcional):

   Se o projeto usa recursos front-end que requerem compilação (como SASS ou JavaScript):
   ```bash
   npm install
   ```

   Depois, compile os assets:
   ```bash
   npm run dev
   ```

7. **Inicie o servidor**:

   Para rodar o servidor embutido do Laravel, execute:
   ```bash
   php artisan serve
   ```

   O projeto estará disponível em `http://localhost:8000`. Você pode acessar essa URL em seu navegador.

8. **Acessando a aplicação**:

   Abra um navegador e vá para [http://localhost:8000](http://localhost:8000). Você deverá ver a página inicial do seu sistema de gerenciamento de projetos.

### Problemas Comuns

- **Erro de conexão com o banco de dados**: Verifique suas credenciais no arquivo `.env` e certifique-se de que o MySQL está rodando.
- **Dependências não instaladas**: Certifique-se de que você executou `composer install` e `npm install` corretamente.
- **Erro de permissão**: Em alguns sistemas, você pode precisar ajustar as permissões das pastas `storage` e `bootstrap/cache`:
   ```bash
   chmod -R 775 storage
   chmod -R 775 bootstrap/cache
   ```
