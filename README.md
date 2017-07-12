# cors-api-lumen-laravel
Enable/fixing CORS when using API Lumen Laravel

The problems CORS comes when using API Lumen consumed by AJAX.

example of error CORS is : 

```
XMLHttpRequest cannot load 'api url'. No 'Access-Control-Allow-Origin' header is present on the requested resource.
```

In this repository, i use Lumen (5.4.6) (Laravel Components 5.4.*)

The steps to fix the CORS problem:

- Step 1

Add cors class in app\Http\Middleware, example class name is CorsMiddleware.

Just add this script to Intercepts OPTIONS requests:

```php
public function handle($request, Closure $next)
{
        //Intercepts OPTIONS requests
        if ($request->isMethod('OPTIONS')) {
            $response = response('', 200);
        } else {
            // Pass the request to the next middleware
            $response = $next($request);
        }
        // Sends it
        return $response
}
```

- Step 2

Configure/add CorsMiddleware in bootstrap\app.php

The script like belows:

```php
$app->middleware([
    App\Http\Middleware\CorsMiddleware::class
 ]);
 ```

 
 Note: uncomment this middleware configuration if API and Client is tested in local.
 
 
    
