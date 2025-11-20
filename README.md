# net-idea-template
Website template of the net-idea web agency

## Features

- ✅ Contact form with validation
- ✅ Database storage of contact submissions
- ✅ Email notifications via SMTP
- ✅ Bootstrap 5 styled UI
- ✅ CSRF protection

## Requirements

- PHP 8.1 or higher
- Composer
- SQLite (or MySQL/PostgreSQL)

## Installation

1. Clone the repository:
```bash
git clone https://github.com/net-idea/net-idea-template.git
cd net-idea-template
```

2. Install dependencies:
```bash
composer install
```

3. Configure environment variables:
```bash
cp .env .env.local
```

4. Edit `.env.local` and configure your database and SMTP settings:
```
# Database (default is SQLite, change if needed)
DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"

# SMTP Configuration for email sending
# Examples:
# Gmail: MAILER_DSN=gmail+smtp://username:password@default
# Generic SMTP: MAILER_DSN=smtp://user:pass@smtp.example.com:port
MAILER_DSN=smtp://localhost:1025

# In ContactController.php, change the recipient email:
# ->to('your-email@example.com')
```

5. Create the database and run migrations:
```bash
php bin/console doctrine:migrations:migrate
```

6. Start the development server:
```bash
php -S localhost:8000 -t public/
```

7. Visit http://localhost:8000/contact

## Configuration

### Email Settings

The contact form sends email notifications when a message is submitted. Configure your SMTP server in `.env.local`:

- **Gmail**: `MAILER_DSN=gmail+smtp://username:password@default`
- **SendGrid**: `MAILER_DSN=sendgrid+smtp://apikey@default`
- **Custom SMTP**: `MAILER_DSN=smtp://user:pass@smtp.example.com:587`

Update the recipient email in `src/Controller/ContactController.php`:
```php
->to('admin@example.com') // Change to your email
```

### Database

By default, the application uses SQLite. To use MySQL or PostgreSQL:

1. Update `DATABASE_URL` in `.env.local`:
```
# MySQL
DATABASE_URL="mysql://user:password@127.0.0.1:3306/dbname?serverVersion=8.0"

# PostgreSQL
DATABASE_URL="postgresql://user:password@127.0.0.1:5432/dbname?serverVersion=16&charset=utf8"
```

2. Run migrations:
```bash
php bin/console doctrine:migrations:migrate
```

## Contact Form Fields

The contact form includes the following fields:
- **Name** (required): Visitor's name
- **Email** (required): Valid email address
- **Subject** (optional): Message subject
- **Message** (required): Message content (minimum 10 characters)

All submissions are:
1. Validated on both client and server side
2. Saved to the database with timestamp
3. Sent via email to the configured recipient

## Development

### Clear cache:
```bash
php bin/console cache:clear
```

### Create new migration:
```bash
php bin/console make:migration
```

### View database records:
```bash
sqlite3 var/data.db "SELECT * FROM contact"
```

## License

See LICENSE file for details.
