<?php

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;
use Nette\Application\Routers\Route;

class RouterFactory {

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter() {
    
		$router = new RouteList;
		$router[] = new Route('<presenter>/<action>[/<id>]', 'Homepage:default');
    
		//admin
		/*$router[] = new Route('admin/[/<id>]', array(
			'module' => 'Admin',
			'presenter' => 'Sign',
			'action' => 'in',
			'id' => NULL,
		));*/     
    
		//login
		/*$router[] = new Route('<presenter>/<action>[/<id>]', array(
			'presenter' => 'Sign',
			'action' => 'in',
			'id' => NULL,
		));*/    
    
		return $router;
	}

}
