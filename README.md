# Laravel Serkom Starter Kit

A lightweight Laravel starter template featuring a dynamic landing page and product CRUD management with vanilla CSS.

## Features

- **Landing Page (`/`)**: Displays product catalog directly from the database.
- **Product CRUD (`/products`)**: Create, read, update, and delete products with image upload support.
- **Pure CSS**: Self-contained styling in `public/css/style.css` without external dependencies.
- **Automated Tests**: Feature tests included via Pest/PHPUnit.

## Installation

### Via Composer

```bash
composer create-project chilhan23/starter-kit-serkom project-name
cd project-name
```

### Via Git

```bash
git clone https://github.com/Chilhan23/starter-kit-serkom.git project-name
cd project-name
composer install
```

## Setup

1. Copy the environment file and generate app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

2. Configure database credentials in `.env`, then run migrations:
   ```bash
   php artisan migrate
   ```

3. Start the local development server:
   ```bash
   php artisan serve
   ```

   - Landing page: `http://127.0.0.1:8000`
   - Product manager: `http://127.0.0.1:8000/products`

## Testing

Run the test suite:

```bash
php artisan test
```

## License

This project is open-sourced software licensed under the [MIT license](LICENSE).
