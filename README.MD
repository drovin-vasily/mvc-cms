# MVC CMS

Тестовая CMS для демонстрации владения пониманием MVC.

## Примерные настройки apache
```sh
<VirtualHost *:80>

ServerName t4
DocumentRoot "/var/www/t4/web"

ErrorLog ${APACHE_LOG_DIR}/t4/error.log
CustomLog ${APACHE_LOG_DIR}/t4/access.log combined

<Directory "/var/www/t4/web">

	# use mod_rewrite for pretty URL support
	RewriteEngine on
	# If a directory or a file exists, use the request directly
	RewriteCond %{REQUEST_FILENAME} !-f
	RewriteCond %{REQUEST_FILENAME} !-d
	# Otherwise forward the request to index.php
	RewriteRule . index.php

	# allow access to the directory
	Require all granted

	# ...other settings...
</Directory>

</VirtualHost>
```
