# proposed directory structure to integrate Docker and .devcontainer

/repository-root
│
├── .devcontainer/
│   ├── devcontainer.json
│   └── Dockerfile
│
├── docker/
│   ├── nginx/
│   │   └── default.conf
│   ├── mysql/
│   │   └── my.cnf
│   └── php/
│       └── Dockerfile
│
├── docker-compose.yml
│
├── src/
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── public/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── tests/
│   ├── .env.example
│   ├── .gitignore
│   ├── composer.json
│   ├── phpunit.xml
│   └── ...
│
└── README.md