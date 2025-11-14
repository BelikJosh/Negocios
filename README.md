# Negocios II
# DAKCOM-MAIN2.0

**Local Commerce Platform**

A comprehensive web platform for local commerce management and operations.

---

## Prerequisites

Before running this project, make sure you have the following installed:

### Required Software
- **XAMPP** (includes Apache, PHP, MySQL, and phpMyAdmin)
- **PHP 7.4+** (included in XAMPP)
- **MySQL 5.7+** (included in XAMPP)
- **Composer** (PHP dependency manager)

### PHP Extensions
Make sure these PHP extensions are enabled in your `php.ini`:
- `pdo_mysql`
- `mbstring`
- `curl`
- `openssl`
- `json`

---

## Installation & Setup

### 1. XAMPP Setup
- Download and install XAMPP from [Apache Friends](https://www.apachefriends.org/)
- Start Apache and MySQL services from the XAMPP control panel

### 2. Project Setup
1. Clone or extract the project files into your XAMPP `htdocs` folder:
`C:\xampp\htdocs\dakcom-main2.0\`
2. Import the database:
- Open phpMyAdmin (http://localhost/phpmyadmin)
- Create a new database named `dakcom`
- Import the `dakcom.sql` file from the project root

### 3. Dependency Installation
Open a terminal in the project root directory and run: `composer install`

---

## Running the Project

### 1. Service Initialization
- Launch **XAMPP Control Panel**
- Activate **Apache** and **MySQL** modules

### 2. Application Access
Open your browser and navigate to: 
`http://localhost/dakcom-main2.0/`

---

### 3. Default Authentication
- Application interface becomes accessible
- Authentication credentials are provided through a separate channel

---

## Configuration

### Database Settings
Connection parameters aligned with XAMPP defaults:

- **Server:** localhost  
- **Schema:** dakcom  
- **User:** root  
- **Access Code:** *(empty)* — default XAMPP configuration

---

## Important Files

### Core Configuration Files
- `composer.json` — PHP dependency manifest  
- `dakcom.sql` — Database schema and seed data  
- `autoload.php` — Dependency autoloader  

### Critical Assets
- `Archivos.php` — Core application logic  
- `diseño.css`, `diseno2.css`, `diseno3.css` — Styling resources  
- `index.html` — Primary entry point  
- `moda.html` — Component templates  

---
