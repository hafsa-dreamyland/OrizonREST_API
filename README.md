# Orizon API Project
1. [Description](#description)
2. [Features](#features)
3. [Usage](#usage)
4. [How to Create the Database and Tables](#how-to-create-the-database-and-tables)
6. [API Endpoints](#api-endpoints)
7. [Example Inputs](#example-inputs)
8. [License](#license)


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
2. Create the database schema:
   - Create a MySQL database named `orizon`.
3. Configure the database connection:
   - Open the `config/database.php` file.
   - Update the database credentials according to your MySQL configuration.
4. Start the development server (es. start Apache and MySQL on XAMPP)
5. You can now access the API endpoints using Postman or any other HTTP client.

## How to Create the Database and Tables
1. Open your preferred database management tool (e.g., MySQL Workbench, phpMyAdmin).
2. Create a new database named `orizon` or any other preferred name.
3. Run the SQL script `database/schema.sql` in your database management tool to create the necessary tables for the Orizon API project.
4. After running the script, you should see three tables created: `countries`, `trips`, and `trip_countries` (a JOINT table).
5. The named tables are the ones considered for the creation of this projects. You can use the provided code as a starting point and then develop your own database personalized API.


## API Endpoints

### Trip Endpoints

- **GET /trip/read.php**: Retrieve all trips.
- **POST /trip/create.php**: Create a new trip.
- **PUT /trip/update.php**: Update an existing trip.
- **DELETE /trip/delete.php**: Delete a trip.

### Country Endpoints

- **GET /country/read.php**: Retrieve all countries.
- **POST /country/create.php**: Create a new country.
- **PUT /country/update.php**: Update an existing country.
- **DELETE /country/delete.php**: Delete a country.

## Example Inputs 
(the following were used to test the API on Postman)
### Trip Creation Input
`{
    "available_seats": 100,
    "countries": ["Italy", "Korea", "Spain"]
}`
### Trip Update Input
`{
    "id": 1,
    "available_seats": 80
}`
- input the correct id that you can find using **GET /country/read.php**: Retrieve all countries.
### Trip Deletion Input
`{
    "id": 1
}` 

Inputs for CRUD operations available for the countries table are similarly very easy and simple to apply.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.







