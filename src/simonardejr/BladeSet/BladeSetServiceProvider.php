<?php namespace simonardejr\BladeSet;

use Illuminate\Support\ServiceProvider;

class BladeSetServiceProvider extends ServiceProvider {
	
	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register() {
		$blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();

		$blade->extend(function($value, $compiler) {
			
			$value = preg_replace("/@set\('(.*?)'\,(.*?)\);/mis", '<?php $$1 = $2; ?>', $value); 

		    return $value;
		});
	}
	
}
