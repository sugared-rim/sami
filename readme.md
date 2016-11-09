# SugaredRim\Sami [![Build Status](https://travis-ci.org/sugared-rim/sami.svg?branch=master)](https://travis-ci.org/sugared-rim/sami) [![Coverage Status](https://coveralls.io/repos/sugared-rim/sami/badge.svg?branch=master&service=github)](https://coveralls.io/github/sugared-rim/sami?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sugared-rim/sami/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sugared-rim/sami/?branch=master) [![Code Climate](https://codeclimate.com/github/sugared-rim/sami/badges/gpa.svg)](https://codeclimate.com/github/sugared-rim/sami)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/14949cd9-6da3-471f-afd8-292752eecc8f/big.png)](https://insight.sensiolabs.com/projects/14949cd9-6da3-471f-afd8-292752eecc8f)

> Sami sweetened with ease :cherries:

SugaredRim\Sami takes an opinionated view of generating documentation with [Sami](https://github.com/FriendsOfPHP/Sami), it is preconfigured to get you up and running as quickly as possible.

## Install

```
$ composer require --dev sugared-rim/sami
```

## Usage

Instead of creating a configuration file and running `sami.phar update /path/to/config.php`, just run `sugared-rim-sami` - that's it:

```json
{
    ...
    "require-dev": {
        "sugared-rim/sami": ...
    },
    "scripts": {
        "doc": "sugared-rim-sami"
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
        "doc": "sugared-rim-sami"
    },
    "extra": {
        "sugared-rim/sami": {
            "files": "src",
            "filter": "SugaredRim\\Sami\\ProtectedFilter",
            "build_dir": "build/sami",
            "cache_dir": "build/cache/sami"
        }
    }
}
```

All `extra.sugared-rim/sami` options are passed through the [Sami constructor](https://github.com/FriendsOfPHP/Sami#configuration), except:

* `filter`: A FQCN of the filter to use, `sugared-rim-sami` will create an instance for you.

## License

MIT © [Michael Mayer](http://schnittstabil.de)
