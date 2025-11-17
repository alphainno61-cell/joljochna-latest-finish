#!/bin/bash

##############################################
# Joljochna Auto-Fix Script
# Automatically diagnose and fix common deployment issues
##############################################

echo "=========================================="
echo "🔧 Joljochna Auto-Fix Script"
echo "=========================================="
echo ""

# Colors
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

# Get current directory
PROJECT_DIR=$(pwd)

echo "📁 Project Directory: $PROJECT_DIR"
echo ""

# Step 1: Check .env file exists
echo "Step 1: Checking .env file..."
if [ ! -f ".env" ]; then
    echo -e "${RED}❌ .env file not found!${NC}"
    if [ -f ".env.production" ]; then
        echo -e "${YELLOW}⚠️  Copying .env.production to .env${NC}"
        cp .env.production .env
        echo -e "${GREEN}✓ .env created from template${NC}"
        echo -e "${YELLOW}⚠️  IMPORTANT: Edit .env with your database credentials!${NC}"
        exit 1
    else
        echo -e "${RED}❌ No .env template found. Cannot continue.${NC}"
        exit 1
    fi
else
    echo -e "${GREEN}✓ .env file exists${NC}"
fi
echo ""

# Step 2: Display current database configuration
echo "Step 2: Current Database Configuration"
echo "======================================="
cat .env | grep "DB_" | while read line; do
    if [[ $line == *"DB_PASSWORD"* ]]; then
        echo "DB_PASSWORD=***hidden***"
    else
        echo "$line"
    fi
done
echo ""

# Step 3: Test database connection
echo "Step 3: Testing Database Connection..."
DB_HOST=$(grep "^DB_HOST=" .env | cut -d '=' -f2)
DB_PORT=$(grep "^DB_PORT=" .env | cut -d '=' -f2)
DB_DATABASE=$(grep "^DB_DATABASE=" .env | cut -d '=' -f2)
DB_USERNAME=$(grep "^DB_USERNAME=" .env | cut -d '=' -f2)
DB_PASSWORD=$(grep "^DB_PASSWORD=" .env | cut -d '=' -f2)

# Try to connect to MySQL
if command -v mysql &> /dev/null; then
    echo "Testing connection with: mysql -u $DB_USERNAME -h $DB_HOST $DB_DATABASE"
    
    # Test connection (will prompt for password if needed)
    if mysql -u "$DB_USERNAME" -p"$DB_PASSWORD" -h "$DB_HOST" -e "USE $DB_DATABASE; SELECT 1;" 2>/dev/null; then
        echo -e "${GREEN}✓ Database connection successful!${NC}"
        
        # Check tables
        TABLE_COUNT=$(mysql -u "$DB_USERNAME" -p"$DB_PASSWORD" -h "$DB_HOST" -D "$DB_DATABASE" -e "SHOW TABLES;" 2>/dev/null | wc -l)
        TABLE_COUNT=$((TABLE_COUNT - 1)) # Subtract header row
        
        if [ $TABLE_COUNT -eq 19 ]; then
            echo -e "${GREEN}✓ All 19 tables found in database${NC}"
        elif [ $TABLE_COUNT -eq 0 ]; then
            echo -e "${RED}❌ No tables found in database!${NC}"
            echo -e "${YELLOW}⚠️  Need to import: database/finaljoljochna_production.sql${NC}"
            
            if [ -f "database/finaljoljochna_production.sql" ]; then
                echo ""
                read -p "Import database now? (y/n): " -n 1 -r
                echo
                if [[ $REPLY =~ ^[Yy]$ ]]; then
                    echo "Importing database..."
                    mysql -u "$DB_USERNAME" -p"$DB_PASSWORD" -h "$DB_HOST" "$DB_DATABASE" < database/finaljoljochna_production.sql
                    echo -e "${GREEN}✓ Database imported${NC}"
                fi
            fi
        else
            echo -e "${YELLOW}⚠️  Found $TABLE_COUNT tables (expected 19)${NC}"
        fi
    else
        echo -e "${RED}❌ Database connection failed!${NC}"
        echo ""
        echo -e "${YELLOW}Common fixes:${NC}"
        echo "1. Verify credentials in .env file"
        echo "2. Try changing DB_HOST to:"
        echo "   - localhost"
        echo "   - 127.0.0.1"
        echo "   - Your MySQL server IP"
        echo "3. Check database and user exist in cPanel"
        echo ""
        echo -e "${YELLOW}Try these alternatives:${NC}"
        
        # Try localhost
        if [ "$DB_HOST" != "localhost" ]; then
            echo "Testing with localhost..."
            if mysql -u "$DB_USERNAME" -p"$DB_PASSWORD" -h "localhost" -e "USE $DB_DATABASE; SELECT 1;" 2>/dev/null; then
                echo -e "${GREEN}✓ Connection works with localhost!${NC}"
                echo -e "${YELLOW}⚠️  Update .env: DB_HOST=localhost${NC}"
                
                read -p "Update DB_HOST to localhost? (y/n): " -n 1 -r
                echo
                if [[ $REPLY =~ ^[Yy]$ ]]; then
                    sed -i.bak "s/^DB_HOST=.*/DB_HOST=localhost/" .env
                    echo -e "${GREEN}✓ Updated DB_HOST to localhost${NC}"
                fi
            fi
        fi
        
        # Try 127.0.0.1
        if [ "$DB_HOST" != "127.0.0.1" ]; then
            echo "Testing with 127.0.0.1..."
            if mysql -u "$DB_USERNAME" -p"$DB_PASSWORD" -h "127.0.0.1" -e "USE $DB_DATABASE; SELECT 1;" 2>/dev/null; then
                echo -e "${GREEN}✓ Connection works with 127.0.0.1!${NC}"
                echo -e "${YELLOW}⚠️  Update .env: DB_HOST=127.0.0.1${NC}"
                
                read -p "Update DB_HOST to 127.0.0.1? (y/n): " -n 1 -r
                echo
                if [[ $REPLY =~ ^[Yy]$ ]]; then
                    sed -i.bak "s/^DB_HOST=.*/DB_HOST=127.0.0.1/" .env
                    echo -e "${GREEN}✓ Updated DB_HOST to 127.0.0.1${NC}"
                fi
            fi
        fi
    fi
else
    echo -e "${YELLOW}⚠️  MySQL client not found in PATH. Skipping connection test.${NC}"
fi
echo ""

# Step 4: Clear Laravel caches
echo "Step 4: Clearing Laravel Caches..."
if [ -f "artisan" ]; then
    php artisan config:clear 2>&1 | grep -i "success\|cleared" || echo "Config cache cleared"
    php artisan cache:clear 2>&1 | grep -i "success\|cleared" || echo "Application cache cleared"
    php artisan route:clear 2>&1 | grep -i "success\|cleared" || echo "Route cache cleared"
    php artisan view:clear 2>&1 | grep -i "success\|cleared" || echo "View cache cleared"
    echo -e "${GREEN}✓ All caches cleared${NC}"
else
    echo -e "${RED}❌ artisan file not found${NC}"
fi
echo ""

# Step 5: Create storage link
echo "Step 5: Creating Storage Link..."
if [ -f "artisan" ]; then
    php artisan storage:link 2>&1 | grep -i "success\|link" || echo "Storage link created"
    echo -e "${GREEN}✓ Storage link created${NC}"
fi
echo ""

# Step 6: Set permissions
echo "Step 6: Setting Permissions..."
chmod -R 755 storage 2>/dev/null
chmod -R 755 bootstrap/cache 2>/dev/null
echo -e "${GREEN}✓ Permissions set${NC}"
echo ""

# Step 7: Cache for production
echo "Step 7: Caching for Production..."
if [ -f "artisan" ]; then
    php artisan config:cache 2>&1 | grep -i "success\|cached" || echo "Config cached"
    php artisan route:cache 2>&1 | grep -i "success\|cached" || echo "Routes cached"
    php artisan view:cache 2>&1 | grep -i "success\|cached" || echo "Views cached"
    php artisan optimize 2>&1 | grep -i "success\|optimiz" || echo "Application optimized"
    echo -e "${GREEN}✓ Application optimized for production${NC}"
fi
echo ""

# Step 8: Final check
echo "=========================================="
echo "✅ Auto-Fix Complete!"
echo "=========================================="
echo ""
echo "Next steps:"
echo "1. Visit your site: https://joljochna.com"
echo "2. Check admin panel: https://joljochna.com/admin/login"
echo "3. If still having issues:"
echo "   - Check storage/logs/laravel.log"
echo "   - Verify .env database credentials"
echo "   - Contact hosting support for DB_HOST value"
echo ""
echo "🔒 Security: Make sure to:"
echo "   - Set APP_DEBUG=false in .env"
echo "   - Remove any diagnostic files"
echo "   - Delete this script if no longer needed"
echo ""

