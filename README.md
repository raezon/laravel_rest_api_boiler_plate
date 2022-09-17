### Instllation
composer install
### Generate models example
php artisan krlove:generate:model User --table-name=user
### Generate controller

### Generate ressource example
php artisan make:resource UserResource

### Generate ressource controller example
php artisan make:controller sharkController --resource 

### Generate CustomStorageLinkCommand
php artisan make:command CustomStorageLinkCommand