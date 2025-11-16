# Joljochna Deployment Checklist

Use this checklist to ensure a smooth deployment to your hosting server.

## Pre-Deployment (Local)

### Files & Database
- [x] Database backup created (`finaljoljochna_production.sql`)
- [x] All code committed and pushed (if using Git)
- [ ] `.env.production` configured with production values
- [ ] Test site locally one final time
- [ ] All documentation files ready

### Code Optimization
- [ ] Run: `composer install --optimize-autoloader --no-dev`
- [ ] Run: `php artisan config:cache`
- [ ] Run: `php artisan route:cache`
- [ ] Run: `php artisan view:cache`
- [ ] Check for any hardcoded local URLs
- [ ] Remove any debug code or console.logs

### Security Check
- [ ] APP_DEBUG=false in `.env.production`
- [ ] APP_ENV=production in `.env.production`
- [ ] Strong APP_KEY generated
- [ ] Database credentials ready
- [ ] Remove any test/demo data

### Required Files for Upload
```
✓ All application files
✓ .htaccess (root)
✓ public/.htaccess
✓ .env.production (rename to .env on server)
✓ database/finaljoljochna_production.sql
✓ storage/ directory (with proper structure)
✓ bootstrap/cache/ directory
```

---

## Hosting Setup

### 1. Domain & Hosting
- [ ] Domain registered and DNS configured
- [ ] Hosting account created
- [ ] SSL certificate installed (HTTPS)
- [ ] PHP 8.1+ available
- [ ] MySQL/MariaDB database available

### 2. Server Requirements
Check your hosting has these PHP extensions:
- [ ] BCMath
- [ ] Ctype
- [ ] Fileinfo
- [ ] JSON
- [ ] Mbstring
- [ ] OpenSSL
- [ ] PDO
- [ ] Tokenizer
- [ ] XML
- [ ] cURL

### 3. Database Setup
- [ ] Create database: `Finaljoljochna`
- [ ] Create database user with all privileges
- [ ] Import `database/finaljoljochna_production.sql`
- [ ] Verify all 19 tables imported successfully
- [ ] Test database connection

### 4. File Upload
- [ ] Upload all files via FTP/SFTP or File Manager
- [ ] Upload to: `/public_html/` or `/home/username/public_html/`
- [ ] Ensure proper directory structure maintained
- [ ] `.htaccess` files uploaded correctly

### 5. Configuration
- [ ] Rename `.env.production` to `.env`
- [ ] Update `.env` with actual values:
  ```
  APP_URL=https://yourdomain.com
  DB_HOST=localhost
  DB_DATABASE=Finaljoljochna
  DB_USERNAME=actual_username
  DB_PASSWORD=actual_password
  ```
- [ ] Generate new APP_KEY if needed: `php artisan key:generate`
- [ ] Configure mail settings

### 6. Permissions
Run via SSH or hosting terminal:
```bash
chmod -R 755 storage
chmod -R 755 bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

Or use deployment script:
```bash
bash deploy.sh
```

### 7. Deployment Commands
```bash
composer install --optimize-autoloader --no-dev
php artisan config:clear
php artisan cache:clear
php artisan migrate --force
php artisan storage:link
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

---

## Post-Deployment Testing

### Basic Functionality
- [ ] Homepage loads correctly
- [ ] All images displaying
- [ ] Navigation working
- [ ] Language switcher functioning
- [ ] Mobile responsive view working

### Admin Panel
- [ ] Admin login accessible
- [ ] Can login with credentials
- [ ] Dashboard loads properly
- [ ] Can view/edit content sections:
  - [ ] Hero slider
  - [ ] About section
  - [ ] Features
  - [ ] Pricing
  - [ ] Testimonials
  - [ ] Projects
  - [ ] Contact form
  - [ ] Footer settings

### Forms & Interactions
- [ ] Contact form submits successfully
- [ ] Booking form works
- [ ] Form validation working
- [ ] Email notifications sending (if configured)

### Performance & Security
- [ ] HTTPS working (green padlock)
- [ ] No console errors in browser
- [ ] No PHP errors in logs
- [ ] Page load times acceptable
- [ ] Images optimized and loading fast

### SEO & Meta
- [ ] Page titles correct
- [ ] Meta descriptions set
- [ ] robots.txt accessible
- [ ] Sitemap accessible (if created)
- [ ] Favicon displaying

---

## Troubleshooting Common Issues

### 500 Internal Server Error
```bash
# Check permissions
chmod -R 755 storage bootstrap/cache

# Check logs
tail -f storage/logs/laravel.log

# Clear cache
php artisan config:clear
php artisan cache:clear
```

### Database Connection Error
- Verify DB credentials in `.env`
- Ensure database user has privileges
- Check DB_HOST (usually 'localhost')

### White Screen / Blank Page
- Set `APP_DEBUG=true` temporarily to see errors
- Check PHP error logs
- Verify `.htaccess` files exist

### Images Not Loading
- Run: `php artisan storage:link`
- Check file permissions: `chmod -R 755 storage`
- Verify image paths in database

### CSS/JS Not Loading
- Clear cache: `php artisan cache:clear`
- Check ASSET_URL in `.env`
- Verify public/.htaccess exists

---

## Maintenance Mode

To enable maintenance mode during updates:
```bash
php artisan down
# Perform updates
php artisan up
```

---

## Backup Strategy

### Regular Backups
1. **Database:** Weekly via cPanel/phpMyAdmin
2. **Files:** Monthly full backup
3. **Storage:** Backup uploaded images separately

### Automated Backup Command
```bash
mysqldump -u username -p Finaljoljochna > backup_$(date +%Y%m%d).sql
```

---

## Support Contacts

**Developer:** [Your Contact Info]
**Hosting Support:** [Hosting Provider Contact]
**Domain Registrar:** [Registrar Contact]

---

## Deployment Completed
- [ ] All checklist items completed
- [ ] Site tested and working
- [ ] Client/stakeholder notified
- [ ] Documentation handed over
- [ ] Backup strategy implemented

**Deployment Date:** _____________
**Deployed By:** _____________
**Site URL:** _____________

