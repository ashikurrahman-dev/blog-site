# Laravel Blog Site 📝

A simple yet powerful blog application built with **Laravel**, featuring user authentication, categories, and blog post management.

---

## Features ✨

### Core Modules
- **User Management** 🔐  
  - Register, login, and profile management.  
  - Role-based access (Admin/User).  
- **Category Management** 🏷️  
  - Create, edit, and delete categories.  
  - Filter posts by category.  
- **Post Management** 📄  
  - Create, edit, and delete blog posts.  
  - Featured images for posts.  

---

## Technologies Used 🛠️
- **Backend**: Laravel 12.x  
- **Frontend**: Blade Templating, Tailwind CSS  
- **Database**: MySQL  
- **Authentication**: Laravel Breeze 

---

## Installation & Setup ⚙️

### Prerequisites
- PHP 8.2+  
- Composer  
- MySQL  

### Steps
1. **Clone the repository**:
   ```bash
   git clone https://github.com/ashikurrahman-dev/blog-site.git
   cd blog-site
2. **Install dependencies**:
   ```bash
    composer install
    npm install && npm run dev
3. **Configure environment**:
   Copy .env.example to .env and update:
   ```bash
    DB_DATABASE=your_db_name
    DB_USERNAME=your_db_user
    DB_PASSWORD=your_db_password
4. **Run migrations & seed dummy data**:
   ```bash
    php artisan migrate --seed
5. **Storage Link**:
   ```bash
    php artisan storage:link
6. **Start the server**:
   ```bash
    php artisan serve
