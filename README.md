# How To Build a Laravel + MongoDB Back End Service 

This code was writting in conjunction with [this article](https://www.mongodb.com/developer/languages/php/laravel-mongodb-tutorial/?utm_campaign=devrel).


## Prerequisites
You'll need the following installed on your computer to follow along with this tutorial:

- A MongoDB Atlas cluster 
  - [Create a free cluster](https://www.mongodb.com/try?utm_campaign=devrel) and [load the MongoDB sample data](https://www.mongodb.com/basics/sample-database?utm_campaign=devrel).
- A code editor of your choice. 
  - We suggeest [Visual Studio Code](https://code.visualstudio.com/download). Check the optional [MongoDB for VS Code](https://www.mongodb.com/products/vs-code?utm_campaign=devrel) extension.

The article mentions several ways to get a Laravel development environment up and running. 

# Preparing the Laravel project to run

Before the project can run properly, we need to take several actions.

## 1. Install dependencies 

In the Laravel project folder, install the Composer dependencies with the command

`composer install`

## 2. Create the .env file 

Laravel uses the .env file for environment-specific configurations, like database credentials, application key, and other settings. Create one from the included example file:

`cp .env.example .env`

## 3. Generate a Laravel Application key

Laravel might ask to generate a new application key. You can do it by running this command in the laravel project folder. 

`php artisan key:generate`

## 4. Add the MongoDB connection string to .env

We need to add the MongoDB connection string with the username / password to the .env file. add this line, but remember that your connection string might look different.

`DB_URI=mongodb+srv://USERNAME:PASSWORD@clustername.subdomain.mongodb.net/?retryWrites=true&w=majority`

## 5. Ready!

Head to the site URL and you should see the Laravel Homepage

# Xdebug

The xdebug.php-debug VS Code extension is automatically installed if you launch via devcontainer.json.

If you are using our container directly (docker compose up), or via VS Code (devcontainer), we suggest the following Xdebug configs visual studio

### localhost

The debug config file is located in `<repository_dir>/.vscode/launch.json`

```json
{
  "name": "Listen for Xdebug",
  "type": "php",
  "request": "launch",
  "port": 9003,
  "pathMappings":  {
    // ${workspaceFolder} == directory where /.vscode/ is
    // the syntax is SERVER_PATH : LOCAL_PATH
    "/var/www/htdoc": "${workspaceFolder}/src"
  }
},
```

### devcontainer

- TODO

### Codespaces

- TODO


# Disclaimer

Use at your own risk; not a supported MongoDB product