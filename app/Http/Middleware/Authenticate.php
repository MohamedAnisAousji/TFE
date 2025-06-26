<?php

namespace App\Http\Middleware;
use Closure;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware {
	/**
	 * Get the path the user should be redirected to when they are not authenticated.
	 */
	protected function redirectTo(Request $request): ?string {

		if ($request->expectsJson()) {
			return null;
		}

		// Vous pouvez déterminer le guard utilisé et rediriger en conséquence
		$requestGuard = $this->getRequestGuard($request);
		$guard = session('auth_guard', $requestGuard); // Obtenez le guard utilisé
		switch ($guard) {
		case 'client':
			return route('Loginform'); // Remplacez par le nom de la route de connexion pour geniteur
		default:
			
			return route('login'); // Ceci est la route de connexion par défaut de Breeze
		}
	}

	protected function getRequestGuard(Request $request): ?string {
		$route = $request->route();

		if (!$route) {
			return null;
		}

		$actions = $route->getAction();

		if (isset($actions['middleware'])) {
			foreach ($actions['middleware'] as $middleware) {
				if (strpos($middleware, 'auth:') === 0) {
					return explode(':', $middleware)[1];
				}
			}
		}

		return null;
	}




}
