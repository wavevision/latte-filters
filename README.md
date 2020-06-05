<p align="center"><a href="https://github.com/wavevision"><img alt="Wavevision s.r.o." src="https://wavevision.com/images/wavevision-logo.png" width="120" /></a></p>
<h1 align="center">Latte Filters</h1>

[![Build Status](https://travis-ci.org/wavevision/latte-filters.svg?branch=master)](https://travis-ci.org/wavevision/latte-filters)
[![Coverage Status](https://coveralls.io/repos/github/wavevision/latte-filters/badge.svg?branch=master&service=github)](https://coveralls.io/github/wavevision/latte-filters?branch=master)
[![PHPStan](https://img.shields.io/badge/style-level%20max-brightgreen.svg?label=phpstan)](https://github.com/phpstan/phpstan)


Set of extra [nette/latte](https://github.com/nette/latte) filters.

## Installation

Via [Composer](https://getcomposer.org)

```bash
composer require wavevision/latte-filters
```

## Contents

- [CzechMonth](./src/LatteFilters/CzechMonth/CzechMonth.php) – render months translated to Czech (incl. inflected version)
- [Email](./src/LatteFilters/Email/Email.php) – render [ProtectedEmail](./src/LatteFilters/Email/ProtectedEmail.php) addresses (HEX encoded)
- [Mtime](./src/LatteFilters/Mtime/Mtime.php) – render filenames with timestamp appeneded to bust caches

## Usage

To use all filters, simply include `common.neon` from this package in your project config:

```neon
includes:
  - %vendorDir%/wavevision/latte-filters/config/common.neon
```

Alternatively, you can register only wanted filters separately, e.g.:

```neon
services:
  - Wavevision\LatteFilters\CzechMonth\CzechMonth
  
  nette.latteFactory:
    setup:
      - addFilter('czechMonth', [@Wavevision\LatteFilters\CzechMonth\CzechMonth, 'process'])
```
