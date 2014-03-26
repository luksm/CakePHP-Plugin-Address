# Address Plugin for CakePHP #

for cake 2.x

The address plugin is for easing the way addresses are created and inputed in the application.

It allows the admins to create different addresses and enables the user to search for an address using only the zipcode and filling out the rest of the information to make it more precise.

This plugin is a base to extend the usage os addresses in your application.

## Installation ##

_[GIT Submodule]_

In your app directory type:

```shell
git submodule add -b master git://github.com/luksm/CakePHP-Plugin-Address.git Plugin/Address
git submodule init
git submodule update
```

_[GIT Clone]_

In your `Plugin` directory type:

```shell
git clone -b master git://github.com/luksm/CakePHP-Plugin-Address.git Address
```

The plugin is pretty easy to set up, all you need to do is to copy it to you application plugins folder and load the needed tables. You can create database tables using the schema shell:

	./Console/cake schema create users --plugin Address

## How to use it ##

This plugin is separated in different levels

<dl>
	<dt>Country</dt>
	<dd>The Country information</dd>
	<dt>State</dt>
	<dd>The State information, belongs to Country</dd>
	<dt>City</dt>
	<dd>The City information, belongs to City</dd>
	<dt>Neightborhood</dt>
	<dd>The neighbothood information, belongs to City</dd>
	<dt>Address</dt>
	<dd>The Address information, belongs to City</dd>
</dl>

So just create an relation to the level you want.

If you are going to use it all the way to Address, there's an element to find an address via zipcode

```php
echo $this->element('Address.searchZip');
```
This will output an query field and fill a hidden field with the address_id

## Requirements ##

* PHP version: PHP 5.2+
* CakePHP version: Cakephp 2.0

## TO-DOs ##

* [ ] List Features

## Support ##

For support and feature request, please create an issue

## Branch strategy ##

The master branch holds the STABLE latest version of the plugin. 
Develop branch is UNSTABLE and used to test new features before releasing them. 

All versions are updated with security patches.

## Contributing to this Plugin ##

Please feel free to contribute to the plugin with new issues, requests, unit tests and code fixes or new features. If you want to contribute some code, create a feature branch from develop, and send us your pull request. Unit tests for new features and issues detected are mandatory to keep quality high. 

## License ##

Copyright 2014, [Lucas Machado](http://lucasms.net)

Licensed under [The MIT License](http://www.opensource.org/licenses/mit-license.php)<br/>
Redistributions of files must retain the above copyright notice.