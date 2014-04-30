<?php namespace Jrshah\Laravel4pipedrive;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

use Config;

class Laravel4pipedriveServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('jrshah/laravel4pipedrive');

		AliasLoader::getInstance()->alias('PipeDrive','Jrshah\Laravel4pipedrive\PipeDrive');

		PipeDrive::setPipeDriveApi(
			array(
				'api_token' 	=> Config::get('laravel4pipedrive::api_token'),
				'api_url'   	=> Config::get('laravel4pipedrive::api_url'),
				'api_version'   => Config::get('laravel4pipedrive::api_version')
			)
		);

	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
