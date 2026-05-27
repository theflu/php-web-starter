# PHP Web Starter

A lightweight, containerized starter kit for building PHP web applications. Out-of-the-box support for modern templating, PSR-7/15 routing, environment configuration, and responsive Bootstrap layouts with built-in dark mode.

---

## Features

- **PHP 8.5 & Apache**: Containerized runtime.
- **Twig 3.0**: Premium templating engine for clean separation of concerns.
- **APIRouter**: Custom, lightweight, and PSR-compliant routing system.
- **Bootstrap 5.3.8**: Fully integrated responsive UI components.
- **Dark Mode Support**: Automated light/dark mode toggling out of the box.
- **Docker Compose Setup**: Development and production orchestrations ready.

---

## Directory Structure

```text
├── Dockerfile                  # Production Apache/PHP image setup
├── docker-compose.yml          # Production container orchestration
├── docker-compose-devel.yml    # Development setup with live reload/volumes
├── composer.json               # Package dependencies (Twig, APIRouter)
├── .env / sample.env           # Environment configurations
└── src/                        # Application source code
    ├── lib/                    # Application logic
    │   ├── app.php             # Core bootstrap & Twig environment setup
    │   ├── config.php          # Base constants and configuration
    │   ├── routes/             # Route definition files (loaded dynamically)
    │   │   └── main.php        # HTTP endpoints configuration
    │   └── views/              # Twig HTML templates
    │       ├── index.twig      # Homepage pricing layout (Bootstrap demo)
    │       └── template.twig   # Shared base layout (CSS/JS assets, dark mode toggle)
    └── public_html/            # Web server document root
        ├── .htaccess           # URL rewriting rules for clean URLs
        ├── index.php           # Front controller / Entry point
        ├── css/
        │   └── main.css        # Custom styles and Bootstrap overrides
        └── js/
            └── color-modes.js  # Theme toggler logic
```

---

## Getting Started

### Prerequisites

- [Docker](https://docs.docker.com/get-docker/)
- [Docker Compose](https://docs.docker.com/compose/install/)

### Running Locally (Development)

1. **Clone the repository and set up environment files:**
   ```bash
   cp sample.env .env
   ```

2. **Start the development server:**
   ```bash
   docker compose -f docker-compose-devel.yml up --build
   ```
   *This command mounts the `./src` folder, installs Composer dependencies inside the container, and starts Apache with auto-reload capability.*

3. **Access the application:**
   Open [http://localhost:8080](http://localhost:8080) in your web browser.

---

## Development Guide

### 1. Managing Dependencies
Composer is used for dependency management. Use `composer require <vendor>/<package>` to add new dependencies. Dependencies go to the root `composer.json`. Dependencies are installed automatically at container startup in development mode. In production mode, dependencies are installed at container build time.

### 2. Adding Routes
Define routes inside the `src/lib/routes/` directory. Files in this directory are loaded automatically by `APIRouter\Router`.

Example route in `src/lib/routes/main.php`:
```php
use APIRouter\ServerRequest;
use APIRouter\Response;

global $router;
global $twig;

$router->get('/about', function (ServerRequest $req) use ($twig) {
    $body = $twig->render('about.twig');
    return new Response(200, [], $body);
});
```

### 3. Building Views
Templates use Twig and are located under `src/lib/views/`. Create layout-specific files extending `template.twig`:
```html
{% extends 'template.twig' %}

{% block content %}
    <h1>My Content</h1>
{% endblock %}
```

### 4. Custom Styling & Scripting
- Custom styles: `src/public_html/css/main.css`
- Custom JS: `src/public_html/js/`