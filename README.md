## Test laravel api

### Installation

1. Clone the project

```shell
git clone git@github.com:aigletter/laravel-api.git
```

2. Copy .env.example to .env
```shell
cp .env.example .env
```

3. Install compose dependencies

```shell
composer install
```

4. Start docker containers
```shell
docker compose up
```

5. Run migrations 
```shell
docker compose exec php php artisan migrate
```

6. Start supervisor
```shell
docker compose exec php supervisord -c /etc/supervisor/supervisord.conf
```

#### Usage
Go to [http://localhost:8080](http://localhost:8080) in your browser.

Enjoy!
