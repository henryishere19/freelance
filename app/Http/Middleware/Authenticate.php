<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (in_array($request->header('Request-From'), ['Postman', 'Android', 'iOS'])) {
			$response = [
			  'success' => "0",
			  'status'  => '401',
			  'message' => 'Unauthorized_access',
			  'data' => new \stdClass(),
			];
			
			http_response_code(401);
			echo json_encode($response); exit;
        }
		return route('login');
    }
}