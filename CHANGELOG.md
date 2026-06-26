# Changelog

Todas as alterações relevantes deste projeto serão documentadas neste arquivo.
O formato é baseado em **Keep a Changelog** e este projeto utiliza **Versionamento Semântico**.

## [Unreleased]

### Added

- Estrutura inicial utilizando o framework Laravel.
- Arquitetura MVC com separação entre Models, Views e Controllers.
- Models Eloquent para manipulação das entidades do sistema.
- Middlewares para controle de autenticação e autorização.
- Testes automatizados com PHPUnit.
- Configuração do Laravel Pint para padronização do código.
- Configuração do SonarQube para análise estática do código.

### Changed

- Migração do sistema desenvolvido em PHP puro para Laravel.
- Substituição das consultas SQL manuais pelo ORM Eloquent.
- Centralização da autenticação utilizando Middlewares.
- Reorganização completa da estrutura de diretórios conforme o padrão Laravel.
- Separação da lógica de negócio, acesso ao banco de dados e interface gráfica.
- Padronização da estrutura do projeto seguindo as convenções do framework.

### Removed

- Consultas SQL construídas por concatenação de strings.
- Código duplicado para verificação de sessão.
- Arquivos PHP que misturavam HTML, lógica de negócio e acesso ao banco de dados.
- Código comentado e variáveis sem utilização.

### Fixed

- Correção da vulnerabilidade de SQL Injection através do uso de Prepared Statements fornecidos pelo Eloquent.
- Melhoria na organização das responsabilidades da aplicação.
- Padronização da nomenclatura de arquivos e variáveis.
- Redução da duplicação de código.

### Security

- Implementação de Prepared Statements por meio do Eloquent ORM.
- Centralização da autenticação utilizando Middlewares.
- Proteção das rotas utilizando os recursos nativos do Laravel.

---

## [1.0.0] - 2026-06-26

### Added

- Primeira versão refatorada do sistema utilizando Laravel.
- Estrutura MVC implementada.
- Sistema preparado para testes automatizados e futuras manutenções.
