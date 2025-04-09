# 📚 Laravel Library Management System

## 🚀 Project Overview
This is a **mini library management system** built with **Laravel**. It allows users to:
- 📖 **Add, edit, and delete books**
- 🔍 **Search books** by title, author, or ISBN
- 🔄 **Check-in and check-out books**

## 🛠️ Installation & Setup
### **1️⃣ Clone the Repository**
```sh
git clone https://github.com/YOUR_USERNAME/library-management.git
cd library-management
```

### **2️⃣ Install Dependencies**
```sh
composer install
npm install
```

### **3️⃣ Configure Environment**
```sh
cp .env.example .env
php artisan key:generate
```
- Edit `.env` and update your **database credentials**

### **4️⃣ Setup Database**
```sh
php artisan migrate --seed
```
- This will create database tables and insert sample data.

### **5️⃣ Start the Development Server**
```sh
php artisan serve
```
- Open **http://127.0.0.1:8000** in your browser.

## 🔥 Additional Commands
- **Clear Cache (if needed)**
  ```sh
  php artisan cache:clear
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

## 🤝 Contribution
Feel free to fork and contribute! 😊
