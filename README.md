# Konekt Addressing Module

Konekt Address is a [Concord module](https://artkonekt.github.io/concord/#/modules) that adds support for countries, provinces (state, county, region, etc), cities, addresses, people and locations.

Being a Concord part it is intended to be used by Laravel Applications.

## Testing

Make sure to run `composer install` first!

#### Command Line

```bash
vendor/bin/phpunit -c phpunit.xml.dist tests
```

#### PhpStorm

> Based on PhpStorm 2017.2

1. Set the project interpreter (php >= 7.0) Settings -> Languages & Frameworks -> PHP: CLI Interpreter
2. Configure PHPUnit: Settings -> Languages & Frameworks -> PHP -> Test Frameworks:
    - Add or Edit PHPUnit Local,
    - Use Composer Autoloader
    - Path to script: `<path_to_this_folder>/vendor/autoload.php`
    - Default configuration file: `<path_to_this_folder>/phpunit.xml.dist`
3. Mark directory: Settings -> Directories:
    - Mark `tests` folder as test
    - [optional]: On the right sidebar edit properties and set package prefix to `Konekt\Address\Tests`

**Example:**

![PHPUnit Settings](docs/testing_storm_phpunit.jpg)

![Directory Settings](docs/testing_storm_directories.jpg)
