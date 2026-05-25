Docker setup for the Ticketing_system Laravel app

Quick start:

1. Build and start containers:

```bash
docker-compose up -d --build
```

2. Install composer dependencies (if not built into image):

```bash
docker-compose exec app composer install
```

3. Generate app key and run migrations:

```bash
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
```

4. Build frontend assets (optional):

```bash
docker-compose run --rm node npm install
docker-compose run --rm node npm run build
```

Open http://localhost:8080 in your browser.
