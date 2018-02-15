<?php

namespace App\CMS\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\ResponseCache\ResponseCache;
use Spatie\ResponseCache\Events\CacheMissed;
use Symfony\Component\HttpFoundation\Response;
use Spatie\ResponseCache\Events\ResponseCacheHit;

class CustomCacheResponse
{
    /** @var \Spatie\ResponseCache\ResponseCache */
    protected $responseCache;

    /**
     * CustomCacheResponse constructor.
     * @param ResponseCache $responseCache
     */
    public function __construct(ResponseCache $responseCache)
    {
        $this->responseCache = $responseCache;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {

        if ($this->responseCache->enabled($request)) {
            if ($this->responseCache->hasBeenCached($request)) {
                event(new ResponseCacheHit($request));

                return $this->responseCache->getCachedResponseFor($request);
            }
        }

        $response = $next($request);

        if ($this->responseCache->enabled($request)) {
            $exceptionFound = $request->attributes->get('exception_found', false);
            if ($this->responseCache->shouldCache($request, $response) && ! $exceptionFound) {
                $this->responseCache->cacheResponse($request, $response);
            }
        }

        event(new CacheMissed($request));

        return $response;
    }
}
