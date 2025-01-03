# Dependency Injection Container Example

## About
A simple project to demonstrate the basic usage of Symfony's Dependency Injection Container and how it works.

## Requirements
- PHP 8.2
- Composer

## Install
- Install dependencies:
  ```
  composer install
  ```

- Point the webserver to the directory `public/`.
- Make sure the directory `cache/` is writeable for the webserver.

## Usage
Call the app by your choosen domain, e.g. https://localhost.
The three different Controllers are callable by:
- f
- ft
- fta
 
Example: `https://localhost?f`

See `src/Router/routes.yaml` for further information.

## Resources
For further information I strongly recommend to check out the [documentation of Symfony](https://symfony.com/doc/current/service_container.html) itself and to write own services, injecting them make the private or public, build dependencies and so on.
