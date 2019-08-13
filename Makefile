container=php-fpm

up:
	docker-compose up -d

down:
	docker-compose down

tdd:


install:
	docker-compose run $(container) composer install --dev

migrate:
    docker-compose run $(container) php vendor/bin/phinx create MyFirstMigration -c sphinx-config.php