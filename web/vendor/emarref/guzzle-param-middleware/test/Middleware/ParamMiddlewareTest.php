<?php

namespace Emarref\Guzzle\Middleware;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

class ParamMiddlewareTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Adding no parameters adds nothing to the query
     */
    public function testNoChange()
    {
        $this->assertSame('', $this->performWith([]));
    }

    /**
     * Adding a simple parameter
     */
    public function testAddParam()
    {
        $this->assertSame('foo=bar', $this->performWith(['foo' => 'bar']));
    }

    /**
     * Passing a query parameter in the ->request() method is overwridden by the configured param middleware
     */
    public function testOverwriteParam()
    {
        $this->assertSame('foo=new', $this->performWith(['foo' => 'new'], ['foo' => 'bar']));
    }

    /**
     * Add multiple query params
     */
    public function testAddMultipleParam()
    {
        $this->assertSame('foo=bar&bar=foo', $this->performWith(['foo' => 'bar', 'bar' => 'foo']));
    }

    /**
     * @param array $params
     * @return Client
     */
    protected function performWith(array $params, array $originalQuery = [])
    {
        $history = [];
        $handler = new MockHandler([new Response()]);
        $stack = HandlerStack::create($handler);

        $stack->push(ParamMiddleware::create($params));
        $stack->push(Middleware::history($history));

        $client = new Client(['handler' => $stack]);
        $client->get('/', ['query' => $originalQuery]);

        return $history[0]['request']->getUri()->getQuery();
    }
}
