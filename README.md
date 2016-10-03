# Test Php blog project

This is an example application showing how to create a simple blog on PHP.

## Features
* No 3rd-party PHP libraries are allowed to use. Composer is here just for managing autoload files and downloading some js distributions
* MVC architecture and the ability to reuse it for other projects
* 2 controllers, 1 model, a view renderer, dependency injection manager
* Twitter Bootstrap 3 template

## Further possible improvements
* Add a view helper to build routing urls automatically
* Add an external wysiwyg html editor
* Server-side input sanitation and validation

## What if 3rd-party PHP libraries would be allowed to use
* [Pimple](https://github.com/silexphp/Pimple) as DI container
* [Symfony Http Foundation](https://github.com/symfony/http-foundation) as Request/Response manager
* [Twig](https://github.com/twigphp/Twig) as View renderer
* [Silex](https://github.com/silexphp/Silex) or [Slim](https://github.com/slimphp/Slim) as MVC+Routing base
* [Doctrine](https://github.com/doctrine/doctrine2) as ORM

## Requirements

* Vagrant 1.8+ (verified version 1.8.0) vagrant --version
* Virtualbox 5+ (verified version 5.0.14) vboxmanage --version

## Deployment
1. Clone this repository
2. Install VM using one simple Vagrant command:
    ```
    vagrant up
    ```

3. Use the following address to access the result page:
    ```
    http://192.168.33.20/
    ```