CREATE DATABASE newright;
SHOW DATABASES;

CREATE USER newrightuser@localhost IDENTIFIED BY 'newrightpassword';
GRANT ALL PRIVILEGES ON newright.* TO newrightuser@localhost;
FLUSH PRIVILEGES;

SHOW GRANTS FOR newrightuser@localhost;

