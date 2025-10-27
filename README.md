# News Portal (PHP)

A simple PHP-based news portal that allows users to register, log in, view categorized news, and post comments. Admins can add and delete news articles and moderate comments.

---

## Features

- User registration and login
- Admin dashboard for managing news
- Categorized news display
- Comment system with user/admin permissions
- Basic styling via CSS
- MySQL database integration

---

## Technologies

- PHP (vanilla)
- MySQL
- HTML/CSS
- phpMyAdmin (for DB setup)

---

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/lapcevicmarko/Vanilla-PHP-News-App.git

2. Import the SQL schema:
   - Open phpMyAdmin
   - Create a database named users
   - Import users.sql file

3. Configure database connection:
   - In Connection.php, adjust credentials if needed:
     $host = "localhost";
     $user = "root";
     $password = "";
     $database = "users";
     
4. Run the app:
   - Place files in your local server directory (e.g. htdocs)
   - Access via http://localhost/Vanilla-PHP-News-App/index.php
  
---

## User Roles

- Regular User (status = 3): Can view news and post/delete own comments
- Admin (status = 4): Can add/delete news and moderate all comments

---

## File Structure

- index.php                 # Registration page
- config/
   - Connection.php         # DB connection
- classes/
   - User.class.php         # User logic
   - News.class.php         # News logic
   - Comment.class.php      # Comment logic
- pages/
   - login.php              # Login page
   - adminWelcome.php       # Admin dashboard
   - userWelcome.php        # User dashboard
   - addNews.php            # Add news form
   - delNews.php            # Delete news
   - selectNews.php         # News listing
   - viewNews.php           # Single news view + comments
- assets/
   - style.css              # Basic styling
- database/
   - users.sql              # Database schema

---

## Licence

This project is licensed under the MIT License.

---

## Author

Developed by Marko Lapčević.