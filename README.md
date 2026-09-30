## Example Articles Component

A simple Laravel project that demonstrates how to build an articles component using Laravel's features.

![Example Articles Component Screenshot](art/articles.png)

The goal of this repository is not to build the best articles application. Instead, it focuses on teaching how organize a Laravel application using a component architecture, where an entire feature lives in its own directory.

### Directory Structure

```
components
└── Articles
    ├── ArticlesServiceProvider.php
    ├── Database
    │   └── Migrations
    │       └── 2026_09_08_201036_create_articles_table.php
    ├── Http
    │   └── Controllers
    │       └── ArticleController.php
    ├── Models
    │   └── Article.php
    ├── Routes
    │   └── web.php
    └── Views
        ├── create.blade.php
        ├── edit.blade.php
        ├── form.blade.php
        └── index.blade.php
```

Everything related to the articles feature lives inside the `components/Articles` directory. This includes the controller, model, service provider, migration, views, and routes. This makes the code easier to understand, maintain, and eventually extract another project if needed.

### License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).