# PHP Belfast CLI Greeter utility

This repository contains code for the Greeter CLI utility as demonstrated at the tenth PHP Belfast meetup.

### [View the talk on YouTube!](https://www.youtube.com/watch?v=cZOyaLLzhe4)

---

## Installation and execution

1. Clone the repository to a folder on your system.
2. Within the project folder run `composer install` from the command line.
3. Change to the 'bin' folder and run `php greeter` or just `greeter` depending on your operating system!

---

## PHAR compilation

Use the following steps to create a PHAR file containing the CLI utility.

1. Ensure that 'phar.readonly = Off' is set in your active php.ini file!
2. Change into the 'compiler' folder and run `composer install` from the command line.
3. Enter `php ./compiler.php` and wait a few moments for the process to complete.
4. Change to the project's 'dist' folder and run `php greeter.phar` to test the utility.
5. Rename 'greeter.phar' to 'greeter' and run `chmod +x greeter` on a *nix based system to make the phar file executable.
6. Copy 'greeter' to somewhere in your PATH to make it executable from anywhere!
