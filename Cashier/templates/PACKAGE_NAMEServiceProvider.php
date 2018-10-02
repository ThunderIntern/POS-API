<?php

namespace Thunderlabid\PACKAGE_NAME;

/*===============================
=            Laravel            =
===============================*/
use Illuminate\Support\ServiceProvider;
use Exception;
use Event;
use Validator;
use Firebase\JWT\JWT;
/*=====  End of Laravel  ======*/

/*==============================
=            Models            =
==============================*/
// use Thunderlabid\PACKAGE_NAME\DAL\Models\MODEL_NAME;
/*=====  End of Models  ======*/


/*=================================
=            Observers            =
=================================*/
use Thunderlabid\PACKAGE_NAME\DAL\Observers\GenerateUUID;
use Thunderlabid\PACKAGE_NAME\DAL\Observers\Validate;
/*=====  End of Observers  ======*/


class PACKAGE_NAMEServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application events.
	 */
	public function boot()
	{
		////////////////
		// Migrations //
		////////////////
		$this->loadMigrationsFrom(__DIR__.'/DAL/migrations');
	    // $this->commands(
	    					// \Thunderlabid\PACKAGE_NAME\AL\Console\Commands\COMMAND::class,
	    				// );

	    /*===========================
	    =            DAL            =
	    ===========================*/
		// DAL\Models\MODEL_NAME::observe(new GenerateUUID);
		// DAL\Models\MODEL_NAME::observe(new Validate);
	    /*=====  End of DAL  ======*/
	    

	    /*===========================
	    =            BLL            =
	    ===========================*/
		// Event::listen(\Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME\EVENT_NAME::class,				\Thunderlabid\PACKAGE_NAME\BLL\Listeners\MODEL_NAME\LISTENER::class . '@handle');
	    /*=====  End of BLL  ======*/

	    /*==========================
	    =            AL            =
	    ==========================*/
	    /*=====  End of AL  ======*/
	    
	}

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		
		
	}
}
