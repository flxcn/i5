# i5
![i5 logo](/public/images/logo.png "i5")

A comprehensive redesign of the [i4 database](https://github.com/scasBot/i4) for the Small Claims Advisory Service.

## Usage

### Updating definitions  
Located in `lang/en/messages.php` is a list of defined terms that may change from year to year (e.g. webmaster's name, email, etc.)—all you need to do is to edit their definitions in this file and they will update across the app.

### Migrations  
To create all the necessary database structures, run this command:

```sh
php artisan migrate
```

If you need to reverse any changes:  

```sh
php artisan migrate:rollback --step=1
```

## Running a Seeder

```sh
php artisan db:seed
```

### Running The App  
Upload the files to your document root, or if you are running your own server, use the following command  

```sh
php artisan serve
```


