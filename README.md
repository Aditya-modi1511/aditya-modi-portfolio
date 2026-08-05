# Portfolio Website

This repository contains the personal portfolio website for Aditya Alkeshkumar Modi. It is a PHP-based, responsive portfolio site built for XAMPP / Apache with a contact form powered by PHPMailer and a MySQL database.

## Live Demo
The site is designed to run locally under XAMPP at a URL such as:

`http://localhost/portfolio/`

## Features

- Home section with hero banner and animated typing effect
- About section with professional profile and timeline
- Expertise section highlighting skills in SEO, UI/UX, programming, and tools
- Projects or experience sections for showcasing work
- Contact form with email delivery and database storage
- Custom cursor and animated background effects
- Responsive design supported via CSS

## Folder Structure

- `index.php` — main homepage and contact form handling
- `assets/css/` — site styles, responsive layout, and animations
- `assets/js/` — cursor, typing effect, and any additional interaction scripts
- `assets/images/` — hero profile image and other visuals
- `includes/config.php` — database connection using PDO
- `includes/mail_config.php` — SMTP configuration for PHPMailer
- `includes/send_mail.php` — contact form email and sanitization logic
- `includes/phpmailer/` — PHPMailer library files
- `database/portfolio.sql` — SQL script to create the database and `contact_messages` table

## Requirements

- PHP 7.4+ or PHP 8
- MySQL / MariaDB
- Apache or compatible web server
- XAMPP (recommended for local development)

## Installation

1. Copy the project folder into your XAMPP `htdocs` directory.
2. Start Apache and MySQL from the XAMPP control panel.
3. Import the SQL file into your database:
   - Open phpMyAdmin
   - Import `database/portfolio.sql`

## Configuration

1. Open `includes/config.php` and verify your database credentials:

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'portfolio');
```

2. Open `includes/mail_config.php` and configure email settings:

```php
define('MAIL_TO', 'aadimodi21@gmail.com');
define('SMTP_HOST', 'smtp.gmail.com');
define('SMTP_PORT', 587);
define('SMTP_USER', 'aadimodi21@gmail.com');
define('SMTP_PASS', 'your_gmail_app_password');
define('SMTP_FROM_EMAIL', 'aadimodi21@gmail.com');
define('SMTP_FROM_NAME', 'Portfolio Contact Form');
```

3. If using Gmail SMTP, create an App Password and paste it into `SMTP_PASS`.

## Contact Form Behavior

- Submits to the same `index.php` page
- Validates name, email, subject, and message fields
- Sends an email to the configured recipient using PHPMailer
- Saves successful contact records in the `contact_messages` table
- Shows success or error notifications to visitors

## Notes

- The project uses `PHPMailer` from `includes/phpmailer/`
- The database table is `contact_messages` with fields: `id`, `name`, `email`, `subject`, `message`, `created_at`
- CSS files include custom styles, responsive breakpoints, and animations

## Customization

- Update text, sections, and images in `index.php`
- Change styles in `assets/css/style.css`, `responsive.css`, and `animations.css`
- Add or modify scripts in `assets/js/`
- Update contact email settings and recipient address in `includes/mail_config.php`

## License

This repository contains personal portfolio assets. Adjust the license or add a `LICENSE` file if you want to share it publicly.
