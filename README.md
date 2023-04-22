# Jobsearch api
This is api for [jobsearch app](https://github.com/limvus/jobsearch-app).

## Features
- User and Employer section
- Job listing
- Job filter by category and location radius
- Comments and Rating

## How to setup
- Clone the repo  
    git@github.com:limvus/jobsearch-api.git
- copy .env.example to .env and setup the database variable
- run: docker-compose up -d
- go inside container app: docker-compose exec app bash
- then run: composer install
- then run: php artisan migrate refresh --seed
- finally visit: http://localhost:8000 for api (should return "Welcome to loksewa")  
    and http://localhost:8081 for phpmyadmin

## Api
- The api is available at: http://localhost:8000/api/v1/
- For e.g:  
    http://localhost:8000/api/v1/public/posts
    http://localhost:8000/api/v1/login {email: "sudip@gmail.com", "password": "password"}
- To view list of routes: php artisan route:list (run inside app container)
    


