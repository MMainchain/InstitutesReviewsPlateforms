# Institutes Reviews Plateform Technical test

## Prerequisites

To run this project on your computer, you need to have at least :

- Docker
- docker-compose

and you need to make sure that the following ports are free :

- 3000
- 8080

## Installation

To install and build images, clone the projet and run :

```bash
make install
```

## Start and stop project 

To start the application, run :

```bash
make start
```

The Symfony backend is accessible at : `localhost:8000` and the ReactJS front est is accessible at `localhost:3000`. 

To stop, run :

```bash
make stop
```

## Utils

Some utils commands :

Enter the symfony's bash :

```bash
make php
```

Enter the node's bash :

```bash
make node
```

Enter the mysql's cli :

```bash
make mysql
```