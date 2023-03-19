# Laravel 10 Blog Starter Kit
This is Laravel 10 blog starter kit project with [Filament PHP](https://filamentphp.com/) admin panel. The project is created during [YouTube Tutorial](https://youtu.be/iVThaG_sAt0).

## Installation with docker

#### 1. Clone the project
```bash
git clone https://github.com/thecodeholic/laravel-10-blog.git
```

#### 2. Run `composer install`
Navigate into project folder using terminal and run

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

#### 3. Copy `.env.example` into `.env`

```bash
cp .env.example .env
```

#### 4. Start the project in detached mode

```bash
./vendor/bin/sail up -d
```
From now on whenever you want to run artisan command you should do this from the container. <br>
Access to the docker container
```bash
./vendor/bin/sail bash
```

#### 5. Set encryption key

```bash
php artisan key:generate --ansi
```

#### 6. Run migrations

```bash
php artisan migrate
```

#### 7. Add Filament Admin user

```bash
php artisan make:filament-user
```

## Demo
> Coming soon...

## 
