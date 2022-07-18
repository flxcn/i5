<p align="center">
  <a href="https://github.com/flxcn/i5">
    <img src="public/images/logo.png" alt="i5 logo" width="100" height="100">
  </a>
</p>

# i5
A comprehensive redesign of the [i4 database](https://github.com/scasBot/i4) for the Small Claims Advisory Service. The live version of this project can be accessed at [i5.masmallclaims.org](https://i5.masmallclaims.org)

## Installation

### Updating definitions  
Located in `lang/en/messages.php` is a list of defined terms that may change from year to year (e.g. webmaster's name, email, etc.)—all you need to do is to edit their definitions in this file and they will update across the app.

### Setting up the Database

#### System Requirements
Make sure MySQL database is InnoDB format. This will allow for foreign key constraints to be applied. Also remove the Client factory command statement.

#### Migrations  
To create all the necessary database structures, run this command:

```sh
php artisan migrate
```

If you need to reverse any changes:  

```sh
php artisan migrate:rollback --step=1
```

#### Running a Seeder

```sh
php artisan db:seed
```

### Running The App  
Upload the files to your document root, or if you are running your own server, use the following command  

```sh
php artisan serve
```

## Usage

### For Volunteers

#### Requesting User Invite

#### Searching Clients

#### Creating a Client

#### Managing Contacts

### For Administrators

### Managing User Invites

### Managing User Roles





