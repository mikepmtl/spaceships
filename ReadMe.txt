===================================================================================================
                                            TEST NOTES
===================================================================================================


All source code can be found in the following directories

/app   - Main application code
/core  - Core classes to support application
/js    - NameSpace Pattern ECMAScript (JS) files
/sass  - SASS files
/test  - PHPUnit tests

Other folder:

/bin    - helper scripts (fix permissions)
/puppet - Puppet scripts to configure Virtual Machine


Some features of the application:

    - Cache - Uses a File based Cache for the PHP API calls. TTL configurable in config.php.
    - Logging - Has a singleton Logging class to allow file based logging.
    - Uses ECMAScript (JS) NameSpace Pattern for organization and to avoid any variable/method clashes.
    - JS Ajax calls to API for model details (simply to demonstrate usage).
    - Class Auto-loading via composer.

Development environment:

    - Uses Gulp for SASS to CSS and JS file concatenation, uglifying and minifying as well as a watcher to automatically re-compile SASS.
    - Uses Composer for PHP package dependencies (./composer.phar update).
    - User Bower for JS package dependencies (bower update).
    - Has local development environment using Vagrant. You only need to "vagrant up" to start working on the project.
    - PHPUnit tests and coverage.




===================================================================================================


# PostcardMania Developer Test

Overall goals of this test:

 * Demonstrate the understanding of working with APIs
 * Demonstrate an understanding of working with Bootstrap/Html/CSS
 * Demonstrate an understanding of PHP
 * Demonstrate an understanding of working with JQuery/Javascript
 * Demonstrate an understanding of working with Github based version control


We feel this test accomplishes all of the above goals and should only take you roughly an hour to complete.

Please read the following instructions carefully and complete this test to the best of your ability.

1. Clone this repository
2. Using Bootstrap/HTML build out an HTML template to be used with this test modeled after Screenshot1 and Screenshot2.
3. Using stand-alone PHP (No-Framework), connect to the provided starship API and display them dynamically on the page as shown in Screenshot 1.
4. Paginate the dynamic results that were added to the page via PHP, using either PHP or Javascript.
5. Using Jquery and Bootstraps modal code recreate Screenshot 2 by connecting to the API again to pull the specific details about the starship the user is clicking on.
6. Email us a zip of your code


Thanks, and good luck!