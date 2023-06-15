# Simple PHP DB Viewer

The project aims to develop a database viewer application inspired by phpMyAdmin, providing users with a graphical interface to explore and interact with databases. 

The application will be implemented using PHP and Twig templating engine.

The database viewer application provides users with a convenient way to explore databases and their tables, making it easier to analyze and manage data.

## Installation

There are only two steps to run this website:

1. Download the project to the desired directory on your computer
2. Run  `php -S localhost:8080` on your terminal. Navigate to http://localhost:8080 to see the site.

By defaut, the page URLs use query strings (*?page=about*). You need to have Apache installed for pretly URLs (*/about*) to work. To activate pretty urls, update config value of `pretty_uri` to `true`.
