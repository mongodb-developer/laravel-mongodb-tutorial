# How To Build a Laravel + MongoDB Back End Service 

This code was writting to accompany [this article](https://www.mongodb.com/developer/languages/php/laravel-mongodb-tutorial/?utm_campaign=devrel).


## Prerequisites
You'll need the following installed on your computer to follow along with this tutorial:

- A MongoDB Atlas cluster 
  - [Create a free cluster](https://www.mongodb.com/try?utm_campaign=devrel) and [load the MongoDB sample data](https://www.mongodb.com/basics/sample-database?utm_campaign=devrel).
- A code editor of your choice. 
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

## 1. Laravel setup

After cloning the code repo or launching a Docker/CodeSpaces instance, the project needs a few more things before the Laravel App can run:

1. install dependencies via Composer
2. create a new .env file
3. generate a new Laravel App Key

You can conveniently do all three by running the `init_repo.sh` from the 
PHP container. 

<img src="https://i.imgur.com/P0ZNlot.png">

The script will install the package via Composer, create an .env and create an App key.

<img src="https://i.imgur.com/6P6MlFX.png">

## 2. Ready!

Head to the site URL and you should see the Laravel Homepage

<img src="https://i.imgur.com/pkORDBj.png">

<p></p>

<img src="https://i.imgur.com/fbZlygD.png">

Our base Laravel app is ready 🥳. 

❗Note that this branch already has the Model and Migrations already setup. 


**Next**, you can connect to a MongoDB Cluster and try some of the things we talked about in our [How To Build a Laravel + MongoDB Back End Service](https://www.mongodb.com/developer/languages/php/laravel-mongodb-tutorial/)

Add the MongoDB connection string with the username / password to the .env file. add this line, but remember that your connection string might look different.

In .env, add

`DB_URI=mongodb+srv://USERNAME:PASSWORD@clustername.subdomain.mongodb.net/?retryWrites=true&w=majority`

#  🚀 Launch locally with Docker

Assuming that you already have Docker Desktop installed on Windows/Mac or Docker on Linux,

- clone the repository to a local directory
- navigate to the ./devcontainer folder
- execute `docker compose up`
- in the PHP container, execute the init_repo.sh script

Once the containe(s) are up, visit http://localhost


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