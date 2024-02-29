# Microservices Application with Laravel

This is a sample microservices application built with Laravel, implementing DDD and CQRS principles.

## Setup Instructions

1. Clone this repository.
2. Navigate to the root directory of the project.
3. Run `docker-compose up --build` to build and start the Docker containers.
4. Access the "users" service at `http://localhost:8000`.
5. Access the "notifications" service at `http://localhost:8001`.

## Running Tests

To run tests, navigate to each service directory and run PHPUnit:

```bash
cd users-service
php artisan test

cd ../notifications-service
php artisan test
