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
Call the app by our choosen domain, e.g. https://localhost.
The three different Controllers are callable by:
- f
- ft
- fta
 
Example: `https://localhost/f`

See `src/Router/routes.yaml` for further information.

## Explanation
### Overview
In a world without the Dependency Injection Container it's difficult to manage the dependencies between the objects.
Imagine an object A which needs two other objects (B and C) to be able to work. Object C however needs D and E.  
This could be achieved by writing such code:
```php
$d = new D();
$e = new E();

$b = new B();
$c = new C(D $d, E $e);

$a = new A(B $b, C $c);
```
But what happens if it is a new requirement that object B must have also a parameter during the initialization of the object?  
You have to go through the complete code basis and check if somewhere the object B was initiated and change that place. 
You also have to make sure,
that you have the needed information for the new parameter at each place. This becomes a mess in no time.  
  
Here comes the Dependency Injection Container in handy.
  
By giving the type declaration in method signatures, the Dependency Injection Container (DI Container) knows exactly 
which object is meant to be injected.
The DI Container reads the code and gathers the information it needs, to build the objects for you. Given by the example 
from above, the code would look like this:
```php
$a = ContainerFactory::getContainer()->get(A);
```
You would have a complete initialized object of type A. 

### Organization
But how does the DI Container knows where to search at?  
When you build the DI Container adapter of your application, you tell the DI Container where it should search by a YAML file.  
In this project the first YAML file is located in `src/Container/services.yaml`. Don't get confused it doesn't contain
any details about the objects, but it requires another services.yaml, but why is that?  
  
The answer is simple: Imagine a big project, with lots of directories. Here a new object is introduced, there gets an 
object removed. You would have to change the service.yaml file every time, and it would be also huge and probably a mess.
Therefore, each sub-directory (given, you are using a design pattern with some sort of Domain Driven Design) has its very 
own service.yaml file which knows about all the stuff in its directory. Check the file `src/Http/services.yaml` for example. 
It knows only about the objects in the directory `Http/`.

### Configuration
The DI Container knows only to states: The object is via the container callable or not.  
To be able what that means we have to dig a bit deeper.   

In some cases you don't want that your object is callable by the DI container. In that case
you have to set the value of the parameter public to false. Using the example from above, with this services.yaml file for
the object A:
```yaml
A:
    public: false
```
It wouldn't be possible to call the object with the DI Container from the outside:
```php
$a = ContainerFactory::getContainer()->get(A);
```
This would lead to such an error: 
> The "A" service or alias has been removed or inlined when the container was compiled. You should either make it public, or stop using the container directly and use dependency injection instead.
 
Typically, you find such a configuration for Service objects. They aren't meant to be called outside the 
controllers.  To be able to use the object A you would have to require it in a constructor:
```php
class Example {
    public function __construct(private A $a)
}
```
When you call the object Example through the DI Container:
```php
$example = ContainerFactory::getContainer()->get(Example);
```
then the DI Container would create the object A, inject it into Example and you would have a ready to go
object of type Example.

## Resources
For further information I strongly recommend to check out the [documentation of Symfony](https://symfony.com/doc/current/service_container.html) itself and to write own services, injecting them make the private or public, build dependencies and so on.
