<?php

namespace App\Http\Middleware;

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
        
        if(!session('__user__')) {
            return response()->json([
                'status' => 'error',
                'result' => [
                    'message' => 'Access Denied'
                ]
            ]); 
        }
        
        $token = \App\Entities\Token::check($authorization);

        if(!$token) {
            return response()->json([
                'status' => 'error',
                'result' => [
                    'message' => 'Access Denied'
                ]
            ]);
        }

        if($token->getUserGuid() != session('__user__')->getGuid()) {
            return response()->json([
                'status' => 'error',
                'result' => [
                    'message' => 'Access Denied'
                ]
            ]);
        }

        return $next($request);
    }
}
