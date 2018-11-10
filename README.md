# Welcome
I've built a client database webpage using a custom-built login system with PHP and SQL database.

# Directions
1) In the "database-files" folder, you'll find 4 files: 2 are for the database connections used throughout the source code, and the other 2 (with .sql extensions) are the schemas for our SQL database.
2) First, run each of the schemas for the 2 databases we will be using to MySQL or any SQL Workbench you prefer. You should execute both the "client_info_db" and the "client_login_db_schema" seperately. 
3) Afterwards, go into the "client_database-connection" and "login_database-connection" files and change the "$dbServername", "$dbUsername", "$dbPassword" variables FOR EACH FILE so that it correctly matches your local database connection settings.
4) Run the PHP server and load the webpage!

# Technology Used
PHP5, HTML5, Bootstrap, jQuery, MySQL.

# The How & What
Upon registering or logging in, the user will be able to access their client list, and even add new clients to the database.

Click "Sign Up" to register if a login has not already been created. After registering, users can either use their username or e-mail to log in.



