## Laravel Multi Authentication System with AdminLTE3 Dashboard
This project is a Laravel-based multi-authentication system with an AdminLTE3 dashboard. It allows users to authenticate via multiple methods, including email and social media logins. The project is designed to provide a ready-to-use authentication system with an easy-to-use dashboard interface.

## Getting Started
To get started with this project, you will need to have the following software installed:

- PHP (version 7.4 or higher)
- Composer
- MySQL
Once you have installed these prerequisites, you can clone the project to your local machine:
```bash
git clone https://github.com/dev-ashrafbd/Laravel-Multi-Auth.git
```
Next, navigate to the project directory and install the required dependencies:
```bash
cd Laravel-Multi-Auth
composer install
```
Create a new database for the project and configure the database connection in the .env file:
```bash
cp .env.example .env
php artisan key:generate
```
Then, run the database migrations:
``bash
php artisan migrate

You can then start the development server:
```bash
php artisan serve
```
## Usage
Once the development server is running, you can access the project at http://localhost:8000.

The authentication system is preconfigured to allow users to register via email, as well as to login via social media accounts such as Facebook, Twitter, and Google.

The dashboard interface is based on the popular AdminLTE3 template, and includes various components such as charts, tables, and forms.

## Contributing
Contributions to this project are welcome! If you find a bug or would like to suggest an improvement, please create a new issue or submit a pull request.

## License
This project is licensed under the MIT license.
