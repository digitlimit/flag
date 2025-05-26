# 🇺🇸 digitlimit/flag

[![Latest Version on Packagist](https://img.shields.io/packagist/v/digitlimit/flag.svg?style=flat-square)](https://packagist.org/packages/digitlimit/flag)
[![License: MIT](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build Status](https://img.shields.io/github/actions/workflow/status/digitlimit/flag/tests.yml?branch=main&style=flat-square)](https://github.com/digitlimit/flag/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/digitlimit/flag.svg?style=flat-square)](https://packagist.org/packages/digitlimit/flag)

**digitlimit/flag** is a simple Laravel package that provides Blade and Livewire components for displaying SVG country flags in 1x1 (square) or 4x3 (rectangular) aspect ratios.

It comes bundled with a collection of country flag SVGs and makes rendering them as easy as using a Blade component.

---

## 🚀 Installation

Require the package using Composer:

```bash
composer require digitlimit/flag
```

No need to publish anything — the package auto-discovers and registers itself.

## 🧩 Usage
The package provides Blade components for every country using ISO 3166-1 alpha-2 codes.


## ✅ Basic Usage

```blade
<x-flag::1x1.us />
<x-flag::4x3.us />
```

## 🎨 Custom Classes (e.g., Tailwind CSS)
You can apply custom classes to style the flags:

```blade
<x-flag::1x1.us class="w-6 h-auto rounded-full" />
<x-flag::4x3.us class="w-6 h-auto rounded-full" />
```

## 📐 Available Aspect Ratios
1x1: Square flags
4x3: Traditional rectangular flags

## 🧪 Example Usage

```blade
<div class="flex space-x-2 items-center">
    <x-flag::1x1.ng class="w-6 h-6 rounded-full" />
    <span>Nigeria</span>
</div>

<div class="flex space-x-2 items-center">
    <x-flag::4x3.gb class="w-10 h-auto rounded" />
    <span>United Kingdom</span>
</div>
```

## 🌍 Supported Countries
All ISO 3166-1 alpha-2 country codes are supported (e.g., us, ng, gb, fr, de, etc.).

The flag assets are stored in:

```bash
resources/flags/1x1/
resources/flags/4x3/
```

Refer to this Wikipedia page for a full list of valid codes.

## 📦 Asset Publishing (Optional)
If you want to customize or reference the SVG files directly:

```bash
php artisan vendor:publish --tag=flag-assets
```

The files will be published to your public/vendor/flag directory.

## ❓ FAQ
Q: What if a flag doesn’t show up?

Make sure:
You’re using a valid ISO alpha-2 country code.
The country code is lowercase (e.g., ng, us, de, not NG or Us).

Q: Can I use this in Livewire components?
Yes! Blade components work seamlessly in Livewire views.

Q: Will this work with Tailwind CSS?
Absolutely. Pass any Tailwind or custom class names via the class attribute.

## 🧪 Testing
To run the tests:

```bash
composer test
```

Or with Pest:

```bash
./vendor/bin/pest
```

## 🛠️ Contributing
Contributions are welcome! Please fork this repository and submit a pull request:

- Fork the repo
  Create your feature branch (git checkout -b feature/your-feature)
- Commit your changes
- Push to the branch
- Create a new Pull Request

## 📄 License
This package is open-sourced software licensed under the MIT license.