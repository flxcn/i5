<p align="center">
  <a href="https://github.com/flxcn/i5">
    <img src="public/images/logo.png" alt="i5 logo" width="100" height="100">
  </a>
</p>

# i5
A comprehensive redesign of the [i4 database](https://github.com/scasBot/i4) for the Small Claims Advisory Service. The live version of this project can be accessed at [i5.masmallclaims.org](https://i5.masmallclaims.org)

## Installation

### Setting up the Database

#### System Requirements
Make sure MySQL database is InnoDB format. This will allow for foreign key constraints to be applied. In addition, i5 relies on the ability to operate a mail server. Also remove the Client factory command statement.

#### Defining the Environment

In order to populate the database with information, you will need to first define the database details. Located in `.env` are the following definitions that you can adjust if necessary. `DB_DATABASE` should be kept as is.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=i5
DB_USERNAME=root
DB_PASSWORD=root
```

Next, you will also need to define the mail account through which user emails will be sent:

```
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

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

### Updating definitions  

Located in `lang/en/messages.php` is a list of defined terms that may change from year to year (e.g. webmaster's name, email, etc.)—all you need to do is to edit their definitions in this file and they will update across the app.

## Usage

### For Volunteers

#### Requesting an Invite

#### Searching Clients

#### Creating a Client

#### Managing Contacts

### For Administrators

#### Managing User Invites

#### Managing User Roles

## About the Project







