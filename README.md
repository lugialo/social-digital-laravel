# Social Digital Laravel

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

**4. Configure o ambiente**

```bash
cp .env.example .env
php artisan key:generate
```

**5. Execute as migrations e o seeder**

```bash
php artisan migrate --seed
```

## Executando o projeto

**Terminal 1 — servidor PHP:**

```bash
php artisan serve
```

Acesse: [http://localhost:8000](http://localhost:8000)

## Rodando com Docker

**Requisito:** Docker e Docker Compose instalados.

**1. Suba os containers**

```bash
docker compose up -d --build
```

**3. Crie o banco e rode as migrations**

```bash
docker compose exec app touch database/database.sqlite
docker compose exec app php artisan migrate --seed
```

Acesse: [http://localhost:8000](http://localhost:8000)

Para parar os containers:

```bash
docker compose down
```

---

## Credenciais de acesso

| Perfil | E-mail | Senha |
|--------|--------|-------|
| Admin | admin@socialdigital.com | admin123 |
| Usuário | user@socialdigital.com | user123 |
