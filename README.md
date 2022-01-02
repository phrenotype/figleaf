# FigLeaF
![github stars](https://img.shields.io/github/stars/phrenotype/figleaf?style=social)
![packagist stars](https://img.shields.io/packagist/stars/chase/figleaf)
![license](https://img.shields.io/github/license/phrenotype/figleaf)
![contributors](https://img.shields.io/github/contributors/phrenotype/figleaf)
![contributors](https://img.shields.io/github/languages/code-size/phrenotype/figleaf)
![downloads](https://img.shields.io/packagist/dm/chase/figleaf)  

This library keeps bots and unwanted humans from making requests to your website.
 
It offers full csrf token generation and validation, without external dependencies.

With this, a brute force attack is only possible with browser automation, hence increased cost.

## Install  
`composer require chase/figleaf`  

## Usage

To generate a csrf token for some random use ( you decide )  

```php
<?php

use Chase\FigLeaf\FigLeaf;

$token = FigLeaf::token(true);

echo $token;
```

```html
36ea3cb936ea66dbe4fc50444176a84c8138f76859467b86986efb53f1d6
```

To get the current or old token value use `FigLeaf::token()`.  


To generate a hidden input field  

```php
<?php

use Chase\FigLeaf\FigLeaf;

$input = FigLeaf::input(true);

echo $input;
```  

```html
<input type="hidden" name="__chase_figleaf_token" value="36ea3cb936ea66dbe4fc50444176a84c8138f76859467b86986efb53f1d6"/>
```  
Again, to get an input based on the old or current value, use `FigLeaf::input()`.

You can then go on to add the input to your form or web request as the case may be.

## Validation

After a form is submitted or a request is sent by a user, you validate it by passing an associative array based on the request medium  
  
```php
<?php

use Chase\FigLeaf\FigLeaf;

$validator = Figleaf::validate($_REQUEST)

if($validator->passed()){
    // Do something
}

if($validator->failed()){
    // Do something
}

```  

## Recommendation  
It is highly recommeded you always generate new tokens per request, otherwise, this whole 'keeping bots and unwanted humans' away thing will just be an empty promise.

## Contact  
**Email** : paul.contrib@gmail.com

