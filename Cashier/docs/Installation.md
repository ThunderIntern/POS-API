# Installation

## Laravel
1. copy to /packages/thunderlabid/Products
2. in composer.json add this package
```
	"psr-4": {
	    "App\\": "app/",
	    "Thunderlabid\\": "packages/thunderlabid"
	}
```
3. run composer du
4. Register ServiceProvider to config/app.php
```php
	Thunderlabid\Product\ProductServiceProvider::class
```

## Lumen
1. copy to /packages/thunderlabid/Products
2. in composer.json add this package
```
	"psr-4": {
	    "App\\": "app/",
	    "Thunderlabid\\Product\\": "packages/thunderlabid/Products/"
	}
```
3. run composer du
4. add to bootstrap/app.php 
	```php
		$app->register(Thunderlabid\Product\ProductServiceProvider::class);
	```
5. Enable Eloquent in bootstrap/app.php
	```php
		$app->withEloquent();
	```

