# Orizon API Project

# Orizon API Project
1. [Description](#description)
2. [Features](#features)
3. [Usage](#usage)
4. [How to Create the Database and Tables](#how-to-create-the-database-and-tables)
5. [Migrations](#migrations)
6. [API Endpoints](#api-endpoints)
7. [License](#license)


## Description

The Orizon API project is a RESTful API designed to manage travel trips and associated countries. It provides CRUD (Create, Read, Update, Delete) operations for trips and countries, allowing users to create, retrieve, update, and delete trip records, as well as manage the countries involved in each trip.
The API returns results in the form of JSON.

## Features

- Create, Read, Update, and Delete operations for trips and countries.
- Manage countries associated with each trip.
- Filter trips by available seats and countries.
- Simple and intuitive API endpoints.

## Usage

1. Clone the repository.
2. Navigate to the project directory.
3. Install dependencies: `composer install`
4. Create the database schema:
   - Create a MySQL database named `orizon`. 
5. Configure the database connection:
   - Open the `config/database.php` file.
   - Update the database credentials according to your MySQL configuration.
6. Start the development server (es. start Apache and MySQL on XAMPP)
7. You can now access the API endpoints using Postman or any other HTTP client.

## How to Create the Database and Tables
1. Open your preferred database management tool (e.g., MySQL Workbench, phpMyAdmin).
2. Create a new database named `orizon` or any other preferred name.
3. Run the SQL script `database/schema.sql` in your database management tool to create the necessary tables for the Orizon API project.
4. After running the script, you should see three tables created: `countries`, `trips`, and `trip_countries`.

## Migrations
Migrations files can be found in the `database/migrations` directory. These files provide a convenient way to manage changes to your database schema over time. Each migration file represents a set of database changes that should be applied or reverted.
To use migrations:
1. Ensure you have configured your database connection in `config/database.php`.
2. Run the following command to apply all migrations and create the necessary tables:
   ```bash
   php database/migrate.php


## API Endpoints

### Trip Endpoints

- **GET /trip/read.php**: Retrieve all trips.
- **POST /trip/create.php**: Create a new trip.
- **POST /trip/update.php**: Update an existing trip.
- **POST /trip/delete.php**: Delete a trip.

### Country Endpoints

- **GET /country/read.php**: Retrieve all countries.
- **POST /country/create.php**: Create a new country.
- **POST /country/update.php**: Update an existing country.
- **POST /country/delete.php**: Delete a country.

## Modifying the Project

To modify the Orizon API project, follow these steps:

1. Make changes to the relevant files in the `src` directory.
2. Test your changes locally using the development server.
3. Commit your changes:
4. Push your changes to the remote repository:

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.







