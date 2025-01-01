<p align="center"><a href="https://github.com/sajida-dev/University-Management-System-Laravel-Project" target="_blank"><img src="https://github.com/sajida-dev/University-Management-System-Laravel-Project/blob/main/public/assets/logo1.png" width="400" alt="University Management System Logo"></a></p>


<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## University Management System

This is a **University Management System** built with Laravel. The application manages various functionalities such as **course management**, **student registration**, **faculty management**, **department management**, and more. It leverages Laravel’s elegant syntax to make development smooth, scalable, and secure.

### Features

- **Student Registration & Profile Management**: Students can register, update their profiles, and manage their courses.
- **Course Allocation**: Faculty can allocate courses to students.
- **Faculty Management**: Manage faculty profiles and their departments.
- **Department Management**: Manage departments, courses, and related staff.
- **Role-Based Access Control**: Different user roles, including Admin, Faculty, and Student, with tailored access to functionalities.
- **Real-time Event Broadcasting**: Real-time updates for users, including notifications and alerts.
- **Secure Authentication**: Integrated with Laravel Breeze for fast and secure authentication.

## Installation

### Prerequisites

- PHP >= 8.0
- Composer
- Laravel >= 10.x
- A local database (e.g., MySQL)

### Steps to Set Up the Project

1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/university-management-system.git
    cd university-management-system
    ```

2. Install dependencies using Composer:
    ```bash
    composer install
    ```

3. Create a `.env` file by copying the example:
    ```bash
    cp .env.example .env
    ```

4. Generate the application key:
    ```bash
    php artisan key:generate
    ```

5. Set up your database connection in the `.env` file.

6. Run migrations to create the necessary database tables:
    ```bash
    php artisan migrate
    ```

7. (Optional) Seed the database with test data:
    ```bash
    php artisan db:seed
    ```

8. Run the application:
    ```bash
    php artisan serve
    ```

    Visit `http://localhost:8000` in your browser to access the University Management System.

## Learning Laravel

For more information on how to use and customize Laravel, visit the [official Laravel documentation](https://laravel.com/docs).

## Contributing

Thank you for considering contributing to the University Management System project! If you’d like to contribute, please follow the steps in the [contribution guide](https://laravel.com/docs/contributions).

## Code of Conduct

To ensure a welcoming and inclusive environment, please review and follow the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover any security vulnerabilities, please contact us directly at [security@universitymanagement.com](mailto:security@universitymanagement.com).

## License

The University Management System is open-sourced software licensed under the [MIT License](https://opensource.org/licenses/MIT).
