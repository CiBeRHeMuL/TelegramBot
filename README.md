# Telegram Bot API Library

[![Latest Stable Version](https://poser.pugx.org/andrew-gos/telegram-bot/v/stable)](https://packagist.org/packages/andrew-gos/telegram-bot)
[![License](https://poser.pugx.org/andrew-gos/telegram-bot/license)](https://packagist.org/packages/andrew-gos/telegram-bot)
[![PHP Version Require](http://poser.pugx.org/andrew-gos/telegram-bot/require/php)](https://packagist.org/packages/andrew-gos/telegram-bot)

### 🌟 Overview

This is a powerful, strictly-typed PHP library for building Telegram bots. It fully leverages the capabilities of **PHP 8.2+** and modern programming
standards to make your development process fast, reliable, and enjoyable.

The library provides a complete toolset for interacting with the **Telegram Bot API**, allowing you to focus on your bot's logic rather than on
low-level implementation details. At its core is a flexible update processing kernel built on `HandlerGroup`, `Checker`, and `Middleware`, ensuring
exceptional modularity and extensibility.

### ✨ Key Features

* **💯 Full API Coverage:** Supports all methods and types of the Telegram Bot API (currently version **9.4**).
* **🔒 Strict Typing:** Maximum code reliability and excellent IDE support.
* **🧩 Modern Architecture:** A flexible update handling system using `HandlerGroup`, `Checker`, and `Middleware`.
* **🔌 Extensibility:** Easily integrate your own logic through plugins and middleware.
* **🤝 PSR Compliant:** Effortless integration with any modern framework.
* **🧪 Thoroughly Tested:** High test coverage ensures stability and reliability.

### 📦 Installation

To install the library, use Composer:

```sh
composer require andrew-gos/telegram-bot
```

### 📚 Documentation

To get started and explore the library's features in-depth, please refer to the following sections:

| Section                                                   | Description                                                                            |
|-----------------------------------------------------------|----------------------------------------------------------------------------------------|
| 🚀 **[Basic Usage (BASIC.md)](README/BASIC.md)**          | **Start here.** A step-by-step guide to creating your first bot and handling commands. |
| ⚙️ **[Advanced Usage (ADVANCED.md)](README/ADVANCED.md)** | Learn about Middleware, Plugins, custom `Checkers`, and other powerful tools.          |
| 🧩 **Framework Integration**                              |                                                                                        |
| • **[Symfony (SYMFONY.md)](README/SYMFONY.md)**           | A guide to setting up the library as a service in Symfony applications.                |
| • **[Yii2 (YII2.md)](README/YII2.md)**                    | A guide for integrating with the Yii2 framework's DI container.                        |

### 🤝 Contributing

Contributions are welcome and greatly appreciated! This project follows the standard GitHub fork & pull request workflow.

**Reporting Bugs and Requesting Features**

* Please use the [GitHub Issues](https://github.com/CiBeRHeMuL/TelegramBot/issues) tracker to report bugs or request new features.
* When reporting a bug, please provide a clear description, steps to reproduce it, and your environment details (PHP version, library version).
* For feature requests, describe the problem you're trying to solve and your proposed solution.

**Submitting Code Changes**

1. **Fork the repository** on GitHub.
2. **Create a new branch** for your changes (e.g. `fix/message-parsing-error`).
3. **Make your changes.** Ensure your code adheres to the project's coding style.
4. **Run the code style fixer.** This project uses `php-cs-fixer`. You can apply the style rules by running:
   ```sh
   composer php-cs-fix
   ```
5. **Add or update tests.** Your pull request should include tests that cover your changes.
6. **Submit a Pull Request** to the `master` branch with a clear description of your changes.

### 📜 License

This project is licensed under the **MIT License**. See the [LICENSE](LICENSE) file for details.
