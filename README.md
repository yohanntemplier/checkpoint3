WCS PHP Checkpoint
=====================
![](https://static.tvtropes.org/pmwiki/pub/images/potc_monocle2.jpg)

Launch your server and see instructions.

Requirements
------------

  * Php ^7.2    http://php.net/manual/fr/install.php;
  * Composer    https://getcomposer.org/download/;

Installation
------------

1 . Clone the current repository.

2 . Move in and create a `.env.local` file. 
**This one is not committed to the shared repository.**
Set `db_name` to **checkpoint3** DB.
 
3 . Execute commands below into your working folder to install the project:

```bash
$ composer install
$ bin/console d:d:c (create 'checkpoint3' DB)
```
> Reminder : Don't use composer update to avoid problem

> Assets are directly into *public/* directory, **we will not use** Webpack with this checkpoint


Usage
-----

Launch the server with command below and follow instructions on homepage `/`;

```bash
$ bin/console s:r
```
