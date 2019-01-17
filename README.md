# Welchome

## Usage

Install dependencies.
``` bash   
# For Symfony
composer install
# For npm
npm install
```

Create Symfony project
``` bash
 composer create-project symfony/website-skeleton my-project
```



Server
``` bash
# Run server
php bin/console server:run
```

## Helpers

``` bash
# Create entity
php bin/console make:entity
# Create Controller
php bin/console make:controller
# Create Form
php bin/console make:form
# Create CRUD
php bin/console make:crud
```

Doctrine
``` bash
# Create database
php bin/console doctrine:database:create
# Load tables in database
php bin/console doctrine:migrations:migrate
# Drop database
php bin/console doctrine:database:drop --force
```

## API

``` bash
# Access to all housings
127.0.0.1/api/housings
# Access to one housing
127.0.0.1/api/housing/id
```
