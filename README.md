# CRUD Alunos

Este projeto é um sistema de CRUD (Create, Read, Update, Delete) para gerenciar informações de alunos. O sistema utiliza o framework **CodeIgniter** para o back-end e uma interface front-end simples desenvolvida em PHP. As informações dos alunos são armazenadas em um banco de dados MySQL.

---

## Estrutura do Projeto

```plaintext
CRUD-de-Alunos-com-Codeigniter/
├── app/                  # Pasta do CodeIgniter (back-end)
│   ├── Config/           # Configurações do CodeIgniter (ex.: banco de dados, CORS)
│   ├── Controllers/      # Controladores do CodeIgniter (lógica de aplicação)
│   ├── Models/           # Modelos do CodeIgniter (interação com o banco de dados)
│   ├── Views/            # Views do CodeIgniter (páginas geradas pelo back-end)
│   └── .env              # Configurações sensíveis, como credenciais do banco de dados
│
├── frontend/             # Arquivos do front-end em PHP
│   ├── index.php         # Página inicial com a listagem de alunos e ações de CRUD
│   ├── insert.php        # Formulário para adicionar novos alunos
│   ├── atualizar_aluno.php # Formulário para atualizar informações de um aluno
│   ├── deletar_aluno.php # Lógica para excluir um aluno
│   ├── db.php            # Conexão com o banco de dados no front-end
│   └── uploads/          # Pasta para armazenar fotos de alunos
│
├── public/               # Pasta pública do CodeIgniter (para arquivos acessíveis via web)
│   └── index.php         # Arquivo de entrada principal do CodeIgniter
│
├── system/               # Arquivos do sistema do CodeIgniter (não modifique)
│   └── ...               # Núcleo do framework
│
├── wrtable/              # Pasta com tabelas e scripts (especifica ao projeto)
│   └── ...               # Arquivos relacionados à estrutura de tabelas ou relatórios
│
├── .gitignore            # Arquivo para excluir pastas desnecessárias do repositório
├── LICENSE               # Licença do projeto
├── phpunit.xml.dist      # Arquivo de configuração de testes do PHPUnit
├── spark                 # Arquivo para iniciar o framework CodeIgniter
└── sql/                  # Pasta para o arquivo de backup do banco de dados
    └── crud_alunos.sql   # Arquivo SQL com a estrutura e dados do banco
```
# Instalação e Configuração

## 1. Pré-requisitos
Antes de iniciar a instalação do projeto, certifique-se de ter o seguinte programa instalado no seu ambiente:

- XAMPP com php (recomendado para rodar PHP e MySQL localmente).

## 2. Clonar o Repositório
Clone o repositório do projeto para o seu ambiente local utilizando o comando git clone:
```
git clone https://github.com/seu-usuario/CRUD-de-Alunos-com-Codeigniter.git
cd CRUD-de-Alunos-com-Codeigniter
```

## 3. Configuração do Banco de Dados
Crie um banco de dados MySQL com o nome crud_alunos utilizando o arquivo SQL fornecido.

```
Execute o arquivo crud_alunos.sql para criar a tabela informacoes_alunos. Você pode fazer isso pelo terminal utilizando a ferramenta phpMyAdmin.
```

## 4. Configurar as Credenciais do Banco de Dados no CodeIgniter
No diretório app/Config/Database.php, configure as credenciais do banco de dados conforme abaixo:
```
public $default = [
    'DSN'      => '',
    'hostname' => 'localhost',
    'username' => 'root',         //Substitua pelo seu usuário de banco de dados
    'password' => '',             //Substitua pela sua senha, se houver
    'database' => 'crud_alunos',  //Nome do banco de dados
    'DBDriver' => 'MySQLi',
    'DBPrefix' => '',
    'pConnect' => false,
    'DBDebug'  => (ENVIRONMENT !== 'production'),
    'charset'  => 'utf8',
    'DBCollat' => 'utf8_general_ci',
    'swapPre'  => '',
    'encrypt'  => false,
    'compress' => false,
    'strictOn' => false,
    'failover' => [],
    'port'     => 3306,
];
```

## 5. Configurar o Apache (se necessário)
No XAMPP, coloque o diretório do projeto dentro da pasta htdocs:

```
C:/xampp/htdocs/CRUD-de-Alunos-com-Codeigniter/
```
Em seguida, inicie o Apache e o MySQL através do painel de controle do XAMPP.

## 6. Acessar o Sistema
Abra seu navegador e acesse a página inicial do sistema:
```
http://localhost/CRUD-de-Alunos-com-Codeigniter/public/index.php
```
A partir dessa URL, você poderá interagir com o sistema para cadastrar, editar, listar e excluir alunos.

## 7. Endpoints da API (Opções para Interagir com o Back-End)
Se você quiser interagir com a API diretamente (por exemplo, para fazer testes no Postman ou outro cliente HTTP), você tem que inicializar o **spark** com o comando: 
```
C:\xampp\php\php.exe spark serve
```
e utilizar o seguinte endpoint:

http://localhost:8080/alunos

### - Comandos para interagir com a API via Postman:


#### 1. Listar todos os alunos
Método: GET  
URL: /alunos  
Código:  
```
tipo json
{
    "id": 1,
    "nome": "João Silva",
    "email": "joao@email.com",
    "telefone": "123456789",
    "endereco": "Rua A, 123",
    "foto": "uploads/joao.jpg"
}
```
#### 2. Visualizar um aluno
Método: GET  
URL: /alunos/{id}  
Parâmetros: id (ID do aluno)  
Código:
```
tipo json
{
    "id": 1,
    "nome": "João Silva",
    "email": "joao@email.com",
    "telefone": "123456789",
    "endereco": "Rua A, 123",
    "foto": "uploads/joao.jpg"
}
```
#### 3. Criar um novo aluno
Método: POST  
URL: /alunos  
Parâmetros:
nome (obrigatório), email (obrigatório), telefone (obrigatório), endereco (opcional), foto (opcional)

#### 4. Atualizar um aluno
Método: PUT  
URL: /alunos/{id}  
Parâmetros: Mesmo que o POST  

#### 5. Deletar um aluno
Método: DELETE  
URL: /alunos/{id}  
