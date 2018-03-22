Reap
=======

Installation
============

With composer :

``` json
{
    ...
    "require": {
        "skychf/reap": "2.*"
    }
}
```

Usage
=====

修改 app/Console/Commands/Kernel.php :

```php
protected $commands = [
    \Skychf\Reap\ReapCommand::class
];
```

## Artisan command options

### [table_name]
Mandatory parameter which defines which table/s will be used for seed creation.
Use CSV notation for multiple tables. Seed file will be generated for each table.

Examples:
```
php artisan db:reap my_table
```
```
php artisan db:reap my_table,another_table
```

### force
Optional parameter which is used to automatically overwrite any existing seeds for desired tables

Example:
The following command will overwrite `UsersTableSeeder.php` if it already exists in laravel's seeds directory.
```
php artisan db:reap users --force
```

### clean
Optional parameter which will clean `app/database/seeds/DatabaseSeeder.php` before creating new seed class.

Example:
```
php artisan db:reap users --clean
```

### database
Optional parameter which specifies the DB connection name.

Example:
```
php artisan db:reap users --database=mysql2
```

### max
Optional parameter which defines the maximum number of entries seeded from a specified table. In case of multiple tables, limit will be applied to all of them.

Example:
```
artisan db:reap users --max=10
```

### prerun
Optional parameter which assigns a laravel event name to be fired before seeding takes place. If an event listener returns `false`, seed will fail automatically.
You can assign multiple preruns for multiple table names by passing an array of comma separated DB names and respectively passing a comma separated array of prerun event names.

Example:
The following command will make a seed file which will fire an event named 'someEvent' before seeding takes place.
```
artisan db:reap users --prerun=someEvent
```
The following example will assign `someUserEvent` to `users` table seed, and `someGroupEvent` to `groups` table seed, to be executed before seeding.
```
artisan db:reap users,groups --prerun=someUserEvent,someGroupEvent
```
The following example will only assign a `someGroupEvent` to `groups` table seed, to be executed before seeding. Value for the users table prerun was omitted here, so `users` table seed will have no prerun event assigned.
```
artisan db:reap users,groups --prerun=,someGroupEvent
```

### postrun
Optional parameter which assigns a laravel event name to be fired after seeding takes place. If an event listener returns `false`, seed will be executed, but an exception will be thrown that the postrun failed.
You can assign multiple postruns for multiple table names by passing an array of comma separated DB names and respectively passing a comma separated array of postrun event names.

Example:
The following command will make a seed file which will fire an event named 'someEvent' after seeding was completed.
```
artisan db:reap users --postrun=someEvent
```
The following example will assign `someUserEvent` to `users` table seed, and `someGroupEvent` to `groups` table seed, to be executed after seeding.
```
artisan db:reap users,groups --postrun=someUserEvent,someGroupEvent
```
The following example will only assign a `someGroupEvent` to `groups` table seed, to be executed after seeding. Value for the users table postrun was omitted here, so `users` table seed will have no postrun event assigned.
```
artisan db:reap users,groups --postrun=,someGroupEvent
```

License
=======

This library is under MIT license, have a look to the `LICENSE` file