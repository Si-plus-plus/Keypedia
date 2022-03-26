<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

#### Felicia Limanta - 2301947281
#### COMP6681001 - Web Programming
#### Project

<hr>

# Brief
A simple website to buy keyboards. All features are mainly based on the question sheet.

# Running the app
1. Create a MySQL database
2. Run `composer update` to update dependencies
3. Make an `.env` and edit the values (DB Host, Port, etc.) based on your setup
4. Run `php artisan key:generate`
5. Run `php artisan migrate --seed` to create the tables and seed the database
6. Run `Run php artisan storage:link` to link storage
7. Run `php artisan serve` to run the app through the generated local url

# References
All keyboard images and description belong to their respective owners. 

# License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
