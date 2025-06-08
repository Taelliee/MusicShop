# 🎵 Music Shop Web System

A dynamic PHP-based web application for managing a music shop. The system provides functionality for handling inventory, customers, employees, and sales operations. All database tables are created through PHP code, and all operations are managed through HTML forms. Implemented CRUD operations and user interface for easy data access.

---

## 🎯 Objective

Design and implement a flexible and normalized web-based database system for a music store. The application allows the management of goods (CDs, DVDs, Blu-Rays, Vinyls), customers, employees, and sales transactions.

---

## 📦 Features

### 📁 Data Management (CRUD Operations)
- Add, edit, and delete:
  - **Goods**: type, year, title, artist, genre, music company, price
  - **Customers**: name, address, phone
  - **Employees**: name, position, phone
  - **Sales**: customer, employee, date, items, quantity

### 🔍 Search Functionality
- Search goods by:
  - Type (CD, DVD, etc.)
  - Artist
  - Genre
  - Year
  - Music company

### 📊 Reports (Using SQL JOINs)
- Number of sales per employee, sorted by total sales descending
- Monthly revenue by genre or music company  
  (Month and year are user-selected)
- Last 5 sales of items released in the past year, grouped by employee
- Purchases per client, sorted by item type and date
- Sales in a date range, sorted by client and date

---

## 🛠️ Technical Details

- **Backend**: PHP
- **Database**: MySQL (tables created via PHP code, not phpMyAdmin)
- **Frontend**: HTML + CSS (user-friendly and intuitive design)
- **Forms**: Used for all CRUD operations and data queries
- **Navigation**: Includes return links to homepage or previous pages on every view

---

## 🧱 Database Structure

- Normalized database with proper use of:
  - Primary Keys
  - Foreign Keys
  - Table relationships
- Uses `JOIN` clauses in queries to show real data instead of foreign key IDs

---

## 🚀 Getting Started

1. Clone the repository
2. Set up a local PHP server (e.g. XAMPP)
3. Place the project folder in your web directory (`htdocs`)
4. Run the app in your browser (e.g. `http://localhost/MusicShop/index.php`)
5. The database and tables will be created when pressing a designated button

---

## 📌 Notes

- All tables are created through PHP via specific buttons — no need for phpMyAdmin
- All inputs are handled via HTML forms
- Styled with CSS for a clean and functional user experience
- Built as part of a learning project to practice full-stack web development with PHP & SQL

