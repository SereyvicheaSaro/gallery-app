# Gallery App with MinIO Server and Laravel

This project is a gallery application built using Laravel and MinIO for storing images.

## Installation Steps

### Prerequisites
- PHP >= 7.2
- Docker

### Running MinIO Server with Docker
1. Run the following command:
    ```bash
    docker-compose up -d
    ```

### Running Laravel Locally
1. Install project dependencies:
    ```bash
    composer install
    ```
2. Copy the environment file:
    ```bash
    cp .env.example .env
    ```
3. Run database migrations:
    ```bash
    php artisan migrate
    ```
4. Seed the database with sample data:
    ```bash
    php artisan db:seed --class ImageSeeder
    ```
5. Create a symbolic link to storage:
    ```bash
    php artisan storage:link
    ```
6. Start the Laravel server:
    ```bash
    php artisan serve
    ```

## Troubleshooting
- If you encounter any issues during installation, try restarting the Docker containers and clearing the cache.

## License
This project is licensed under the [MIT License](LICENSE).

For more information, please visit the [repository](https://github.com/SereyvicheaSaro/gallery-app).
