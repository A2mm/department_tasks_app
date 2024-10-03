## About project

---

-   This is simple App with specific screens for two roles (manager, employee)
-   role manager can take all actions on three modules (departments, employees, tasks)
-   role manager have access only on his employees
-   role employee can only see and updated tasks assigned to

## How to get started

---

## Installation

    git clone or download project
    take copy of .env.example and name it as .env
    run composer install
    php artisan key:generate

_/_ create database with name of your choice >>>> in .env file

-   run php artisan migrate command through your terminal to publish all tables on database
-   run php artisan db:seed to fill users table with some records
-   seeding will provide you with two credentials for two roles (manager, employee)

## Role Priviliges

-   login with employee credentials (access to authorized tabs, other tabs are hidden)
-   login with employee credentials (access to all tabs)

## Tools Used

-   php
-   laravel
-   mysql
-   bootstrap
-   html
-   css
-   git bash
