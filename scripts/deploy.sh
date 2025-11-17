#!/bin/bash

##############################################
# Joljochna Deployment Script
# Run this on your hosting server after uploading files
##############################################

echo "======================================"
echo "Joljochna Deployment Script"
echo "======================================"
echo ""

# Check if .env exists
if [ ! -f .env ]; then
    echo "❌ Error: .env file not found!"
    echo "Please copy .env.production to .env and configure it"
    exit 1
fi

echo "Step 1: Setting directory permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || chown -R apache:apache storage bootstrap/cache 2>/dev/null || echo "⚠️  Warning: Could not change ownership (might need sudo)"
echo "✓ Permissions set"
echo ""

echo "Step 2: Installing Composer dependencies..."
if command -v composer &> /dev/null; then
    composer install --optimize-autoloader --no-dev
    echo "✓ Composer dependencies installed"
else
    echo "⚠️  Composer not found. Install dependencies manually"
fi
echo ""

echo "Step 3: Clearing and caching configuration..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
echo "✓ Caches cleared and rebuilt"
echo ""

echo "Step 4: Running database migrations..."
php artisan migrate --force
echo "✓ Migrations completed"
echo ""

echo "Step 5: Creating storage link..."
php artisan storage:link
echo "✓ Storage link created"
echo ""

echo "Step 6: Optimizing application..."
php artisan optimize
echo "✓ Application optimized"
echo ""

echo "======================================"
echo "✓ Deployment completed successfully!"
echo "======================================"
echo ""
echo "Important: Please update the following in your .env:"
echo "  - APP_URL with your actual domain"
echo "  - DB_* credentials"
echo "  - MAIL_* settings"
echo ""
echo "Test your site at: $(grep APP_URL .env | cut -d '=' -f2)"
echo ""

