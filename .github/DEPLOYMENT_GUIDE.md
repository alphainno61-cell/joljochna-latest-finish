# Deployment Guide for Joljochna Website

## Database Information

**Database Name:** `Finaljoljochna`

**Character Set:** UTF8MB4

**Collation:** utf8mb4_unicode_ci

## Deployment Steps

### 1. Create Database on Hosting

Login to your hosting control panel (cPanel/Plesk) and create a new database:

```sql
CREATE DATABASE Finaljoljochna CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### 2. Import Database

Upload and import the SQL file: `database/finaljoljochna_production.sql`

**Via cPanel/phpMyAdmin:**
- Go to phpMyAdmin
- Select the `Finaljoljochna` database
- Click "Import" tab
- Choose file: `finaljoljochna_production.sql`
- Click "Go"

**Via Command Line (if available):**
```bash
mysql -u your_username -p Finaljoljochna < finaljoljochna_production.sql
```

### 3. Update Environment Configuration

Update your `.env` file on the hosting server with the correct database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=Finaljoljochna
DB_USERNAME=your_database_username
DB_PASSWORD=your_database_password
```

### 4. Clear Cache

After uploading the files, run these commands on the server:

```bash
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
```

### 5. Set Permissions

Ensure proper permissions for storage and bootstrap/cache directories:

```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
```

## Database Structure

The database contains the following tables:

1. **users** - Admin/user accounts (1 record)
2. **bookings** - Customer booking information
3. **testimonials** - Customer testimonials
4. **hero_sliders** - Homepage slider content
5. **about_sections** - About section content
6. **project_sections** - Project information
7. **our_projects** - Other projects showcase
8. **footer_settings** - Footer configuration
9. **social_media** - Social media links
10. **contact_form_fields** - Contact form submissions
11. **cache** - Application cache
12. **sessions** - User sessions
13. **migrations** - Database migrations tracking
14. **password_reset_tokens** - Password reset functionality
15. **personal_access_tokens** - API tokens
16. **failed_jobs** - Failed queue jobs
17. **jobs** - Queue jobs
18. **job_batches** - Job batch tracking
19. **cache_locks** - Cache locking mechanism

## Admin Login

After deployment, you can access the admin panel at:
- URL: `https://yourdomain.com/admin/login`
- Username: Check `users` table in database
- Password: Use the password you set during local development

## Backup Files

Two backup files are available:
1. **finaljoljochna_backup.sql** - Original backup from local database
2. **finaljoljochna_production.sql** - Production-ready import file (USE THIS FOR DEPLOYMENT)

## Post-Deployment Checklist

- [ ] Database created successfully
- [ ] SQL file imported without errors
- [ ] `.env` file updated with correct credentials
- [ ] Cache cleared
- [ ] Permissions set correctly
- [ ] Website loads without errors
- [ ] Admin panel accessible
- [ ] All images and assets loading
- [ ] Contact form working
- [ ] Booking system functional

## Troubleshooting

### Database Connection Error
- Verify database credentials in `.env`
- Ensure database user has all privileges
- Check if database host is correct (usually 'localhost')

### Permission Denied Errors
```bash
chmod -R 775 storage
chmod -R 775 bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### 500 Internal Server Error
- Run: `php artisan config:clear`
- Check: `storage/logs/laravel.log` for error details
- Ensure PHP version is 8.1 or higher

## Support

For any deployment issues, check the Laravel logs in `storage/logs/laravel.log`

---

**Migration Completed:** November 12, 2025
**Database:** Finaljoljochna
**Local Testing:** ✓ Verified and Working
