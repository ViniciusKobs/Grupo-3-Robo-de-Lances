# Monitorador

## Pré-requisitos

- Docker
- Docker Compose

## Rodar o projeto

```bash
cd docker

# opcional: customizar credenciais do banco
cp .env.example .env

docker compose up -d
```

A aplicação estará disponível em `http://localhost:8000`.

O banco PostgreSQL estará disponível em `localhost:5432` (volátil — dados perdidos ao derrubar o container).

## Migrations e Seeders

```bash
docker compose exec app php artisan migrate
docker compose exec app php artisan db:seed
```

## Derrubar o ambiente

```bash
docker compose down
```

## Rotas

| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/api/test` | Retorna `{"message": "Hello World!"}` |

## TODO

### Configurar usuário read-only no Postgres

Executar com usuário admin no banco de destino:

```sql
CREATE USER monitorador_ro WITH PASSWORD 'senha';

GRANT CONNECT ON DATABASE nome_do_banco TO monitorador_ro;

GRANT USAGE ON SCHEMA public TO monitorador_ro;
GRANT SELECT ON ALL TABLES IN SCHEMA public TO monitorador_ro;

ALTER DEFAULT PRIVILEGES IN SCHEMA public GRANT SELECT ON TABLES TO monitorador_ro;
```

Configurar no `docker/.env`:

```env
DB_DATABASE=<banco>
DB_USERNAME=monitorador_ro
DB_PASSWORD=senha
```