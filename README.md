<div align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300" alt="Laravel Logo" />
  <h1>🚀 SMartOrder AI</h1>
  <p>A cutting-edge AI-powered conversational ordering and reservation system for modern restaurants.</p>

  <!-- Badges -->
  <p>
    <img src="https://img.shields.io/badge/license-MIT-blue.svg" alt="License" />
    <img src="https://img.shields.io/badge/version-1.0.0-green.svg" alt="Version" />
    <img src="https://img.shields.io/badge/PHP-8.2+-777BB4.svg?logo=php&logoColor=white" alt="PHP" />
    <img src="https://img.shields.io/badge/Laravel-12.0-FF2D20.svg?logo=laravel&logoColor=white" alt="Laravel" />
    <img src="https://img.shields.io/badge/Python-3.x-3776AB.svg?logo=python&logoColor=white" alt="Python" />
    <img src="https://img.shields.io/badge/Ollama-Llama3-white.svg?logo=ollama&logoColor=black" alt="Ollama" />
  </p>
</div>

---

## 📖 Table of Contents
- [About](#-about)
- [Features](#-features)
- [Tech Stack](#-tech-stack)
- [Installation](#-installation)
- [Usage](#-usage)
- [Project Structure](#-project-structure)
- [Contributing](#-contributing)
- [License](#-license)
- [Authors](#-authors)

---

## 🎯 About
**SMartOrder AI** transforms the traditional restaurant experience by integrating a powerful Artificial Intelligence assistant directly into the ordering process. Built on the **Laravel 12** framework and powered by **Ollama (Llama3)**, it allows customers to browse menus, manage their shopping carts, and book table reservations through natural language conversations. The system also includes a comprehensive administrative dashboard for restaurant managers to oversee operations seamlessly.

---

## ✨ Features
- 🤖 **AI Conversational Ordering** — Place orders naturally by chatting with our Llama3-powered assistant.
- 📅 **Smart Reservations** — Reserve your table step-by-step through an interactive AI dialogue.
- 🛒 **Dynamic Cart Management** — Add, update, or remove items from your basket via text commands.
- 📊 **Admin Dashboard** — Fully-featured management interface for products, restaurants, and user accounts.
- 🔒 **Secure Authentication** — Robust login system with mandatory email verification and profile management.
- 🌍 **Multi-Layout Support** — Includes standard, RTL, and Virtual Reality dashboard views for varied user needs.

---

## 🛠️ Tech Stack
| Technology | Purpose |
|------------|---------|
| **PHP 8.2+** | Backend Core Language |
| **Laravel 12** | Primary Web Framework |
| **Python 3** | AI Microservice Language |
| **Flask** | AI Service API Framework |
| **Ollama (Llama3)** | Local LLM for Conversational Logic |
| **Blade** | Frontend Templating Engine |
| **Vite** | Frontend Asset Bundling |
| **MySQL / SQLite** | Relational Database Management |

---

## 📦 Installation

### 1. Clone the Repository
```bash
git clone https://github.com/KhairatMouhcine/SMartOrder_Ia.git
cd SMartOrder_Ia
```

### 2. Backend Setup (Laravel)
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
```

### 3. Frontend Setup
```bash
npm install
npm run dev
```

### 4. AI Service Setup (Python)
Ensure you have [Ollama](https://ollama.com/) installed and the `llama3` model pulled.
```bash
pip install flask flask-cors requests ollama
python scripts/serveur.py
```

---

## 🚀 Usage

1. **Start the Laravel Server:**
   ```bash
   php artisan serve
   ```
2. **Start the AI Microservice:**
   ```bash
   python scripts/serveur.py
   ```
3. **Access the Application:**
   Navigate to `http://127.0.0.1:8000` in your browser.
4. **Chat with the AI:**
   Log in, verify your email, and head to the **Chat** section to start ordering or making reservations using natural language.

---

## 📁 Project Structure
```text
SMartOrder_Ia/
├── app/                # Core Laravel logic (Controllers, Models, Middleware)
├── bootstrap/          # Framework bootstrap files
├── config/             # Application configuration files
├── database/           # Migrations, Factories, and Seeders
├── public/             # Publicly accessible assets (images, js, css)
├── resources/          # Blade views, lang files, and raw assets (Vite)
├── routes/             # Web and API route definitions
├── scripts/            # Python Flask AI service (Ollama integration)
├── storage/            # Local storage for logs and framework files
└── tests/              # Feature and Unit tests
```

---

## 📄 License
This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for more information.

---

## 👨‍💻 Authors

<div align="center">
  <div style="display: flex; justify-content: center; gap: 40px; flex-wrap: wrap;">
    <!-- Author 1 -->
    <div style="text-align: center;">
      <img src="https://avatars.githubusercontent.com/KhairatMouhcine?v=4" width="100px" style="border-radius: 50%;" />
      <h3>KhairatMouhcine</h3>
      <p>
        <a href="https://github.com/KhairatMouhcine">
          <img src="https://img.shields.io/badge/GitHub-KhairatMouhcine-black?style=flat&logo=github" />
        </a>
        <a href="mailto:khairatmouhcine125@gmail.com">
          <img src="https://img.shields.io/badge/Email-khairatmouhcine125@gmail.com-red?style=flat&logo=gmail" />
        </a>
      </p>
    </div>
    <!-- Author 2 -->
    <div style="text-align: center;">
      <img src="https://avatars.githubusercontent.com/Bassma02?v=4" width="100px" style="border-radius: 50%;" />
      <h3>Bassma</h3>
      <p>
        <a href="https://github.com/Bassma02">
          <img src="https://img.shields.io/badge/GitHub-Bassma02-black?style=flat&logo=github" />
        </a>
        <a href="mailto:b.chihab2002@gmail.com">
          <img src="https://img.shields.io/badge/Email-b.chihab2002@gmail.com-red?style=flat&logo=gmail" />
        </a>
      </p>
    </div>
    <!-- Author 3 -->
    <div style="text-align: center;">
      <img src="https://avatars.githubusercontent.com/ELFAIZE-Youssef?v=4" width="100px" style="border-radius: 50%;" />
      <h3>Youssef El Faize</h3>
      <p>
        <a href="https://github.com/ELFAIZE-Youssef">
          <img src="https://img.shields.io/badge/GitHub-ELFAIZE--Youssef-black?style=flat&logo=github" />
        </a>
        <a href="mailto:youssefmae26082000@gmail.com">
          <img src="https://img.shields.io/badge/Email-youssefmae26082000@gmail.com-red?style=flat&logo=gmail" />
        </a>
      </p>
    </div>
  </div>
  <br>
  <p>Developed with ❤️ as a collaborative project.</p>
</div>
