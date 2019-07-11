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

Front End Source
----------------

TODO:

Back End Source
---------------

TODO:

Instuctions
-----------

TODO: