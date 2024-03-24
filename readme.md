# Alphabetise Plugin

## What is it?

The `alphabetise` plugin takes a given [Kirby CMS](http://getkirby.com/) *page* array or *tag* array and returns an alphabetised or numbered array that you can then display or process further.

This plugin is compatible with both Kirby 3 and Kirby 4.


## Installation

### Clone

1. [Clone](https://github.com/shoesforindustry/kirby-plugins-alphabetise.git) this repository.
2. Move the folder to `site/plugins`
3. Rename the folder to `alphabetise`

### Download
 
1. [Download](https://github.com/shoesforindustry/kirby-plugins-alphabetise/archive/master.zip) this repository.
2. Decompress the `master.zip` archive.
3. Move the folder to `site/plugins`
4. Rename the folder to `alphabetise`


## How do you use it?

### 1. Create an alphabetical list of child pages using a key value

The first argument you pass is the sorted `$page` array you want to alphabetise. The second array's `key` argument determines what to alphabetise by. It should be a string like a page `title` or `date`. The values passed to `sortBy` and `key` are usually the same.

For example, in your template:

```php

<?php $alphabetise = alphabetise($page->children()->listed()->sortby('title'), array('key' => 'title')); ?>

```

### 2. Loop through the returned results and display them

```php
<?php foreach($alphabetise as $letter => $items) : ?>
  <h2><?= str::upper($letter) ?></h2>
  <ul>
  <?php foreach($items as $item): ?>
    <li>
      <a href="<?= $item->url()?>">
        <?= $item->title()?>
      </a>
   	</li>
  <?php endforeach ?>
  </ul>
  <hr>
<?php endforeach ?>
```

Result:

+ **A**
  + Aa
  + Ab
+ **B**
  + Ba
  + Bb
+ **1**
  + 1a
  + 1b
+ **2**
  + 2a
  + 2b

### 3. Optionally set the sort order

By default, letters appear before numbers.

+ A
+ B
+ 1
+ 2

To have numbers listed first, set the `orderby` key to `SORT_STRING`

+ 1
+ 2
+ A
+ B

```php
<?php $alphabetise = alphabetise($page->children()->listed()->sortby('title'), array('key' => 'title', 'orderby'=>SORT_STRING));?>

```

## Additional Information

The `explode` function used for array parsing uses the tilde character `~` as the separator value. If this character appears in a `key` value, especially at the beginning of a string, you could run into sorting problems. You can manually change the separator value if required.

We are using the `ksort` function, so other [sorting type parameters](https://www.php.net/manual/en/function.ksort.php) might be usable, but are untested.

Related to this, the `orderby` key is not a string.


## Release Notes

### 0.1.3
+ Added check for duplicate `key` values.
+ Updated documentation.

### 0.1.2
+ Added field to `composer.json` for link in Kirby Panel.

### 0.1.1
+ Additional fixes for Kirby 3 compatibility.

### 0.1.0
+ Renamed `alphabetise.php` to `index.php` for Kirby 3 compatibility.
+ Renamed `package.json` to `composer.json`
+ Updated documentation.

### 0.0.9
+ Added `orderby` key for alternative sort order.

### 0.0.8
+ Fixed `Array to string conversion` error.

### 0.0.7
+ Fixed a small bug in the 0.0.6 update.

### 0.0.6
+ Fixed bug when using only a single character of text for a `key` field.
+ Updated documentation to remove workaround.

### 0.0.5
+ Discovered bug when using only a single character of text for a `key` field.
+ Updated documentation with explanation and possible workaround.

### 0.0.4
+ Bug fix for spaces in `explode` key, now `'~'` instead of space `' '`
+ Updated page code with a pre-sort `'sortby('title')'`
+ Updated documentation and examples.

### 0.0.3
+ Updated documentation.

### 0.0.2
+ Added error handling code.
+ Updated documentation.

### 0.0.1
+ Initial release.

## Authors

Russ Baldwin
[shoesforindustry.net](https://shoesforindustry.net/)

Additional contributions from:

Grant Hutchinson
[splorp.com](https://splorp.com/)
