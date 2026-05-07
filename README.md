<p align="center"><a href="https://dagestan.roskazna.gov.ru/" target="_blank"><img src="https://i.ibb.co/L5pCnjg/logo.png" width="200"></a></p>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></p>

# Kazna Demo

Восстановленная demo-версия старого Laravel 7 сайта для портфолио.

## Запуск через Docker

```bash
docker compose up -d --build
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate:fresh --seed
```

Сайт будет доступен на `http://localhost:8080`.

## Demo-админка

- URL: `http://localhost:8080/login`
- Email: `demo@example.test`
- Пароль: `demo-password`

По умолчанию включен demo-режим: админка открывается для просмотра, но POST/PUT/PATCH/DELETE в `/admin` не сохраняют изменения.
