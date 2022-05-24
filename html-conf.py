'''
apache-live-server on ubuntu linux configuration:

/etc/apache2/

/conf-available/serve-cgi-bin.conf +ExecCGI
dir: /var/www/stella

/sites-enabled/stella.conf </Directory> /var/www/stella error log
/sites-available/000-default.conf error log DocumentRoot: /var/www/stella
/sites-available/stella.conf virtual host80 error log root /stella grant

apache2.conf ScriptAlias /var/www/stella +ExecCGI
'''
