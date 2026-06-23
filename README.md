# Social Digital Laravel

Remake do sistema Social Digital em Laravel 12 + Blade.

## Requisitos

- PHP >= 8.2
- Composer
- Node.js + npm

## Instalação

**1. Clone o repositório**

```bash
git clone <url-do-repositorio>
cd social-digital-laravel
```

**2. Instale as dependências PHP**

```bash
composer install
```

**3. Instale as dependências JS**

```bash
npm install
```

**4. Configure o ambiente**

```bash
cp .env.example .env
php artisan key:generate
```

**5. Configure o banco de dados**

O projeto usa SQLite por padrão. Crie o arquivo do banco:

```bash
touch database/database.sqlite
```

**6. Execute as migrations e o seeder**

```bash
php artisan migrate --seed
```

## Executando o projeto

**Terminal 1 — servidor PHP:**

```bash
php artisan serve
```

**Terminal 2 — assets (Vite):**

```bash
npm run dev
```

Acesse: [http://localhost:8000](http://localhost:8000)

## Credenciais de acesso

| Perfil | E-mail | Senha |
|--------|--------|-------|
| Admin | admin@socialdigital.com | admin123 |
| Usuário | user@socialdigital.com | user123 |
