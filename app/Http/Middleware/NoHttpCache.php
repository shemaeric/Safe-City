<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class NoHttpCache
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // This step is only needed if you are returning
        // a view in your Controller or elsewhere, because
        // when returning a view `$next($request)` returns
        // a View object, not a Response object, so we need
        // to wrap the View back in a Response.
        if (!$response instanceof SymfonyResponse) {
            $response = new Response($response);
        }

        /**
         * @var  $headers  \Symfony\Component\HttpFoundation\HeaderBag
         */
        $response->header('Pragma', 'no-cache');
        $response->header('Expires', 'Fri, 01 Jan 1990 00:00:00 GMT');
        $response->header('Cache-Control', 'no-cache, must-revalidate, no-store, max-age=0, private');

        return $response;
    }
}
