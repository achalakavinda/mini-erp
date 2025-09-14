# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel-based Management Information System (MIS) for inventory, project, and HR management. The system integrates multiple modules including Project Management, Site Inventory Management, and HRMS.

## Technology Stack

- **Backend**: Laravel 9.x (PHP 8.0+)
- **Frontend**: Laravel Mix with React components, Bootstrap 5
- **Database**: MySQL
- **Authentication**: Laravel's built-in authentication with Spatie Laravel Permission for ACL
- **Testing**: PHPUnit

## Development Commands

### Environment Setup
```bash
# Initial setup
composer install
cp .env.example .env
# Update database configuration in .env
php artisan migrate:refresh
php artisan db:seed
php artisan serve
```

### Development
```bash
# Start Laravel development server
php artisan serve

# Asset compilation
npm run dev              # Development build
npm run watch           # Watch for changes
npm run prod            # Production build

# Database operations
php artisan migrate:refresh    # Reset and re-run migrations
php artisan db:seed           # Seed database with test data
```

### Testing
```bash
# Run all tests
vendor/bin/phpunit

# Run specific test suites
vendor/bin/phpunit tests/Unit
vendor/bin/phpunit tests/Feature
```

### Code Generation
```bash
# Generate IDE helper files (already configured)
php artisan ide-helper:generate
php artisan ide-helper:models
```

## Architecture & Structure

### Core Modules
- **Project Management**: Multi-site project management with tracking, monitoring, and planning
- **IMS (Inventory Management)**: Site warehouse management, category-wise products, material requisition, purchase orders
- **HRMS**: Employee management, attendance tracking, timesheet management, cost calculation
- **Accounting**: General ledger, payments, account types, financial reporting
- **CMS/Blog**: Content management with places, reviews, and facilities

### Key Directories
- `app/Http/Controllers/`: Organized by modules (Admin, Accounting, Ims, etc.)
- `app/Models/`: Domain models organized by functionality (Accounting, Blog, etc.)
- `database/migrations/`: Extensive migration history for all modules
- `database/seeders/`: Test data seeders for development
- `resources/js/`: React components for interactive features
- `routes/web.php`: Main application routes with middleware groups

### Authentication & Permissions
- Uses Spatie Laravel Permission package for role-based access control
- Authentication routes handled by Laravel's built-in Auth system
- All application routes protected by 'auth' middleware group

### Frontend Integration
- Laravel Mix processes React components (app.js, item.js, supplier.js)
- Bootstrap 5 with custom styling
- React components for specific inventory and supplier functionality

### Database Design
- Comprehensive migrations covering all business domains
- Uses views for complex queries (AccountView, InvoicePaymentView, etc.)
- Seeded with realistic test data via multiple seeders

## Development Guidelines

- Follow Laravel conventions and existing code patterns
- Controllers are organized by business domain (Ims/, Accounting/, etc.)
- Models use proper namespacing by domain
- React components should follow existing patterns in resources/js/
- Database changes require migrations
- Use existing seeders for consistent test data

## Key Configuration Files
- `.env.example`: Environment template with database and mail configuration
- `webpack.mix.js`: Asset compilation configuration for React components
- `phpunit.xml`: Test configuration with proper environment settings