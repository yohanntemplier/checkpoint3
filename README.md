<p align="center"><a href="https://symfony.com" target="_blank">
    <img src="https://static.tvtropes.org/pmwiki/pub/images/potc_monocle2.jpg">
</a></p>

WCS PHP Checkpoint
=====================

Launch your server and see instructions.

Requirements
------------

  * Php ^7.2    http://php.net/manual/fr/install.php;
  * Composer    https://getcomposer.org/download/;

Installation
------------

1 . Clone the current repository.

2 . Move in and create few `.env.{environment}.local` files according to your environments with your default configuration
or only one global `.env.local`. **This one is not committed to the shared repository.**
Set `db_name` to **checkpoint3** DB.
 
3 . Execute commands below into your working folder to install the project:

```bash
$ composer install
$ Don't use composer update to avoid SIG11
$ bin/console d:d:c (create 'checkpoint3' DB)
```

Usage
-----

```bash
$ bin/console s:r
```
