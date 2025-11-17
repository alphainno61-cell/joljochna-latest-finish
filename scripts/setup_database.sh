#!/bin/bash

echo "========================================="
echo "Database Setup Script"
echo "========================================="
echo ""

# Check if .env file exists
if [ ! -f .env ]; then
    echo "❌ .env file not found!"
    echo "Please create .env file from .env.example"
    exit 1
fi

echo "✅ .env file found"
echo ""

# Check database connection
echo "Checking database connection..."
php artisan migrate:status > /dev/null 2>&1
if [ $? -eq 0 ]; then
    echo "✅ Database connection successful"
else
    echo "❌ Database connection failed!"
    echo "Please check your .env file database settings"
    exit 1
fi
echo ""

# Run migrations
echo "Running database migrations..."
php artisan migrate --force
if [ $? -eq 0 ]; then
    echo "✅ Migrations completed successfully"
else
    echo "❌ Migration failed!"
    exit 1
fi
echo ""

# Create storage link
echo "Creating storage symlink..."
if [ -L public/storage ]; then
    echo "✅ Storage link already exists"
else
    php artisan storage:link
    if [ $? -eq 0 ]; then
        echo "✅ Storage link created successfully"
    else
        echo "❌ Failed to create storage link"
        exit 1
    fi
fi
echo ""

# Set permissions
echo "Setting storage permissions..."
chmod -R 775 storage bootstrap/cache 2>/dev/null
echo "✅ Permissions set"
echo ""

# Clear cache
echo "Clearing application cache..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
echo "✅ Cache cleared"
echo ""

echo "========================================="
echo "✅ Setup completed successfully!"
echo "========================================="
echo ""
echo "Next steps:"
echo "1. Upload images through admin dashboard"
echo "2. Verify images display on frontend"
echo "3. Check storage/app/public/social_media/ directory"

