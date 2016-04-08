# Sugared\Sami [![Build Status](https://travis-ci.org/schnittstabil/sugared-sami.svg?branch=master)](https://travis-ci.org/schnittstabil/sugared-sami) [![Coverage Status](https://coveralls.io/repos/schnittstabil/sugared-sami/badge.svg?branch=master&service=github)](https://coveralls.io/github/schnittstabil/sugared-sami?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/schnittstabil/sugared-sami/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/schnittstabil/sugared-sami/?branch=master) [![Code Climate](https://codeclimate.com/github/schnittstabil/sugared-sami/badges/gpa.svg)](https://codeclimate.com/github/schnittstabil/sugared-sami)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/b0fa5338-6763-41f8-8034-0aac13fb4ab2/big.png)](https://insight.sensiolabs.com/projects/b0fa5338-6763-41f8-8034-0aac13fb4ab2)

> Sami sweetened with ease :cherries:

Sugared\Sami takes an opinionated view of generating documentation with [Sami](https://github.com/FriendsOfPHP/Sami), it is preconfigured to get you up and running as quickly as possible.

## Install

```
$ composer require --dev schnittstabil/sugared-sami
```

## Usage

Instead of creating a configuration file and running `sami.phar update /path/to/config.php`, just run `sugared-sami` - that's it:

```json
{
    ...
    "require-dev": {
        "schnittstabil/sugared-sami": ...
    },
    "scripts": {
        "doc": "sugared-sami"
    }
}
```

## Configuration

You may overwrite some options by putting it in your `composer.json`.

Some of the default settings:
```json
{
    ...
    "scripts": {
        "doc": "sugared-sami"
    },
    "extra": {
        "schnittstabil/sugared-sami": {
            "files": "src",
            "filter": "Schnittstabil\\Sugared\\Sami\\ProtectedFilter",
            "build_dir": "build/sami",
            "cache_dir": "build/cache/sami"
        }
    }
}
```

All `extra.schnittstabil/sugared-sami` options are passed through the [Sami constructor](https://github.com/FriendsOfPHP/Sami#configuration), except:

* `filter`: A FQCN of the filter to use, `sugared-sami` will create an instance for you.

## License

MIT © [Michael Mayer](http://schnittstabil.de)
