# retro-customs

Is a sample project portfolio website made in Laravel 8. The website imitates an online store for customized ordering of its products offered. In this project the website focuses in selling retro handheld consoles for modding enthusiast. Once registered as a customer, Users can create a build order of a specific console then assign parts for customization. After order transaction is finished the admin can view all placed orders that the users made.

## Features

1. Product items customization through the admin side.
2. User registration, customization of user addresses.
3. Simulates user product item ordering and customizations of parts included.
4. Order history will be populated upon successful ordering

## Requirements

1. must have composer, download lnk: https://getcomposer.org/doc/00-intro.md
2. must have xampp installed, download link: https://www.apachefriends.org/download.html (must be version 8.0 and above)

## Steps in downloading

1. clone repository on local PC by using the command below:

```
git clone https://github.com/ryanbariuan/retro-customs.git

```

2. after cloning, move inside the created folder via CMD or terminal.

```
cd retro_customs

```

3. once inside the folder, type the following by the command below on your CMD or terminal:

```
php artisan serve

```

4. you can view the project via http://localhost:8000/ on your browser.

5. For the database, run the xampp software and start the MySQL database server and Apache Web Server.

6. Create a table named: retro_customsdb

7. run the following command on your CMD or terminal :

```
php artisan migrate

```

6. This will create the tables on your phpmyadmin via XAMPP on the retro_customsdb.
