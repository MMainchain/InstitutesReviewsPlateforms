.DEFAULT_GOAL=help

UID := $(shell id -u)

.PHONY: install stop start help test

install:
	cp -n ./docker-compose.override.dist.yaml ./docker-compose.override.yaml
	cp -n ./symfony/.env.dist ./symfony/.env
	@echo "UID=$(UID)" > .env
	docker-compose build
	
stop:
	docker-compose down --volumes

start:
	docker-compose up -d
	docker-compose exec php composer install --no-progress --no-suggest --ansi --no-interaction

node:
	docker-compose exec node /bin/bash

php:
	docker-compose exec php /bin/bash

clearcache:
	docker-compose exec php php bin/console c:c --env=dev
	docker-compose exec php php bin/console c:c --env=test
	docker-compose exec php php bin/console c:c --env=prod

mysql:
	docker-compose exec mysql mysql -uroot

help:
	@echo -e '\033[0;33mUsage: \033[0m'
	@echo '  make [target]'
	@echo
	@echo -e '\033[0;33mTargets: \033[0m'
	@echo '  - install [Install docker environnement, without overriding ./docker-compose-override.yaml and ./symfony/config/parameters.yaml]'
	@echo '  - start [Start docker environnement]'
	@echo '  - stop [Stop docker environnement]'
	@echo '  - symfony [Get into symfony bash]'
	@echo '  - mysql [Get into mysql bash]'
	@echo '  - clearcache [Clear symfony cache]'
	@echo '  - help [List commands]'