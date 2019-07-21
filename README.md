# Institutes Reviews Platform Technical test

## Prerequisites

To run this project on your computer, you need to have at least :

- Docker
- docker-compose

and you need to make sure that the following ports are free :

- 3000
- 8000

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

## How to test :

The symfony backend is working, and there is some fixtures in the database, as you can see in `/symfony/fixtures/` folder.

The following routes are working (GET) :

- `/institutes/{id}`
- `/institutes`
- `/reviews/{id}/institutes`
- `/rates/{id}/institutes`
- `/platforms/{id}`
- `/platforms`
- `/reviews/{id}/platforms`
- `/rates/{id}/platforms`
- `/rates/{id}`
- `/rates`
- `/platforms/{id}/rates`
- `/institutes/{id}/rates`
- `/reviews/{id}`
- `/reviews`
- `/platforms/{id}/reviews`
- `/institutes/{id}/reviews`

The frontend is running but no actions are available at the end of the code session.