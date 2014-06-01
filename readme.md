#MultiLanguageLibrary
##by Pentasource

###About
With MLL, you can easily create websites that support multiple languages. Each language is stored in a seperate file, so copying and translating is made very easy.

###Usage
To start using MLL, simply drag the ```inc```-folder into the root directory of your project.

Peek into the ```lang```-folder. There already is a template, ```en.ini```. ```en``` simply means ```English```, and so ```fr``` might be French, and so on.

In that ```en.ini```, you can drop all strings for your page in English.

Once you have everything in there, copy the file, name it something else like ```de.ini```, ```es.ini``` or whatever language you want to support. Then translate all strings and save the file.

Then, in your index.php (or whatever entry point you're using), add the following:
```php
<?php

require_once 'inc/MLL.php';

MLL::init();

?>
```

The ```init()``` function basically retrieves the preferred language stored in the cookies of the user or takes the default language for this session.

*The default language can be changed in the MLL.php. Simply look for it, I'm sure you'll find it.*

You can then retrieve any string from your language files like this:

```php
MLL::get($key);
```
where ```$key``` is the the global name of the string.

```php
<h1><?=MLL::get('page_title')?></h1>
<h2><?=MLL::get('page_subtitle')?></h2>
```

To let the user choose their preferred language, all it takes is one line of code:

```php
MLL::setPreferredLanguage('en');
```

That's it! Your site now supports as many languages as you like!

###Todo
- create API to make new strings using PHP
- create a callback so that, if a string is missing in one file, another language is used