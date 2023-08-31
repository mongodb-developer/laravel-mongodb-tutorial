#!/bin/sh

# Navigate to your application directory
cd /var/www/htdoc

# displays the current path, for debugging
# pwd

# Check if the vendor directory does not exist
if [ ! -d "vendor" ]; then
    # Run composer install
    composer install
fi

# Then, execute the main command, e.g., starting PHP-FPM
exec php-fpm
