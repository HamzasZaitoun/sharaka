# Commander Group (Sharaka) - Laravel + Filament CMS

A modern, multilingual content management system built with Laravel 10 and Filament PHP v3, featuring a dynamic page builder and full Arabic/English localization support.

## 🚀 Features

- **Dynamic Page Builder**: Create custom pages with reusable content blocks (Hero Sections, Latest News, Brand Sections)
- **Multilingual Support**: Full Arabic/English localization with RTL/LTR support using Spatie Laravel Translatable
- **Filament Admin Panel**: Beautiful, intuitive admin interface for content management
- **News Management**: Publish and manage news articles with translatable content
- **Business Units**: Manage multiple business units (Al Qubtan, Cinema Reels, Sharaka++) with galleries and descriptions
- **Modern Design**: Tailwind CSS v3 with custom fonts (Playfair Display, Inter) and color scheme
- **Media Library**: Integrated Spatie Media Library for image management
- **Responsive Design**: Mobile-first, fully responsive layout

## 📋 Requirements

- PHP >= 8.1
- Composer
- Node.js & NPM
- MySQL/MariaDB
- Laravel 10.x
- Filament PHP v3.2+

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/HamzasZaitoun/sharaka.git
   cd sharaka
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   
   Update your `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=sharaka
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

6. **Create storage link**
   ```bash
   php artisan storage:link
   ```

7. **Build assets**
   ```bash
   npm run build
   ```
   
   Or for development with hot reload:
   ```bash
   npm run dev
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

## 👤 Default Admin Credentials

After running the seeder, you can log in with:
- **Email**: `admin@example.com`
- **Password**: `password`

**⚠️ Important**: Change these credentials immediately in production!

## 📁 Project Structure

```
sharaka/
├── app/
│   ├── Filament/Resources/     # Filament admin resources
│   │   ├── NewsResource.php
│   │   ├── BusinessUnitResource.php
│   │   └── PageResource.php   # Dynamic page builder
│   ├── Models/                # Eloquent models
│   ├── Http/Middleware/       # Custom middleware (SetLocale)
│   └── Settings/              # Global settings
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   ├── views/
│   │   ├── blocks/           # Reusable content blocks
│   │   ├── components/       # Blade components (Header, Footer)
│   │   └── pages/            # Page templates
│   └── css/                  # Tailwind CSS
├── routes/
│   └── web.php               # Web routes
└── public/
    ├── images/               # Static images
    └── fonts/                # Custom fonts
```

## 🎨 Content Blocks

The page builder supports three main content block types:

### 1. Hero Section
- Translatable headline and sub-headline
- Background image upload
- Call-to-action button

### 2. Latest News
- Displays recent news articles
- Configurable item limit
- Auto-fetches from News model

### 3. Brand Section
- Translatable title, subtitle, and description
- Logo text display
- Image gallery with titles
- Reverse layout option

## 🌐 Localization

The application supports Arabic and English with automatic RTL/LTR switching:

- **Language Switcher**: Available in the header
- **Route**: `/lang/{locale}` (e.g., `/lang/ar` or `/lang/en`)
- **Session-based**: Language preference stored in session
- **Middleware**: `SetLocale` middleware handles language detection

## 📝 Usage

### Creating a New Page

1. Log in to the Filament admin panel at `/admin`
2. Navigate to **Pages** → **Create New**
3. Fill in the page title (English and Arabic)
4. Set a unique slug (e.g., `about-us`)
5. Add content blocks using the Page Builder
6. Toggle "Published" when ready
7. Save and visit `/your-slug` to view

### Managing News

1. Navigate to **News** in the admin panel
2. Click **Create New**
3. Fill in translatable title, excerpt, and content
4. Upload a featured image
5. Set publication date
6. Save and publish

### Managing Business Units

1. Navigate to **Business Units** in the admin panel
2. Add or edit business units
3. Upload logo and gallery images
4. Set sort order for display sequence

## 🎨 Customization

### Colors

Edit `tailwind.config.js` to customize the color scheme:
- `gold`: Primary accent color
- `hero-dark`: Dark background for hero sections
- `background`: Main background color

### Fonts

Custom fonts are configured in `resources/css/app.css`:
- **Playfair Display**: Headings (serif)
- **Inter**: Body text (sans-serif)

### Styling

All styles use Tailwind CSS. Custom utilities are defined in `resources/css/app.css`.

## 🔧 Technologies Used

- **Laravel 10**: PHP framework
- **Filament PHP v3**: Admin panel
- **Tailwind CSS v3**: Utility-first CSS framework
- **Spatie Laravel Translatable**: Multilingual content
- **Spatie Laravel Settings**: Global settings
- **Spatie Media Library**: Media management
- **Blade**: Templating engine
- **Vite**: Asset bundler

## 📄 License

This project is proprietary software. All rights reserved.

## 👥 Contributors

- [HamzasZaitoun](https://github.com/HamzasZaitoun)

## 📞 Support

For support, email support@CDR.com or create an issue in the repository.

---

**Commander Group** © 2025 - All content is owned by CDR
