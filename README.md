<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Peek-A-Book
<br>
The marketplace for book & comic lover who can't get enough of reading material 

## How to run the project
1. Run `composer install` to generate depedencies (the vendor folder)
2. Create `.env` file in the root of the project (next to .env.example)
3. Copy all the data from `.env.example` to `.env`. 
4. Run `php artisan key:generate`
5. CActivate XAMPP & MySQL service. 
6. Create the DB and configure the `.env`
7. Run `php artisan migrate:fresh --seed`
8. Run `php artisan storage:link`
9. Run the web using `php artisan serve` and voila it's ready to run!

## Account for Trial
Seller :
- Email = admin@admin.com
- Password = 12345

Customer :
- Email = customer@customer.com
- Password = 12345
## Created By
2301860154 - Jonathan Kristanto

The design & architecture is inspired from COMP6681001 - Web Programming Lab
