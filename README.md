Contacts Book
=============

Learning full stack development using [laravel](https://laravel.com/)

Tasks
-----

Create an application which consists of the below mentioned functionalities:
1. Signup using email (unique) and password (check strength).
2. Reset password functionality using email.
3. Data entry using CSV:
    * User should be able to upload a CSV file containing information of people which should be contacted by him (must include name, email, contact number, address and PIN code).
    * Email addresses of the people under a user should be unique (same email address cannot be repeated under different users).
    * Email and PIN Code should be in correct format.
    * All entries in a CSV file should be verified and if something is wrong, no row should be added to the DB and all errors should be listed along with row numbers and corresponding error messages.
4. User permissions:
    * Normal: can upload CSV, view and edit all the rows under him.
    * Moderator: can view the rows under any user but can not edit them.
    * Admin: can view and edit data under any user.
5. View and edit data:
    * User should be able to view all the data according to the permissions with filters on email, pincode and username (only for moderator and admin).
    * Admin/Normal user should see a button to change the status of a person/row. Default status should be “New”. Other possible status are (“Failed”, “In process”, “Successful”)
    * Admin/Normal user should also be able to edit fields like contact number, address, PINCODE.
    * Moderator should be able to view the status with other fields.
6. Validation should be added (both front-end and back-end) wherever required: signup, upload CSV (email: format and unique, pincode: format).

Instuctions
-----------

To run on local server
1. Clone repository `git clone https://github.com/pawanmsr/contacts-book.git`  
2. Create a *.env* file to store credentials  
Predefined templates are available with [composer](https://getcomposer.org/) installation  
3. Create a new database and enter the credentials in *.env* file  
4. Migrate tables to database `php artisan migrate --seed`  
5. Install maatwebsite package `composer install maatwebsite/excel`  
6. Run the project `php artisan serve --host=<YOUR IP> --port=<PORT>`  
Get ip from network settings or use tools like **ipconfig**  
The PORT can be any free port  

Distribute IP:PORT for local network access

Source
------

### Database Tables
All layouts in this website are the default provided by laravel through `make:auth` command.
The database consists of two primary tables: *users* and *contacts* (see *database/migrations/* for more details).
The corresponding model files are *app/Users.php* and *app/Contacts.php*.

### Authentication
This website uses middlewares for authentication purposes (which, although is easier to implement, is not the best way to do multiple authentication). Another way is to use guards.

Three middlewares and three controllers correspond to three user roles: *normal user*, *moderator*, *admin*.
Find them in *app/Http/Controllers* and *app/Http/Middleware*.
The *HomeController* is the normal user controller. Controllers and middleware for other user roles are named with the user role as prefix.

All the routes go through the respective middleware and redirect if access is denied. 

### Templates and Routes

All webpage templates are in *resources/views/*  
See *resources/routes/web.php* for details
