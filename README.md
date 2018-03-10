Floris
======

## Prérequis

- Apache/PHP ou NGINX/PHP-FPM
- Postgres
- NodeJS
- NPM
- Composer
- PHPUnit

## Installation

1. Installer les packages Composer `composer install`
2. Installer les packages Node `npm install`
3. Compiler les assets `npm run build`

## Configuration

1. Si non créé, **copier** le fichier `parameters.yml.dist`
2. Renseigner les informations de connexion à la base de données `database_host`, `database_port`, `database_name`, `database_user`, `database_password` (Le port par défaut de Postgres est le `5432`)
3. Configurer le mailer transport 
4. Ajouter le Sentry DSN (pour la remonté des logs)

## Éxecution
1. Executer les migrations doctrine :
   - `php bin/console doctrine:migration:migrate`
2. Vider les caches :
   - `php bin/console cache:clear --no-warmup --env=production`
