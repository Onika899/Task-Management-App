# Task Management System

A full-featured task management web application built with Laravel 12, featuring user authentication, role-based access control, task assignment, categories, priorities, and deadline tracking.

## 📋 Table of Contents

- [Technologies Used](#technologies-used)
- [Features](#features)
- [Setup Instructions](#setup-instructions)
- [Environment Variables](#environment-variables)
- [Database Schema](#database-schema)
- [User Roles](#user-roles)
- [API Routes](#api-routes)
- [Testing the Application](#testing-the-application)
- [Screenshots](#screenshots)
- [Challenges & Solutions](#challenges--solutions)
- [Team Members](#team-members)

---

## 🛠 Technologies Used

| Technology | Version | Purpose |
|------------|---------|---------|
| **Laravel** | 12.x | Backend framework |
| **PHP** | 8.2.12 | Server-side language |
| **SQLite** | 3.x | Database |
| **Bootstrap** | 5.3 | Frontend styling |
| **Laravel Breeze** | Latest | Authentication scaffolding |
| **Vite** | Latest | Asset compilation |
| **Composer** | Latest | PHP dependency management |
| **npm** | Latest | Node.js package management |

---

## ✨ Features

### Core Features
- ✅ User registration and authentication (Laravel Breeze)
- ✅ Create, read, update, and delete tasks
- ✅ Assign tasks to specific users
- ✅ Task categories (Work, Personal, Bug, Feature, Research)
- ✅ Task priorities (Low, Medium, High, Urgent) with visual indicators
- ✅ Update task status (Pending, In Progress, Completed)
- ✅ Dashboard with task statistics (total, pending, in progress, completed)
- ✅ Recent tasks display on dashboard

### Admin Features
- ✅ Manage categories (create, edit, delete)
- ✅ Manage priorities (create, edit, delete)
- ✅ Full access to all tasks across the system

### Security Features
- ✅ Role-based access control (Admin, Team Member, Guest)
- ✅ Authorization policies for task operations
- ✅ CSRF protection on all forms
- ✅ SQL injection prevention (Eloquent ORM)
- ✅ XSS protection (Blade escaping)

---

## 🚀 Setup Instructions

### Prerequisites

Before you begin, ensure you have the following installed:

| Software | Version | Download Link |
|----------|---------|---------------|
| PHP | 8.2+ | [php.net](https://www.php.net/downloads) |
| Composer | Latest | [getcomposer.org](https://getcomposer.org/download/) |
| Node.js | 20+ | [nodejs.org](https://nodejs.org/) |
| SQLite | 3.x | Included with PHP |
| Git | Latest | [git-scm.com](https://git-scm.com/) |

### Installation Steps

#### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/task-management-app.git
cd task-management-app
2. Install PHP Dependencies
bash
composer install
3. Install Node.js Dependencies
bash
npm install
4. Environment Configuration
Copy the example environment file:

bash
cp .env.example .env
Generate an application key:

bash
php artisan key:generate
5. Configure Database (SQLite)
Open the .env file and update the database configuration:

env
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
Create the SQLite database file:

bash
touch database/database.sqlite
6. Run Database Migrations
bash
php artisan migrate
7. Seed the Database
bash
php artisan db:seed
This creates:

5 categories (Work, Personal, Bug, Feature, Research)

4 priorities (Low, Medium, High, Urgent)

8. Compile Frontend Assets
bash
npm run build
9. Start the Development Server
bash
php artisan serve
10. Access the Application
Open your browser and navigate to:

text
http://127.0.0.1:8000/register
🔧 Environment Variables
Variable	Description	Default Value
APP_NAME	Application name	Task Management System
APP_ENV	Application environment	local
APP_DEBUG	Debug mode (true for development)	true
APP_URL	Application URL	http://localhost
DB_CONNECTION	Database type	sqlite
SESSION_DRIVER	Session storage	database
📊 Database Schema
Users Table
Column	Type	Description
id	bigint	Primary key
name	string	User's full name
email	string	Unique email address
role	enum	admin, team_member, guest
password	string	Hashed password
timestamps	datetime	Created/updated at
Tasks Table
Column	Type	Description
id	bigint	Primary key
title	string	Task title
description	text	Task description (nullable)
status	enum	pending, in_progress, completed
deadline	date	Task due date
assigned_to	foreign_id	References users table
created_by	foreign_id	References users table
category_id	foreign_id	References categories table
priority_id	foreign_id	References priorities table
timestamps	datetime	Created/updated at
Categories Table
Column	Type	Description
id	bigint	Primary key
name	string	Category name
timestamps	datetime	Created/updated at
Priorities Table
Column	Type	Description
id	bigint	Primary key
name	string	Priority name (Low, Medium, High, Urgent)
level	integer	Priority level (1-5)
timestamps	datetime	Created/updated at
Relationships
text
User (has many) → Tasks (as creator)
User (has many) → Tasks (as assignee)
Task (belongs to) → Category
Task (belongs to) → Priority
Category (has many) → Tasks
Priority (has many) → Tasks
👥 User Roles
Role	Permissions
Admin	Full CRUD on all tasks, manage categories, manage priorities, view all tasks
Team Member	Create tasks, edit/delete own tasks, update status, view assigned tasks
Guest	Read-only access (view only)
🌐 API Routes
Method	URL	Controller Method	Description	Middleware
GET	/	welcome	Home page	web
GET	/register	showRegistrationForm	Registration page	guest
POST	/register	register	Create user account	guest
GET	/login	showLoginForm	Login page	guest
POST	/login	authenticate	User login	guest
POST	/logout	logout	User logout	auth
GET	/dashboard	index	Dashboard stats	auth
GET	/tasks	index	List all tasks	auth
GET	/tasks/create	create	Show create task form	auth
POST	/tasks	store	Create new task	auth
GET	/tasks/{task}	show	View single task	auth
GET	/tasks/{task}/edit	edit	Show edit task form	auth
PUT	/tasks/{task}	update	Update task	auth
DELETE	/tasks/{task}	destroy	Delete task	auth
PATCH	/tasks/{task}/status	updateStatus	Update task status	auth
GET	/categories	index	List categories	auth, admin
POST	/categories	store	Create category	auth, admin
GET	/categories/{category}/edit	edit	Edit category	auth, admin
PUT	/categories/{category}	update	Update category	auth, admin
DELETE	/categories/{category}	destroy	Delete category	auth, admin
GET	/priorities	index	List priorities	auth, admin
POST	/priorities	store	Create priority	auth, admin
GET	/priorities/{priority}/edit	edit	Edit priority	auth, admin
PUT	/priorities/{priority}	update	Update priority	auth, admin
DELETE	/priorities/{priority}	destroy	Delete priority	auth, admin
🧪 Testing the Application
1. Register a New User
Navigate to /register

Fill in:

Name: Test User

Email: test@example.com

Password: password123

Confirm Password: password123

Click "Register"

2. Make Your User an Admin (Optional)
bash
php artisan tinker
Then run:

php
$user = User::first(); $user->role = 'admin'; $user->save(); exit;
3. Create a Task
Log in to your account

Click "Tasks" in the navigation bar

Click "Create New Task"

Fill in the form:

Title: Complete project report

Description: Finish the final documentation

Deadline: Select a future date

Assign To: Select your name

Category: Select "Work"

Priority: Select "High"

Click "Create Task"

4. Manage Categories (Admin Only)
Click "Categories" in the navigation bar

Add a new category like "Meeting"

Edit or delete existing categories

5. Manage Priorities (Admin Only)
Click "Priorities" in the navigation bar

Add a new priority level

Edit or delete existing priorities

6. Update Task Status
Go to Tasks list

Click "Edit" on a task

Change status from "Pending" to "In Progress" or "Completed"

Save changes

📸 Screenshots
Registration Page
https://screenshots/register.png

Dashboard
https://screenshots/dashboard.png

Create Task Form
https://screenshots/create-task.png

Tasks List
https://screenshots/tasks-list.png

Categories Management
https://screenshots/categories.png

login
https://screenshots/login.png

🐛 Challenges & Solutions
Challenge 1: Table Naming Convention
Problem: Laravel automatically converts model names (TaskJS → task_j_s) while our table was named 'tasks'.

Solution: Added protected $table = 'tasks'; to each model to explicitly define the table name.

Challenge 2: PowerShell Execution Policy
Problem: npm commands were blocked due to Windows security settings.

Solution: Changed execution policy using Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser

Challenge 3: PHP Version Compatibility
Problem: Laravel 12 requires PHP 8.2+, but XAMPP had PHP 8.0.

Solution: Installed XAMPP with PHP 8.2.12 to a separate folder (C:\xampp-new) and configured VS Code to use it.

Challenge 4: SQLite Database Creation
Problem: 'touch' command not recognized in PowerShell.

Solution: Used New-Item -Path database/database.sqlite -ItemType File to create the database file.

Challenge 5: Missing View Files
Problem: Controller tried to load views that didn't exist yet.

Solution: Created all Blade view files (index, create, edit, show) for tasks, categories, and priorities.

👨‍💻 Team Members
Name	Role	Contribution
[Your Name]	Backend Developer	Database design, models, controllers, routes, middleware, policies, authentication
[Partner's Name]	Frontend Developer	Blade templates, CSS styling, dashboard, forms, navigation
Group Initials: [Your initials, e.g., JS]

📝 License
This project was developed as part of the ICT Electives 3 - Web Frameworks course at [Your Institution Name].

Course: ICE360/1/2S
Lecturer: Itumeleng Maine
Assessment: T2 - Laravel Project
Deadline: Friday, 29 May 2026 @ 23:00

🙏 Acknowledgments
Laravel Documentation

Bootstrap 5

Laravel Breeze

All online resources and tutorials used during development

📧 Contact
For questions or issues, please contact:

Email: [your email]

GitHub: [your GitHub username]

Thank you for reviewing our Task Management System!

text

---

## 📝 What You Need to Add

| Item | Where to get it |
|------|-----------------|
| **Screenshots** | Take screenshots of your working app and save in `public/screenshots/` folder |
| **GitHub URL** | Replace `yourusername` with your actual GitHub username |
| **Your Name** | Replace `[Your Name]` with actual names |
| **Partner's Name** | Replace `[Partner's Name]` with actual names |
| **Your Initials** | Replace `JS` with your group initials |
| **Email & GitHub** | Add your contact info |

---

## 🚀 Next Steps

1. **Create the README.md file** - Copy the entire content above
2. **Take screenshots** of your working app
3. **Replace placeholders** (names, initials, etc.)
4. **Commit and push to GitHub**

---

**Do you want me to help you take the screenshots or set up the GitHub repository next?** 🚀
