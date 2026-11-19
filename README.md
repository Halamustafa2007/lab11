# PHP User Validation Web Application

## Aim
To create a PHP web application that accepts a username and password, checks the details against records stored in a MySQL database, and displays a successful login page or an error message.

## Technologies
- HTML and CSS
- PHP
- MySQL
- XAMPP (Apache and MySQL)

## Project files
- `index.php` – login form
- `login.php` – checks the submitted username and password against the database
- `db.php` – connects PHP to MySQL
- `dashboard.php` – displays the successful login message
- `logout.php` – ends the login session
- `setup.php` – creates the database, table, and demo account
- `assets/style.css` – page styling

## How to run using XAMPP
1. Install and open XAMPP.
2. Start **Apache** and **MySQL**.
3. Copy the complete `PHP_User_Validation_Login` folder into `C:\xampp\htdocs\`.
4. Open this address in your browser:
   `http://localhost/PHP_User_Validation_Login/setup.php`
5. When the setup success message appears, open:
   `http://localhost/PHP_User_Validation_Login/`
6. Test using:
   - Username: `student`
   - Password: `Student@123`
7. Try an incorrect password to see the failure message.
8. Click **Log out** to end the session.
9. For safety, delete `setup.php` after the database has been created.

## Expected result
- Correct username and password: the application opens the successful login page.
- Incorrect username or password: an error message is displayed on the login page.

## Security used
- Passwords are stored as hashes using PHP `password_hash()`.
- Passwords are checked using `password_verify()`.
- A prepared SQL statement is used to reduce SQL injection risk.
- Session access is checked before showing the dashboard.

**Note:** GitHub Pages does not execute PHP. Uploading this project to GitHub stores and displays the source code, but you need XAMPP or a PHP hosting service to run it.
