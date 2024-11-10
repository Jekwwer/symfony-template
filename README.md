# Symfony Project Template

This repository serves as a template for creating Symfony projects with a fully configured development environment,
including Docker-based devcontainer support, Dependabot integration, and pre-configured tools for PHP development.

## Features

- **Symfony 7**: Modern PHP framework for web applications.
- **Devcontainer Support**: Run the project in a consistent development environment using Docker.
- **VSCode Configuration**: Includes recommended extensions and settings for PHP.
- **Dependabot**: Automated dependency updates for Composer, Docker, and GitHub Actions.
- **Preconfigured PHPUnit**: Testing framework for unit and functional tests.
- **Xdebug Configuration**: Preconfigured for debugging with VSCode.
- **Makefile**: Convenient shortcuts for common tasks.

## Prerequisites

- [Docker](https://docs.docker.com/get-docker/) - Required for the development container.
- [VSCode](https://code.visualstudio.com/) with the [Remote - Containers](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-containers) extension.

## Getting Started

1. **Clone this repository**:

   ```bash
   git clone https://github.com/Jekwwer/symfony-template.git
   cd symfony-template
   ```

2. **Open in VSCode**:

   - Open VSCode and use the `Remote - Containers` extension to open the folder in the devcontainer.
   - VSCode will automatically build the Docker container and install the necessary dependencies.

3. **Run the Application**:

   - Start the Symfony server by running:

     ```bash
     make serve
     ```

   - The application will be available at `http://localhost:8000`.

Debugging with Xdebug

This template includes Xdebug for PHP debugging. Xdebug is configured to listen for incoming connections, making it easy to debug with VSCode.

> Note: For phpmd, it’s necessary to start debugging; otherwise, the pre-commit hook will fail.

## Project Structure

- **`src/`**: Symfony application source code.
- **`tests/`**: PHPUnit tests.
- **`templates/`**: Twig templates for HTML rendering.
- **`.devcontainer/`**: Docker and devcontainer configuration files.
- **`.github/dependabot.yml`**: Dependabot configuration for automated dependency updates.

## Available Commands

You can use the following commands from the Makefile:

- **`make install`** - Install PHP dependencies via Composer.
- **`make serve`** - Start the Symfony server.
- **`make test`** - Run tests with PHPUnit.
- **`make coverage`** - Run tests with coverage report.
- **`make cache-clear`** - Clear Symfony cache.

## Testing

This template includes a PHPUnit setup. To run tests, use:

```bash
make test
```

To check test coverage:

```bash
make coverage
```

## Automated Dependency Updates

This template uses Dependabot to keep dependencies up-to-date:

- **Docker**: `.devcontainer` Docker dependencies.
- **GitHub Actions**: `.github` workflows.
- **Composer**: PHP dependencies.

## Customizing

Feel free to modify this template to suit your project's needs. You can add new Symfony bundles,
customize configurations, or expand the Docker setup as required.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
