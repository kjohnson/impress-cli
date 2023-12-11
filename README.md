```ascii
 _____                                   
|_   _|                                  
  | |  _ __ ___  _ __  _ __ ___  ___ ___ 
  | | | '_ ` _ \| '_ \| '__/ _ \/ __/ __|
 _| |_| | | | | | |_) | | |  __/\__ \__ \
|_____|_| |_| |_| .__/|_|  \___||___/___/
                | |                      
                |_|                      
```

**Impress** is a developer command line tool for generating Domain Driven Design (DDD) classes, such as _actions_, _controllers_, and _exceptions_ under a specific _domain_.

## Installation

The CLI installs globally via [Composer](https://getcomposer.org/) and can be called from any directory containing a `src` sub-directory.

```bash
composer global require kjohnson/impress-cli
```

Note: `.composer/vendor/bin` must be included in PATH for the command to be called globally, which varies across operating systems.

## Usage

Once installed, the CLI can be called from any directory containing a `src` sub-directory.

```bash
  USAGE:  <command> [options] [arguments]

  make:action     Create a new Action class
  make:controller Create a new Controller class
  make:domain     Create a new Domain directory
  make:exception  Create a new Exception class
```

Example usage:
```bash
impress make:domain User
// Creates the `User` domain/directory within `src/`

impress make:action User UpdateUserPassword
// Creates the `UpdateUserPassword` action within the `User` domain
// See src/User/Actions/UpdateUserPassword.php
```

Each command will generate the appropriate directories and files within the corresponding _Domain_.
