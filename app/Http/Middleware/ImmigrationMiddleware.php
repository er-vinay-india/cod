<?php

namespace App\Http\Middleware;

use App\Entities\Factory;
use Closure;

class ImmigrationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Is User Athenticated?
        $authorization = $request->header('Authorization');
        $authorization = trim(str_replace('Bearer','', $authorization));

        $token = \App\Entities\Token::check($authorization);

        if(!$token) {
            return response()->json([
                'status' => 'error',
                'result' => [
                    'message' => 'Access Denied'
                ]
            ]);
        } else {
            $user_guid = $token->getUserGuid();
            $user = Factory::build('user', $user_guid);
            
            // Generate Session
            session([
                '__user__' => serialize($user)
            ]);
        }

        return $next($request);
    }
}
