oci8Pdo
=======

## A Yii2 Extension to simulate the Oracle PDO using the PHP OCI8 functions.

## Composer

oci8Pdo is available through [composer](https://getcomposer.org/)

    composer require professionalweb/oci8Pdo "dev-master"
  
Alternatively you can add the following to the `require` section in your `composer.json` manually:

```json
"professionalweb/oci8Pdo": "dev-master"
```

Run `composer update` afterwards.

### In your PHP project
### Config
```php
return [
    'components' => [
        'db' => [
            'class' => 'professionalweb\oci8Pdo\Connection',
            'dsn' => 'oci:dbname=DBNAME',
            'username' => 'LOGIN',
            'password' => 'PASSWORD',
            'enableQueryCache' => false,
            'enableSchemaCache' => true,
            'schemaCache' => 'cache',
            'schemaCacheDuration' => 0,
            'queryCacheDuration' => 3600,
            'on afterOpen' => function($event) {
                $event->sender->createCommand("alter session set nls_date_format='dd.mm.yyyy hh24:mi'")->execute();
            }
        ]
    ]
];
```

## The MIT License

Copyright (c) 2012 Jeroen den Haan

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.