![Alt text](https://api.centous.com/wp-content/uploads/2023/08/laravelvuejs.png)
---
## 📋 Roadmap

- [About](#about)
- [Tech Stack](#tech_stack)
- [Server Requiremenets](#requirements)
- [Running the Program](#running)
- [Features](#features)

## 🧐 About <a id = "about"></a>

I created this project as a digital journal, inspired by the need for a versatile and organized way to manage schedules, grades, and communication with teachers. It's a practical solution to real-world challenges faced by students, allowing for efficient tracking of lessons, assignments, and attendance.

During the development process, I collaborated with my programming teacher to plan the functionalities of the digital journal, drawing inspiration from a similar electronic journal used in my college.

This project addresses a common need in education, providing students, directors, and teachers with a comprehensive tool for managing their academic responsibilities.

## 🏗️ Tech Stack <a id = "tech_stack"></a>

- [Laravel](https://laravel.com/)
- [Vue.js](https://vuejs.org/)
- [MySQL database](https://www.mysql.com/)
- [Bootstrap](https://getbootstrap.com/)
- [Axios](https://github.com/axios/axios)
- [Vite](https://vitejs.dev/)
- [Laravel Reverb](https://reverb.laravel.com/)
- [Figma](https://www.figma.com/)

## ⚙️ Requiremenets <a id = "requirements"></a>

Server requirements to run locally:
- PHP >= 8.2
- [Node.js](https://nodejs.org/en/download) (LTS)
- MySQL 8.0

To run on Docker:
- [Docker](https://www.docker.com/products/docker-desktop/)

## 🚀 Running the Program <a id = "running"></a>

To run the program locally, simply clone the repository and execute the start script:
```
git clone https://github.com/dmisl/Dynamitowy.git
cd <project_directory>
php start.php
```
This script automates all necessary setup steps, including installing PHP/JS dependencies, setting up environment variables, running migrations, starting the development server, and launching the WebSocket server (Laravel Reverb).

Once the script completes, your program will be up and running, ready for you to use.

---

To run the program using Docker:

Before running Docker commands, update the .env file with your database configuration.

```
DB_HOST=database
DB_USERNAME=someone
DB_PASSWORD=secret
```
then run
```
php start.php
docker-compose build
docker-compose up
```

This will set up the program environment using Docker, allowing you to run it seamlessly. (If you encounter any issues with the environment run `docker-compose down` then `docker-compose up`)

## 💡 Features <a id = "features"></a>

1. ### Digital Journal
   - **Description:** Serves as a digital journal, mimicking the functionalities of a traditional school planner.
   - **Functionality:** Enables efficient management of schedules, assignments, and tasks for students.

2. ### Grade Viewer
   - **Description:** Allows students to easily view their grades for various subjects.
   - **Functionality:** Provides a clear overview of academic performance, aiding in tracking progress.

3. ### Communication Platform
   - **Description:** Facilitates seamless communication between students and teachers.
   - **Functionality:** Integrates a chat feature using websockets, enabling real-time messaging and interaction.

4. ### Attendance Tracker
   - **Description:** Facilitates monitoring of student attendance.
   - **Functionality:** Enables students to view attendance records and teachers to track student presence. Teachers can CRUD attendance for their classes.

5. ### Warning System
   - **Description:** Alerts students about academic warnings or disciplinary actions.
   - **Functionality:** Notifies students of issues regarding their academic performance or behavior.

6. ### School Email Integration
   - **Description:** Integrates school email functionality into the platform.
   - **Functionality:** Allows students to access and manage their school email directly within the application.

7. ### Class Schedule Management
   - **Description:** Provides an organized schedule of classes and activities.
   - **Functionality:** Enables teachers to CRUD class schedules, including timings and locations. Teachers can easily view their class schedule for specific days.

8. ### Grade Management
   - **Description:** Enables teachers to manage grades for their assigned classes and subjects.
   - **Functionality:** Teachers can CRUD grades for students in specific classes and subjects they teach.

9. ### Warning Issuance
   - **Description:** Allows teachers to issue warnings to students for academic or behavioral issues.
   - **Functionality:** Teachers can issue warnings to students regarding their performance or behavior.

10. ### Class Management (Class Teacher)
    - **Description:** Provides class management functionalities for class teachers.
    - **Functionality:** Class teachers can CRUD student information, including avatars, and manage class-related data such as attendance, grades, and class schedule. They can also add new students to their class and modify class schedules.

11. ### Administrative Access
    - **Description:** Provides administrative access to the director.
    - **Functionality:** The director has full CRUD access to teachers, grades, classes, class teachers, attendance, students, and warnings, enabling comprehensive management of the school's academic affairs.

> [!NOTE]
> By the way, all these features, except for the chat, are implemented using reactive Vue components combined with Laravel models, routes, controllers, and middlewares.
