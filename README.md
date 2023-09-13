# How To Build a Laravel + MongoDB Back End Service 

This code was written to accompany [this tutorial article](https://www.mongodb.com/developer/languages/php/laravel-mongodb-tutorial/?utm_campaign=devrel).

## Prerequisites
You'll need the following installed on your computer to follow along with this tutorial:

- A MongoDB Atlas cluster 
  - [Create a **free** cluster](https://www.mongodb.com/try?utm_campaign=devrel) and [load the MongoDB sample data](https://www.mongodb.com/basics/sample-database?utm_campaign=devrel).
- A GitHub account if you want to use GitHub Codespaces (a 1-click experience)
  - The `master` repo has all the code, but we also have a `starter` branch if you want to follow the project from scratch and build the migrations etc.
- A code editor of your choice for local development 
  - We suggeest [Visual Studio Code](https://code.visualstudio.com/download). Check the optional [MongoDB for VS Code](https://www.mongodb.com/products/vs-code?utm_campaign=devrel) extension.

The article mentions several ways to get a Laravel development environment up and running. 

#  🚀 Launch this repo in CodeSpaces

<img src="https://i.imgur.com/5STvIPX.png">

⏳Codespaces will build the app's container(s). This may take **~3 minutes**.

<img src="https://i.imgur.com/1IBKVjx.png">

✅Done! We now have our project running inside CodeSpaces. We can proceed to setting up Laravel

<img src="https://i.imgur.com/9b6P1ba.png">

<p></p><p></p>

# 👋 Before you run this Laravel app

## 1. Final Laravel app setup

After cloning the code repo or launching a Docker/CodeSpaces instance, a script called `init_repo.sh` will be automatically executed (as setup in devcontainer.json) to:

- install dependencies via Composer
- create a new .env file
- generate a new Laravel App Key

1. All you need to do is to **add your MongoDB credentials in Laravel's .env file**, using the MONGODB_URI environment variable. Here's [how to get your credentials](https://www.mongodb.com/docs/guides/atlas/connection-string/?utm_campaign=devrel) It looks something like this:

```
MONGODB_URI=mongodb+srv://USERNAME:PASSWORD@clustername.subdomain.mongodb.net/?retryWrites=true&w=majority
```

❗Note that this branch already has the Laravel Model and Migrations already created and ready, but the tables have been initialized yet. 

2. You can test your credentials by using the code's API endpoint

```
<siteroot>/api/ping/
```

Find the site's root URL by going to the "Ports" tab and click on the globe icon of port 80

<img src="https://i.imgur.com/pkORDBj.png">

3. If the MongoDB ping test worked, use this command in the terminal to initialize the tables

`php artisan migrate:refresh`

<p></p>

## 2. Ready!

<img src="https://i.imgur.com/fbZlygD.png">

Our base Laravel app is ready 🥳. 

**Next**, try some of the things we talked about in our [How To Build a Laravel + MongoDB Back End Service](https://www.mongodb.com/developer/languages/php/laravel-mongodb-tutorial/)

#  🚀 Launch locally with Docker

Assuming that you already have Docker Desktop installed on Windows/Mac or Docker on Linux,

- clone the repository to a local directory
- navigate to the ./devcontainer folder
- execute `docker compose up`
- in the PHP container, execute `sh init_repo.sh`
- initialize your .env file as instructed above

Once the container(s) are up, visit http://localhost

# Optional: Xdebug

The xdebug.php-debug VS Code extension is automatically installed if you launch via devcontainer.json.

👀 **Important**: our `.devcontainer/.docker/php/xdebug.ini` file is setup by default with `xdebug.client_host=localhost`, which should works for **CodeSpaces** and Devcontainers. 

For **local development**, you need to replace `localhost` with the IP where your code IDE runs or a dns name that maps to it. That's because your PHP container and the IDE host tend to have different IPs. 

If you are using our container directly (docker compose up), or via VS Code (devcontainer), we suggest the following Xdebug configs visual studio. Note the difference in path mapping.

## CodeSpaces and (inside a Devcontainer)

```json
{
  "name": "Listen for Xdebug",
  "type": "php",
  "request": "launch",
  "port": 9003,
  "pathMappings":  {
    "/var/www/htdoc": "${workspaceFolder}"
  }
},
```

## local development with Docker

The debug config file is located in `<repository_dir>/.vscode/launch.json`

```json
{
  "name": "Listen for Xdebug",
  "type": "php",
  "request": "launch",
  "port": 9003,
  "pathMappings":  {
    "/var/www/htdoc": "${workspaceFolder}/src"
  }
},
```

# Disclaimer

Use at your own risk; not a supported MongoDB product
