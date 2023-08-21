# CRUD Application using PHP and MySQL

A simple CRUD (Create, Read, Update, Delete) application built using PHP and MySQL. This project demonstrates basic interaction with a database to perform CRUD operations.

## Features

- Create new records in the database.
- Read and display existing records.
- Update records with new data.
- Delete records from the database.

## Technologies Used

- PHP
- MySQL
- HTML
- CSS (for minimal styling)

## Setup

1. Clone this repository to your local machine.
2. Create a new MySQL database.
3. Import the `database.sql` file into your newly created database to set up the required table.
4. Configure the database connection in the `config.php` file.

```php
// config.php
define('DB_HOST', 'your_database_host');
define('DB_USER', 'your_database_user');
define('DB_PASS', 'your_database_password');
define('DB_NAME', 'your_database_name');
