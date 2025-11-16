#!/bin/bash

##############################################
# Joljochna Backup Script
# Creates backups of database and important files
##############################################

# Configuration
BACKUP_DIR="backups"
DATE=$(date +"%Y%m%d_%H%M%S")
DB_NAME="Finaljoljochna"
DB_USER="root"
DB_PASS=""

echo "======================================"
echo "Joljochna Backup Script"
echo "======================================"
echo ""

# Create backup directory if it doesn't exist
mkdir -p $BACKUP_DIR

# Database Backup
echo "Step 1: Backing up database..."
mysqldump -u $DB_USER -p$DB_PASS $DB_NAME > "$BACKUP_DIR/database_backup_$DATE.sql"
if [ $? -eq 0 ]; then
    echo "✓ Database backed up: database_backup_$DATE.sql"
else
    echo "❌ Database backup failed!"
    exit 1
fi
echo ""

# Storage Backup (uploaded files)
echo "Step 2: Backing up storage/app/public..."
if [ -d "storage/app/public" ]; then
    tar -czf "$BACKUP_DIR/storage_backup_$DATE.tar.gz" storage/app/public
    echo "✓ Storage backed up: storage_backup_$DATE.tar.gz"
else
    echo "⚠️  storage/app/public not found, skipping..."
fi
echo ""

# Configuration Backup
echo "Step 3: Backing up configuration..."
cp .env "$BACKUP_DIR/env_backup_$DATE.txt"
echo "✓ Environment file backed up"
echo ""

# List backups
echo "======================================"
echo "Available Backups:"
echo "======================================"
ls -lh $BACKUP_DIR/
echo ""

echo "✓ Backup completed successfully!"
echo "Backup location: $BACKUP_DIR/"
echo ""

# Clean old backups (keep last 10)
echo "Cleaning old backups (keeping last 10)..."
cd $BACKUP_DIR
ls -t database_backup_*.sql | tail -n +11 | xargs -r rm --
ls -t storage_backup_*.tar.gz | tail -n +11 | xargs -r rm --
ls -t env_backup_*.txt | tail -n +11 | xargs -r rm --
echo "✓ Cleanup completed"

