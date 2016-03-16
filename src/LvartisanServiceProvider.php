<?php namespace monirz\lvartisan;

use Illuminate\Support\ServiceProvider;

 class LvartisanServiceProvider extends ServiceProvider 
 {


   protected  $commands = [

	   'monirz\lvartisan\Console\Commands\ViewCommand',
   ];

   public function register (){

	   $this->commands($this->commands);

	   }
	   
  public function boot() {
	  
	  require __DIR__ . '/Console/Kernel.php';
	  require __DIR__ . '/Console/Commands/ViewCommand.php';

	  }	   
   	
 	 
}

 
