
# String Tokenizer

This GitHub repository contains code related to a String Tokenizer web application built with Laravel. It consists of seven main components:

- `tokenizer.blade.php`: This is the front-end template for the web application, allowing users to input a string and receive tokenized results.

- `TokenizerController.php`: This Laravel controller handles the logic behind tokenizing the input string and responding to user requests.

- `TokenizerService.php`: This service class performs the actual tokenization of input strings and manages database interactions.

- `Tokenizer.php` (Model): This Laravel model represents the database table for storing input strings and their tokenized outputs.

- `2023_09_21_create_tokenizers_table.php` (Migration): This Laravel migration file defines the database schema for the `tokenizers` table, which stores input strings and their corresponding tokenized outputs. And after steup the project make sure run the migration with `php artisan migrate`

- `TokenizerRequest.php` (Request): This Laravel request class defines the validation rules for the input string when a user submits it via a form.

- `web.php` (Routes): This file defines the web routes for your Laravel application, including the routes for the String Tokenizer.

## Table of Contents

- [Introduction](#introduction)
- [Usage](#usage)
- [Components](#components)
  - [tokenizer.blade.php](#tokenizerbladephp)
  - [TokenizerController.php](#tokenizercontrollerphp)
  - [TokenizerService.php](#tokenizerservicephp)
  - [Tokenizer.php (Model)](#tokenizerphp-model)
  - [2023_09_21_create_tokenizers_table.php (Migration)](#2023_09_21_create_tokenizers_tablephp-migration)
  - [TokenizerRequest.php (Request)](#tokenizerrequestphp-request)
  - [web.php (Routes)](#webphp-routes)
- [Dependencies](#dependencies)
- [Contributing](#contributing)
- [License](#license)

## Introduction

This web application provides a simple user interface for tokenizing input strings. It leverages Laravel for the server-side logic, includes Bootstrap for styling the front end, and utilizes the `TokenizerService` for handling tokenization and database interactions. The `TokenizerRequest` class ensures that input strings meet validation criteria before processing.

## Usage

1. Access the web page by opening `tokenizer.blade.php` in a web browser.
2. Enter the string you want to tokenize in the input field.
3. Click the "Tokenize" button.
4. The page will send an HTTP POST request to `/tokenizer/tokenize`, which is handled by `TokenizerController.php`.
5. The controller will call the `tokenizerService()` method in `TokenizerService.php` to tokenize the input string and return the results to be displayed on the web page.

## Components

### `tokenizer.blade.php`

This file contains the HTML, JavaScript, and Bootstrap code necessary for rendering the web page and handling user interactions. It communicates with the `TokenizerController.php` file to initiate tokenization.

### `TokenizerController.php`

The controller is responsible for handling web requests and interacts with the `TokenizerService.php` to tokenize input strings.

### `TokenizerService.php`

The service class performs the actual tokenization of input strings. It includes the following key functionality:

- It tokenizes the input string using a regular expression.
- It stores the input string and the resulting tokens in the database using the `Tokenizer` model.

### `Tokenizer.php` (Model)

This Laravel model represents the database table for storing input strings and their tokenized outputs.

### `2023_09_21_create_tokenizers_table.php` (Migration)

This Laravel migration file defines the database schema for the `tokenizers` table, which stores input strings and their corresponding tokenized outputs. It specifies the table's columns, data types, and timestamps.

### `TokenizerRequest.php` (Request)

This Laravel request class defines the validation rules for the input string when a user submits it via a form. It ensures that the input string is required, a string, and does not exceed 255 characters.

### `web.php` (Routes)

This file defines the web routes for your Laravel application. It includes two routes related to the String Tokenizer:

- `GET /tokenizer`: This route is associated with the `index` method in `TokenizerController.php` and displays the tokenizer web page.

- `POST /tokenizer/tokenize`: This route is associated with the `tokenize` method in `TokenizerController.php` and handles the tokenization process when a user submits the form.

## Dependencies

This web application relies on the following dependencies:

- [Bootstrap](https://getbootstrap.com): Bootstrap is used for styling the user interface.
- [Laravel](https://laravel.com): Laravel is the PHP framework used for the backend of this application.

## Contributing

You are welcome to contribute to this project by improving the code, adding new features, or fixing issues. If you have suggestions or find any bugs, please create an issue or submit a pull request.

## License

This project is open-source and available under the [MIT License](LICENSE). You can use and modify it as per your requirements.


