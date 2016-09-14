<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
	public function handle($request, Closure $next, $guard = null)
	{
		if(Auth::guard($guard)->guest())
		{
			if($request->ajax())
			{
				return response('Unauthorized',401);
			}
			else
			{
				return redirect()->route('home');
			}
		}

		return $next($request);
	}
}

?>