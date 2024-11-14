# Makefile: Automates common tasks for Symfony project development and testing.

# Install project dependencies
install:
	composer install

# Run the Symfony server
pre-serve:
	symfony server:ca:install

# Start the Symfony server
serve: pre-serve
	symfony serve

# Run tests with PHPUnit
test:
	php bin/phpunit

# Run tests and generate coverage report
coverage:
	XDEBUG_MODE=coverage php bin/phpunit --coverage-text

# Clear the Symfony cache
cache-clear:
	php bin/console cache:clear
