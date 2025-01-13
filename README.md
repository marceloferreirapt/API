RestAPI Project
Description
This is a Laravel project with authentication based on Laravel Sanctum. It includes CRUD operations for users related to countries and an authentication flow.

First step is to clone the Repo to you local computer with:

git clone https://github.com/marceloferreirapt/API

after you need to run:

composer require laravel/sail --dev

then you should

./vendor/bin/sail up -d
./vendor/bin/sail composer install

./vendor/bin/sail artisan migrate

and then 

./vendor/bin/sail artisan db:seed

Finaly you can import into postman the  colection present in the root of the project to test the api.

Login is the only unprotected method so you can log in
to do the other methods in the colection you need to update the token variable with the response from the login method

to log in you can use the user populated with the seeders:
test@example.com
password

It is already present in the collection.

for example when you login you will recieve:
{
    "token": "2|U1mxFBcZOa5Ax8sqDvM1LkFB6fx1lVXmFEAVAhhxf635cfcf",
    "user": {
        "id": 1,
        "name": "Test User",
        "email": "test@example.com",
        "isActive": 1,
        "created_at": "2025-01-13T03:33:55.000000Z",
        "updated_at": "2025-01-13T03:33:55.000000Z",
        "country_id": 1
    }
}

and you will update the token variable in the collection to 2|U1mxFBcZOa5Ax8sqDvM1LkFB6fx1lVXmFEAVAhhxf635cfcf

You can also just replace in authorization the {{token}} key word for 2|U1mxFBcZOa5Ax8sqDvM1LkFB6fx1lVXmFEAVAhhxf635cfcf
