# .devcontainer/Dockerfile: Sets up the development container for the project.

# Base image
FROM mcr.microsoft.com/vscode/devcontainers/php:8.3

# Set environment variable to non-interactive mode for apt-get installations
ENV DEBIAN_FRONTEND=noninteractive

# Define SHELL with -o pipefail to prevent errors in piping commands
SHELL ["/bin/bash", "-o", "pipefail", "-c"]

# Define ARGs for the version of each package
ARG PYTHON_PIP_VERSION=20.3.4-4+deb11u1
ARG PYTHON_VENV_VERSION=3.9.2-3
ARG RUBY_VERSION=1:2.7+2
ARG HADOLINT_VERSION=v2.12.0

# Install Composer globally
RUN wget -q -O composer-setup.php https://getcomposer.org/installer && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    rm composer-setup.php

# Install Symfony CLI
RUN wget -q -O - https://get.symfony.com/cli/installer | bash && \
    mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

# Configure Xdebug (Assuming Xdebug is already installed in the base image)
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_host=localhost" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.discover_client_host=true" >> /usr/local/etc/php/conf.d/xdebug.ini

# Install additional packages and hadolint
# DL3047 info: Avoid use of wget without progress bar.
#              Use `wget --progress=dot:giga <url>`. Or consider using `-q` or `-nv` (for `--quiet` or `--no-verbose`).
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
    python3-pip=${PYTHON_PIP_VERSION} python3-venv=${PYTHON_VENV_VERSION} ruby-full=${RUBY_VERSION} && \
    wget --progress=dot:giga -O /usr/local/bin/hadolint https://github.com/hadolint/hadolint/releases/download/${HADOLINT_VERSION}/hadolint-Linux-x86_64 && \
    chmod +x /usr/local/bin/hadolint && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# Set up a virtual environment specifically for pre-commit
RUN python3 -m venv /opt/precommit-env && \
    /opt/precommit-env/bin/pip install --upgrade pip && \
    /opt/precommit-env/bin/pip install pre-commit

# Add virtual environment to PATH
ENV PATH="/opt/precommit-env/bin:$PATH"

# Set up working directory
WORKDIR /workspace

# Expose necessary ports (8000 for Symfony's built-in server)
EXPOSE 8000
