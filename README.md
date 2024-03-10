# Orizon API Project

## Description

The Orizon API project is a RESTful API designed to manage travel trips and associated countries. It provides CRUD (Create, Read, Update, Delete) operations for trips and countries, allowing users to create, retrieve, update, and delete trip records, as well as manage the countries involved in each trip.
The API returns results in the form of JSON.

## Features

- Create, Read, Update, and Delete operations for trips
- Manage countries associated with each trip
- Filter trips by available seats and countries
- Simple and intuitive API endpoints

## Usage

1. Clone the repository:
2. Navigate to the project directory:
3. Install dependencies: composer install?
4. Import the database schema:
   - Create a MySQL database named `orizon`.
   - Import the SQL file `database.sql` located in the `sql` directory into the `orizon` database.
5. Configure the database connection:
   - Open the `config/database.php` file.
   - Update the database credentials according to your MySQL configuration.
6. Start the development server (es. start Apache and MySQL on XAMPP)
7. You can now access the API endpoints using Postman or any other HTTP client.

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







