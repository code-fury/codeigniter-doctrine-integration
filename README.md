codeigniter-doctrine-integration
================================

Code Igniter - Doctrine integration including Migration Bundle.

Welcome to the codeigniter-doctrine-integration wiki!

This is an integration of Code Igniter and Doctrine including the Migration Bundle. This also consists of .htaccess file that uses the mode_rewrite which allows you to get rid of index.php in your url.

# Included files
* The Code Igniter project without any configuration. 
* .htaccess file that uses the mode_rewrite which allows you to get rid of index.php in your url. Replace RewriteBase with your choice.
* Doctrine 2.1 files
* application/doctrine.php: a command line interface for Doctrine
* migration_config.yml: a configuration template for migration.

# Usage
* All entities must be inside models/Entity.
* Doctrine will automatically use your database configuration defined in Code Igniter.
* To use the command line interface:
1. cd to application folder
2. run: `php doctrine.php [options]`. Options are the options in the doctrine manual.

Good luck with your project!
