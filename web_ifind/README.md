# iFind

## Getting started

Install dependencies with:

    npm install

Compress images, vectors, and javascript and less files for production with:

    grunt build

## Database

Generate Database from database folder and run sql from ifind.sql


## Config

Copy config-example.php from application/config then rename to config.php and config some parameter inside config.php

    $config['base_url']	= 'http://ifind.example.com/';

    $config['index_page'] = '';


Copy database-example.php from application/config then rename to database.php and config some parameter inside database.php

    $db['default']['hostname'] = 'localhost';
    $db['default']['username'] = 'root';
    $db['default']['password'] = '';
    $db['default']['database'] = 'ifind';
    $db['default']['dbdriver'] = 'mysql';



## Done

let try website. have fun !!

or try on [Demo](http://ifind.weevirus.com/)