# phpenv

a simple PHP (MVC) application to manage private events

## Features

- Manage users
- Manage events
- Share event URI via QR code
- Let users contribute to event (Tasks, Foodlist)


# Requirements

- PHP 8
- MySQL 5.7

# Configuration

- Check and adapt initial configuration in `public/config.php`
- Setup a MySQL database and initialize with data from `sql/` folder


# Start Application

## Events Application

- localhost:8080
- Initial user is "user" with password "pass"

## PHPAdmin

- localhost:8081
- see `docker-compose.yml` for DB credentials


# Play around in docker

## Install docker

### Docker for Windows

* Download Docker-Toolbox for windows
* set up your PATH environment properly

#### Shared folder

use that shared folder in your docker compose file:

	volumes:
		- /projectname:/some/dir/in/container/project_name
    
### or Docker for Windows

* install Docker for Windows 
	

### Docker configuration
		
Create your docker-compose environment file ".env" in `docker` directory

* initialize `WWW_FOLDER` variable
* initialize `SQL_SCRIPTS_FOLDER` variable

# Composer

```
composer config platform.php 8.0.7

docker run -it --rm -v %cd%:/app composer status
```

# Shared hosting

Always avoid putting anything except the application’s public files into a document root directory, such as _public\_html_, _htdocs_ or similar.

When working with application configuration, never expose sensitive configuration files in public. To avoid that, place the configuration files outside the publicly accessible document root on the server, so they are not accessible over web https://example.com/config/config.yml

## Project structure

```
project/
    public/             # public assets and static resources
        index.php       # bootstrap application
        css/            # Stylesheets
        js/             # Javascript
        images/
    config/             # App configuration
        config.yml
    sql/                # Database schema
    src/                
        controllers/    # MVC Controller
        core/           # Base classes
        helpers/        # Helper classes
        models/         # DB model classes
        views/          # UI Views
    vendor/             # Third-party libraries, generated by PHP composer
```


# Debug

Debugging in PHP

```
$var_dump($var)
```

# Reference

- https://github.com/jakubboucek/docker-lamp-devstack
- https://github.com/fauria/docker-lamp
- https://docs.php.earth/faq/misc/structure/
- http://getskeleton.com
- https://github.com/rev42/tfpdf/blob/master/src/tFPDF.php
- https://codepen.io/marcus-nightingale/pen/ExOgYyr
- https://codepen.io/GreeCoon/pen/KvqMjN (text area counter)
- https://cookie-bar.eu/ (Cookie consent)
