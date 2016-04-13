<?php

$app->get('/', function () use ($app) {
    return response('Bad request', 400)->header('Content-type', 'text/plain');
});

$app->get('/{short_url}', function ($short_url) use ($app) {

    $url = app('db')->table('urls')->where('short_url', $short_url)->first();

    return $url
        ? redirect($url->long_url)
        : response('Bad request', 400)->header('Content-type', 'text/plain');

});

$app->post('/', function () use ($app) {

    $url = app('db')->table('urls');

    $longUrl = app('request')->input('url');

    if (! $longUrl) {
        return response('Bad request', 400)->header('Content-type', 'text/plain');
    }

    if ($data = $url->where('long_url', $longUrl)->first()) {
        return response($data->short_url)->header('Content-type', 'text/plain');
    }

    do {
        $shortUrl = str_random(5);
    } while($url->where('short_url', $shortUrl)->first());

    $url->insert([
        'short_url' => $shortUrl,
        'long_url' => $longUrl,
        'created_at' => new Carbon\Carbon,
        'updated_at' => new Carbon\Carbon,
    ]);

    return response($shortUrl)->header('Content-type', 'text/plain');
});
