<!-- <textarea rows="70" style="width:98%;border:solid 1px #e6e6e6; background-color: white;-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;" disabled="true"> -->

# Project Angel Food - Operations Software System Backend

Backend API for Operation Systems Client Module.

## Prerequisites

You will need the following things properly installed on your computer.

* [Git](https://git-scm.com/)
* [Composer](https://getcomposer.org/download/)

## Installation

* Clone this repository, `git clone <repository-url>`
* Change the working directory, `cd project-angel-food/backend`
* Install the backend dependencies, `composer install`
* Initialize the database with `sql\CREATE_DB_NO_FKS.sql` file
* Configure the .env file in the backend root directory (env.example)
Example:
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=
APP_TIMEZONE=UTC

LOG_CHANNEL=stack
LOG_SLACK_WEBHOOK_URL=

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=angelfood
DB_USERNAME=username
DB_PASSWORD=password

QUEUE_DRIVER=sync
APP_ENV=local
APP_LOG_LEVEL=debug
CACHE_DATABASE_CONNECTION=false
```
* Note: If running MariaDB, make sure the database supports lower case
```
[mysqld]
lower_case_table_names = 1
```

* Create a user under the table `site_user`

## Running / Development

* `php -S localhost:8000 -t public`
* Visit the API at [http://localhost:4200](http://localhost:8000)


## Screenshots

![angel-food-demo-api-load](/backend/screenshots/api_run.PNG?raw=true "Backend Loaded")

![angel-food-demo-api-login](/backend/screenshots/example_login.PNG?raw=true "Example login")

## Directory Structure
```
.
├── README.md
├── app
│   ├── Address.php
│   ├── BaseModel.php
│   ├── Casemanager.php
│   ├── Casemanager_User_Map.php
│   ├── Cohabitant.php
│   ├── Console
│   │   ├── Commands
│   │   └── Kernel.php
│   ├── Daignosis_User_Map.php
│   ├── EmergencyContact.php
│   ├── Events
│   │   ├── Event.php
│   │   └── ExampleEvent.php
│   ├── Exceptions
│   │   └── Handler.php
│   ├── FoodPrepFacility.php
│   ├── Food_Prep_User_Map.php
│   ├── Gender.php
│   ├── HousingType.php
│   ├── Housing_Type_User_Map.php
│   ├── Http
│   │   ├── Controllers
│   │   │   ├── Controller.php
│   │   │   └── ExampleController.php
│   │   └── Middleware
│   │       ├── Authenticate.php
│   │       ├── CorsMiddleware.php
│   │       └── ExampleMiddleware.php
│   ├── Jobs
│   │   ├── ExampleJob.php
│   │   └── Job.php
│   ├── Listeners
│   │   └── ExampleListener.php
│   ├── MedicalDiagnosis.php
│   ├── Providers
│   │   ├── AppServiceProvider.php
│   │   ├── AuthServiceProvider.php
│   │   └── EventServiceProvider.php
│   ├── Race.php
│   ├── Refer.php
│   ├── ReferType.php
│   ├── SexualOrientation.php
│   ├── SpecialNeed.php
│   ├── User.php
│   ├── UserType.php
│   ├── User_Special_Need_Map.php
│   └── config
│       └── logging.php
├── artisan
├── bootstrap
│   └── app.php
├── composer.json
├── composer.lock
├── database
│   ├── factories
│   │   └── ModelFactory.php
│   ├── migrations
│   └── seeds
│       └── DatabaseSeeder.php
├── env.example
├── git
├── phpunit.xml
├── public
│   └── index.php
├── resources
│   └── views
├── routes
│   ├── address.php
│   ├── casemanager.php
│   ├── cohabitant.php
│   ├── emergencycontact.php
│   ├── foodprepfacilities.php
│   ├── gender.php
│   ├── housingtype.php
│   ├── login.php
│   ├── medicaldiagnosis.php
│   ├── race.php
│   ├── refer.php
│   ├── refertype.php
│   ├── sexualorientation.php
│   ├── specialneeds.php
│   ├── user.php
│   ├── usertype.php
│   └── web.php
├── screenshots
│   ├── api_run.png
│   └── example_login.png
├── sql
│   └── CREATE_DB_NO_FKS.sql
├── storage
│   ├── app
│   ├── framework
│   │   ├── cache
│   │   └── views
│   └── logs
└── tests
    ├── ExampleTest.php
    └── TestCase.php
```