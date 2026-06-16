# Monitorador

## Build

```bash
docker build -t monitorador .
```

## Run

```bash
docker run --rm --name monitor -it -p 8000:8000 -v $(pwd)/:/var/www/ monitorador
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

Configurar no `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=<host>
DB_PORT=5432
DB_DATABASE=<banco>
DB_USERNAME=monitorador_ro
DB_PASSWORD=senha
```