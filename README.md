# POS System API Setup

This README provides instructions on how to set up and run the POS System API cloned from [github](https://github.com/sontus/pos-system-api.git).

## Prerequisites

Before setting up the project, ensure you have the following software installed:

- **PHP (>=8.2)**
- **Composer** (for managing PHP dependencies)
- **MySQL** (or any other database supported by Laravel)
- **Git** (for cloning the repository)

### 1. Clone the Repository

First, clone the project repository to your local machine:

```bash
git clone https://github.com/sontus/pos-system-api.git
```

Navigate to the project directory:

```bash
cd pos-system-api
```

### 2. Install PHP Dependencies

Next, run Composer to install the project’s PHP dependencies:

```bash
composer install
```

### 3. Set Up the Environment File

Copy the `.env.example` file to create a new `.env` file:

```bash
cp .env.example .env
```

### 4. Configure Environment Variables

Open the `.env` file and configure your environment settings, such as the database connection and other API-related configurations.

- Database settings:
  ```ini
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database_name
  DB_USERNAME=your_database_username
  DB_PASSWORD=your_database_password
  ```

- You may need to adjust other configuration variables depending on your system (e.g., `APP_KEY`, `MAIL_*` settings).

### 5. Generate Application Key

Generate a new Laravel application key by running:

```bash
php artisan key:generate
```

This will set the `APP_KEY` in the `.env` file automatically.

### 6. Set Up Database

Run the following command to run any migrations needed to set up the database:

```bash
php artisan migrate
```

If there are any seeders or additional setup steps, you can run them using:

```bash
php artisan db:seed
```

### 7. Start the Development Server

To start the Laravel development server, use the following command:

```bash
php artisan serve
```

By default, the application will be accessible at `http://localhost:8000`.

### 8. API Documentation Link

You can access the API documentation at `https://documenter.getpostman.com/view/6594502/2sAYX3qi94` to explore the available endpoints and interact with the API.


