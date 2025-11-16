# জলজোছনা (Joljochna) - Real Estate Website

A modern, responsive real estate website built with Laravel for showcasing residential plots and properties.

![Laravel](https://img.shields.io/badge/Laravel-12.36-FF2D20?style=flat&logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8.4-777BB4?style=flat&logo=php)
![License](https://img.shields.io/badge/License-Proprietary-blue)

## 🌟 Features

### Frontend (Public Website)
- **Multi-language Support** - Bengali & English with live switcher
- **Responsive Design** - Mobile, tablet, and desktop optimized
- **Hero Slider** - Dynamic content slider with animations
- **Interactive Sections:**
  - About Us with project information
  - Features & Amenities showcase
  - Pricing/Plot Information tables
  - Customer Testimonials with images
  - Project Gallery
  - Contact Form with validation
  - Location with QR code
  - Social Media Integration

### Backend (Admin Panel)
- **Content Management System** - Full control over all sections
- **Live Preview** - See changes before publishing
- **Image Management** - Upload and manage project images
- **Form Management:**
  - View contact form submissions
  - Manage booking requests
  - Track customer inquiries
- **Settings Management:**
  - Header/Footer customization
  - Social media links
  - Translation management
  - Payment methods

## 🚀 Quick Start

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL 5.7+ or MariaDB 10.3+
- Node.js & NPM (for assets)

### Installation (Local Development)

1. **Clone or Download the project**
   ```bash
   cd /Applications/XAMPP/xamppfiles/htdocs/
   ```

2. **Install Dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Configure Environment**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Setup Database**
   - Create database: `joljochna`
   - Update `.env` with database credentials
   - Run migrations:
   ```bash
   php artisan migrate
   ```

5. **Create Storage Link**
   ```bash
   php artisan storage:link
   ```

6. **Start Development Server**
   ```bash
   php artisan serve
   ```

Visit: `http://localhost:8000`

## 📦 Deployment

### Production Deployment

See detailed deployment documentation:
- **[DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md)** - Complete deployment instructions
- **[DEPLOYMENT_CHECKLIST.md](DEPLOYMENT_CHECKLIST.md)** - Step-by-step checklist
- **[DEPLOYMENT_PACKAGE.md](DEPLOYMENT_PACKAGE.md)** - Package contents & quick start

### Quick Deployment
```bash
# On your hosting server
bash deploy.sh
```

### Database for Production
- Database Name: `Finaljoljochna`
- Import file: `database/finaljoljochna_production.sql`

## 🛠️ Technology Stack

- **Framework:** Laravel 12.36.1
- **PHP:** 8.4.12
- **Database:** MySQL/MariaDB
- **Frontend:** HTML5, CSS3, JavaScript
- **Styling:** Custom CSS with animations
- **Icons:** Font Awesome 6.4.0
- **Translation:** Custom JSON-based system

## 📂 Project Structure

```
joljochna/
├── app/
│   ├── Http/Controllers/      # Application controllers
│   └── Models/                # Database models
├── database/
│   ├── migrations/            # Database migrations
│   └── finaljoljochna_production.sql
├── public/
│   ├── assets/                # CSS, JS, Images
│   └── images/                # Public images
├── resources/
│   ├── views/
│   │   ├── admin/            # Admin panel views
│   │   └── landingSection/   # Frontend sections
│   └── public/translations/   # Language files
├── routes/
│   ├── web.php               # Web routes
│   └── api.php               # API routes
└── storage/                   # File storage
```

## 🔐 Admin Panel

**Access:** `/admin/login`

**Default Credentials:** Check database `users` table

**Features:**
- Dashboard with statistics
- Content management for all sections
- Image upload and management
- Form submissions viewer
- Translation editor
- Site settings configuration

## 🌐 Multi-Language Support

The site supports Bengali and English:
- Real-time language switching
- Admin panel for managing translations
- JSON-based translation files
- Easy to add new languages

**Translation Files:**
- `public/translations/bn.json` - Bengali
- `public/translations/en.json` - English

## 📱 Responsive Design

Fully responsive across all devices:
- **Mobile:** < 480px
- **Tablet:** 480px - 768px
- **Desktop:** 768px - 1024px
- **Large Desktop:** > 1024px

## 🎨 Customization

### Changing Colors
Edit: `public/assets/css/landing_page.css`
- Primary color: `#0a4d2e` (Dark green)
- Accent color: `#ffd700` (Gold)

### Modifying Sections
Admin panel → Edit content → Save → Publish

### Adding New Features
1. Create controller in `app/Http/Controllers/`
2. Add routes in `routes/web.php`
3. Create views in `resources/views/`

## 📧 Contact Form

Forms are stored in database table: `contact_form_fields`

View submissions: Admin Panel → Contact Forms

## 🔄 Backup & Restore

### Create Backup
```bash
bash backup.sh
```

Backups saved to: `backups/` directory

### Restore from Backup
```bash
mysql -u username -p Finaljoljochna < backup_file.sql
```

## 📝 Documentation

- **[DEPLOYMENT_GUIDE.md](DEPLOYMENT_GUIDE.md)** - Deployment instructions
- **[DEPLOYMENT_CHECKLIST.md](DEPLOYMENT_CHECKLIST.md)** - Deployment checklist
- **[DEPLOYMENT_PACKAGE.md](DEPLOYMENT_PACKAGE.md)** - Package information
- **API Documentation** - Available in `/api` routes

## 🐛 Troubleshooting

### Common Issues

**500 Error:**
```bash
chmod -R 755 storage bootstrap/cache
php artisan config:clear
```

**Database Error:**
- Check `.env` credentials
- Verify database exists
- Ensure user has privileges

**Images Not Loading:**
```bash
php artisan storage:link
chmod -R 755 storage
```

### Logs
Check: `storage/logs/laravel.log`

## 🔒 Security

- CSRF protection enabled
- XSS protection headers
- SQL injection prevention
- Password hashing with bcrypt
- Session security configured
- HTTPS recommended for production

## 📊 Performance

Optimizations included:
- Route caching
- Configuration caching
- View caching
- Database query optimization
- Asset minification
- Image lazy loading

## 🤝 Contributing

This is a proprietary project. Contact the development team for contribution guidelines.

## 📄 License

Proprietary - All rights reserved.

## 👨‍💻 Development Team

**Project:** Joljochna Real Estate Website
**Client:** NEX Real Estate
**Framework:** Laravel
**Version:** 1.0.0

## 📞 Support

For support and inquiries:
- Check documentation files
- Review `storage/logs/laravel.log`
- Contact development team

## 🎯 Project Status

- ✅ Frontend completed
- ✅ Admin panel completed
- ✅ Multi-language support active
- ✅ Responsive design implemented
- ✅ Database ready for production
- ✅ Deployment package prepared
- 🚀 Ready for Production Deployment

---

**Built with ❤️ using Laravel**

**Last Updated:** November 12, 2025

