# URL Shortener

## Table of Contents

1. [Introduction](#introduction)
2. [Features](#features)
3. [Requirements](#requirements)
4. [Installation](#installation)
5. [Usage](#usage)
6. [API Documentation](#api-documentation)
7. [Contributing](#contributing)
8. [License](#license)

## Introduction

URL Shortener is a web application that allows users to shorten long URLs into more manageable and shareable links. It provides a convenient way to create short aliases for long URLs, making it easier to share them on social media, emails, or any other digital platform.

This project is built using the Laravel framework, providing a robust and scalable solution for URL shortening needs.

## Features

- Shorten long URLs into concise aliases.
- Track click counts for each shortened URL.
- User authentication and authorization.
- CRUD operations for managing shortened URLs.
- Clean and intuitive user interface.

## Requirements

- PHP (>=7.4)
- Composer
- Node.js
- npm or Yarn
- MySQL or other compatible database

## Installation

1. **Clone the repository:**
   git clone https://github.com/tausif1337/url-shortener.git

2. **Navigate into the project directory:**
    cd url-shortener

3. **Install PHP dependencies:**
    composer install

4. **Install JavaScript dependencies:**
    npm install

5. Copy the .env.example file and rename it to .env. Then, configure your environment variables, including database connection details.

6. **Generate an application key:**
    php artisan key:generate

7. **Run database migrations:**
    php artisan migrate
    
8. **Serve the application:**
    php artisan serve
    Access the application in your web browser at http://localhost:8000.

## Usage
1. Register a new account or log in if you already have one.
2. Once logged in, you can start shortening URLs by entering the original URL and clicking the "Shorten" button. 
3. Manage your shortened URLs by viewing, editing, or deleting them from the dashboard.

## API Documentation
The application provides RESTful APIs for managing shortened URLs. Detailed API documentation can be found here.

## Contributing
Contributions are welcome! Please feel free to fork the repository, make changes, and submit a pull request. For major changes, please open an issue first to discuss the proposed changes.

## License
This project is open source and available under the MIT License.