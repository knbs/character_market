# Character Market
## SetUp

 1.- clone this repository
 
 2.- access to the new folder
 
 3.- run `docker-compose build -d`
 
 4.- run `docker exec -it --user www-data docker-php /bin/bash` to use the container console
 
 5.- run `composer install`
 
 6.- run `./vendor/bin/doctrine-migrations migrations:migrate`
 
 7.- `cd frontend`
 
 8.- run `npm run build`
 
 9.- Access to http://localhost:8080
 
 To run the test use `composer run-script phpunit` inside the html directory of the container
