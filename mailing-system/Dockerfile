# Use official PHP image with Apache
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . /var/www/html/

# Install Composer
RUN apt-get update && apt-get install -y unzip git && \
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && \
    php composer-setup.php --install-dir=/usr/local/bin --filename=composer && \
    php -r "unlink('composer-setup.php');"

# Install PHPMailer dependencies via Composer
RUN composer install

# Enable Apache mod_rewrite (optional)
RUN a2enmod rewrite

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
