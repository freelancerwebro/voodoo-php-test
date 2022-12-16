# Voodoo PHP test

From a base laravel project, setup a database connection and seed a few of the built-in user models
Create a job that picks one of the seeded users at random and writes the user as a JSON object to the log file
Create an API endpoint and a console command that pushes an instance of this job to the queue without duplicating the code that does this
Write tests that cover the above

## Requirements
- composer
- PHP

## Installation
Run the following command from the terminal:
```
./deploy.sh
```

## Seed Database
Run the following command from the terminal:
```
./seed.sh
```

## Usage

### Api
- POST `/users/random`: Log a random user to file

### Command
```
php artisan command:users:random
```

## Run tests
```
php artisan test
```
