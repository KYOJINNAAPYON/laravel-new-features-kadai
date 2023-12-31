# Goodby, CSV

[![Build Status](https://secure.travis-ci.org/goodby/csv.png?branch=master)](https://travis-ci.org/goodby/csv)

## What is "Goodby CSV"?

Goodby CSV is a flexible and extendable open-source CSV import/export library.

```php
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

$lexer = new Lexer(new LexerConfig());
$interpreter = new Interpreter();
$interpreter->addObserver(function(array $row) {
    // do something here.
	// for example, insert $row to database.
});
$lexer->parse('data.csv', $interpreter);
```


### Features

#### 1. Memory Management Free

This library designed for memory unbreakable. It will not be accumulated in the memory whole rows. The importer read CSV file and execute callback function line by line.

#### 2. Multibyte support

This library supports mulitbyte input/output: for example, SJIS-win, EUC-JP and UTF-8.

#### 3. Ready to Use for Enterprise Applications

Goodby CSV is fully unit-tested. The library is stable and ready to be used in large projects like enterprise applications.

## Requirements

* PHP 5.3.2 or later
* mbstring

## Installation

Install composer in your project:

```
curl -s http://getcomposer.org/installer | php
```

Create a `composer.json` file in your project root:

```json
{
    "require": {
        "goodby/csv": "*"
    }
}
```

Install via composer:

```
php composer.phar install
```

## Documentation

### Configuration

Import configuration:

```php
use Goodby\CSV\Import\Standard\LexerConfig;

$config = new LexerConfig();
$config
    ->setDelimiter("\t") // Customize delimiter. Default value is comma(,)
    ->setEnclosure("'")  // Customize enclosure. Default value is double quotation(")
    ->setEscape("\\")    // Customize escape character. Default value is backslash(\)
    ->setToCharset('UTF-8') // Customize target encoding. Default value is null, no converting.
    ->setFromCharset('SJIS-win') // Customize CSV file encoding. Default value is null.
;
```

Export configuration:

```php
use Goodby\CSV\Export\Standard\ExporterConfig;

$config = new ExporterConfig();
$config
    ->setDelimiter("\t") // Customize delimiter. Default value is comma(,)
    ->setEnclosure("'")  // Customize enclosure. Default value is double quotation(")
    ->setEscape("\\")    // Customize escape character. Default value is backslash(\)
    ->setToCharset('SJIS-win') // Customize file encoding. Default value is null, no converting.
    ->setFromCharset('UTF-8') // Customize source  encoding. Default value is null.
;
```

### Unstrict Row Consistency Mode

As default, Goodby CSV throws `StrictViolationException` when it meet with a row which column count is different from the other columns. In the case you want to import such a CSV, you can call `Interpreter::unstrict()` to disable row consistency check at importing process

rough.csv:

```csv
foo,bar,baz
foo,bar
foo
foo,bar,baz
```

```php
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\LexerConfig;

$interpreter = new Interpreter();
$interpreter->unstrict(); // Ignore row column count consistency

$lexer = new Lexer(new LexerConfig());
$lexer->parse('rough.csv', $interpreter);
```

## Examples

### Import to Database via PDO

user.csv:

```
1,alice,alice@example.com
2,bob,bob@example.com
3,carol,carol@eample.com
```

```php
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');
$pdo->query('CREATE TABLE IF NOT EXISTS user (id INT, `name` VARCHAR(255), email VARCHAR(255))');

$config = new LexerConfig();
$lexer = new Lexer($config);

$interpreter = new Interpreter();

$interpreter->addObserver(function(array $columns) use ($pdo) {
    $stmt = $pdo->prepare('INSERT INTO user (id, name, email) VALUES (?, ?, ?)');
    $stmt->execute($columns);
});

$lexer->parse('user.csv', $interpreter);

```

### Import form TSV(tab separated values) to array

temperature.tsv:

```
9	Tokyo
27	Singapore
-5	Seoul
7	Shanghai
```

```php
use Goodby\CSV\Import\Standard\Lexer;
use Goodby\CSV\Import\Standard\Interpreter;
use Goodby\CSV\Import\Standard\LexerConfig;

$temperature = array();

$config = new LexerConfig();
$config->setDelimiter("\t");
$lexer = new Lexer($config);

$interpreter = new Interpreter();
$interpreter->addObserver(function(array $row) use (&$temperature) {
    $temperature[] = array(
        'temperature' => $row[0],
        'city'        => $row[1],
    );
});

$lexer->parse('temperature.tsv', $interpreter);

print_r($temperature);
```

### Export from array

```php
use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;

$config = new ExporterConfig();
$exporter = new Exporter($config);

$exporter->export('php://output', array(
    array('1', 'alice', 'alice@example.com'),
    array('2', 'bob', 'bob@example.com'),
    array('3', 'carol', 'carol@example.com'),
));
```


### Export from database via PDO

```php
use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;
use Goodby\CSV\Export\Standard\Collection\PdoCollection;

$pdo = new PDO('mysql:host=localhost;dbname=test', 'root', 'root');

$pdo->query('CREATE TABLE IF NOT EXISTS user (id INT, `name` VARCHAR(255), email VARCHAR(255))');
$pdo->query("INSERT INTO user VALUES(1, 'alice', 'alice@example.com')");
$pdo->query("INSERT INTO user VALUES(2, 'bob', 'bob@example.com')");
$pdo->query("INSERT INTO user VALUES(3, 'carol', 'carol@example.com')");

$config = new ExporterConfig();
$exporter = new Exporter($config);

$stmt = $pdo->prepare("SELECT * FROM user");
$stmt->execute();

$exporter->export('php://output', new PdoCollection($stmt));
```

## License

Csv is open-sourced software licensed under the MIT License - see the LICENSE file for details


## Contributing

We works under test driven development.

Checkout master source code from github:

```
hub clone goodby/csv
```

Install components via composer:

```
# If you don't have composer.phar
./scripts/bundle-devtools.sh .

# If you have composer.phar
composer.phar install --dev
```

Run phpunit:

```
./vendor/bin/phpunit
```

## Acknowledgement

editing...