# Installation

## Laravel
1. copy to /packages/thunderlabid/PACKAGE_NAMEs
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
	Thunderlabid\PACKAGE_NAME\PACKAGE_NAMEServiceProvider::class
```

## Lumen
1. copy to /packages/thunderlabid/PACKAGE_NAMEs
2. in composer.json add this package
```
	"psr-4": {
	    "App\\": "app/",
	    "Thunderlabid\\PACKAGE_NAME\\": "packages/thunderlabid/PACKAGE_NAMEs/"
	}
```
3. run composer du
4. add to bootstrap/app.php 
	```php
		$app->register(Thunderlabid\PACKAGE_NAME\PACKAGE_NAMEServiceProvider::class);
	```
5. Enable Eloquent in bootstrap/app.php
	```php
		$app->withEloquent();
	```

