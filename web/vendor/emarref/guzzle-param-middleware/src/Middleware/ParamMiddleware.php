<?php

namespace Emarref\Guzzle\Middleware;

use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Uri;
use Psr\Http\Message\RequestInterface;

/**
 * A Guzzle middleware that adds query parameters to all requests. Useful for
 * appending params such as api key etc to all requests.
 */
class ParamMiddleware
{
    /**
     * @var array
     */
    private $params;

    /**
     * @param array $params
     */
    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * @param RequestInterface $request
     * @return RequestInterface
     */
    public function __invoke(RequestInterface $request)
    {
        foreach ($this->params as $param => $value) {
            $request = $request->withUri(Uri::withQueryValue(
                $request->getUri(),
                $param,
                $value
            ));
        }

        return $request;
    }

    /**
     * @param array $params
     * @return ParamMiddleware
     */
    public static function create(array $params)
    {
        return Middleware::mapRequest(new static($params));
    }
}
