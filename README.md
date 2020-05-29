# SnowTricks

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/29fbbef3319c403cbc92f1d7cc214027)](https://app.codacy.com/manual/choi.abri/BileMoAPI?utm_source=github.com&utm_medium=referral&utm_content=ChoiAbraham/BileMoAPI&utm_campaign=Badge_Grade_Dashboard)

Créez un web service exposant une API
==========
*Project 7 OpenClassRooms*

A Symfony Project to learn about API REST.

* Symfony: version 4.4

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development.

### Prerequisites

* **Php 7.3**
* **Mysql 5.7**
* Composer (https://getcomposer.org/).

### Endpoints

#### Application
- GET​ : /api​/doc.json - *Return documentation on json format*
- POST​: /api​/login_check - *Allows to retrieve a valid token*

#### Phones

- GET : /api​/phones - *Return all phones*
- GET :​/api​/phones​/{id} - *Find phone by ID*

#### Users (Authentification JWT)

- GET : /api​/clients​/{client_id}​/users - *Allows you to retrieve all users.*
- POST : /api​/clients​/{client_id}​/users - *Allows you to post a new user.*
- GET : /api​/clients​/{client_id}​/users​/{id} - *Allows you to retrieve a single user.*
- DELETE : /api​/clients​/{client_id}​/users​/{id} - *Allows you to delete a user.*

## Installing

- clone or download the repository into your environment. https://github.com/ChoiAbraham/BileMoAPI

Install the dependencies on Composer
```
$ composer install
```
Open and enter your parameters database in .env file (see instructions on files)

Set the Database

```
$ php bin/console doctrine:database:create
```
```
$ php bin/console doctrine:migrations:migrate
```
```
$ php bin/console doctrine:fixtures:load
```
## Generate the SSH keys:
````
$ mkdir -p config/jwt
$ openssl genpkey -out config/jwt/private.pem -aes256 -algorithm rsa -pkeyopt rsa_keygen_bits:4096
$ openssl pkey -in config/jwt/private.pem -out config/jwt/public.pem -pubout
````
#### Set parameters from config/packages/lexik_jwt_authentication.yaml in your .env.
````
JWT_SECRET_KEY=%kernel.project_dir%/config/jwt/private.pem
JWT_PUBLIC_KEY=%kernel.project_dir%/config/jwt/public.pem
JWT_PASSPHRASE=Your pass phrase used for generate key
JWT_TOKEN_TTL=The validity time of the generated token expressed in seconds.(e.g 2000)
```` 
For test to retrieve a valid token call the url /login_check method POST with the following identifiers :
```
{
	"username": "fnac",
	"password": "fnac"
}
```