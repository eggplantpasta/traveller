# Traveller Tools
Tools for playing [Traveller](https://en.wikipedia.org/wiki/Traveller_(role-playing_game)) (CT)

## NOTE
This repo contains code that is unlikely to work. I've been using the RPG game Traveller for many years as a programming task for learning new languages and frameworks. It'll probably only be of interest to me.

The things I'm trying to learn here are:
* [apiary](https://apiary.io) API building and documentation tool.
* [Yeoman](http://yeoman.io) with the [AngulaJS generator](https://github.com/yeoman/generator-angular#readme) lets you quickly set up a project with sensible defaults and best practices.
* [AngularJS](https://angularjs.org) HTML enhanced for web apps.
* [Slim 3](http://www.slimframework.com) a micro framework for PHP.
* [PHP The Right Way](http://www.phptherightway.com/) modern PHP best practices.
* [SQLite](https://www.sqlite.org/) a built in single file or in memory database.

## API

The API is documented at [docs.travellerct.apiary.io] (http://docs.travellerct.apiary.io)

## Database

Scripts to create and populate an SQLite database with sample data are contained in the sql directory.
To execute them navigate to the project root and use the built in PHP web server:

```shell
php -S localhost:8000 -t sql/
```

Then navigate to the [create script](http://localhost:8000/create-db.php) to create the database and it's objects and populate it with sample data.
