PipeDrive for Laravel 4
==============

Its client api to access data from pipedrive

### Installation

Include laravel4pipedrive as a dependency in composer.json:

~~~
"jrshah/laravel4pipedrive": "dev-master"
~~~

Run `composer install` to download the dependency.

Add the ServiceProvider to your provider array within `app/config/app.php`:

~~~
'providers' => array(

    'Jrshah\Laravel4pipedrive\Laravel4pipedriveServiceProvider'

)
~~~

Finally, publish the configuration files via `php artisan config:publish jrshah/laravel4pipedrive`.


### Configuration

Once you have published the configuration files, you can set your API Token, Url and Version in `app/config/packages/jrshah/laravel4pipedrive/config.php`:

~~~
<?php
return array(
  'api_token' => 'your-pipedrive-token',
  'api_url' => 'api-url-for-pipedrive',
  'api_version' => 'pipedrive-api-version'
);
~~~

### Usage

~~~

// get all deals
PipeDrive::request('GET','deals');

// update a deal
PipeDrive::request('PUT','deals',1,array('title'=>'update the title'));

~~~
