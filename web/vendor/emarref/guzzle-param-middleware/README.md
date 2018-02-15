Guzzle Middleware that adds one or more query parameters to all requests
for a client.

## Usage

```php
$paramMiddleware = new Emarref\Guzzle\Middleware\ParamMiddleware(['foo' => 'bar']);
$stack = GuzzleHttp\HandlerStack::create();
$stack->push($paramMiddleware);
$client = new GuzzleHttp\Client(['handler' => $stack]);
```

All requests made by the guzzle client above will include `foo=bar` in
the GET query.
