#laravel-socialmedia

[![Build Status](https://travis-ci.org/motwreen/laravel-socialmedia.svg?branch=master)](https://travis-ci.org/motwreen/laravel-socialmedia)
[![MIT License](https://img.shields.io/packagist/l/motwreen/laravel-socialmedia.svg?style=flat-square)](https://packagist.org/packages/motwreen/laravel-socialmedia)

The first step will be to implement a post function for each Driver .


## Install
```
composer require "motwreen/laravel-socialmedia":"@dev"
```

```

    'providers' = [
    ...
        Motwreen\Socialmedia\Providers\SocialmediaServiceProvider::class
    ],
    'aliases' = [
    ...
        'Socialmedia' => Motwreen\Socialmedia\Facades\Socialmedia::class
    ]
```

## Usage

```
$config = [
    'app_id'        => 'FACEBOOK_APP_ID',
    'app_secret'    => 'FACEBOOK_APP_SECRET',
    'access_token'  => 'FACEBOOK_APP_ACCESS_TOKEN',
];

$post=['message'=>'Awesome POST Test message'];

Socialmedia::driver('facebook')->setConfig($config)->post($params);
```

## Drivers

### Facebook

[Api Documentation](https://developers.facebook.com/docs/graph-api/reference/v2.7/post)

Obtain permanent Access Token: http://stackoverflow.com/a/28418469

### Twitter

[Api Documentation](https://dev.twitter.com/rest/reference/post/statuses/update)

Obtain permanent Access Token: https://dev.twitter.com/oauth/overview/application-owner-access-tokens

### Pinterest

[Api Documentation](https://developers.pinterest.com/docs/api/pins/)

How to get an access token:
- [Create Developer Account here](https://developers.pinterest.com)
- Create App and get app_id & app_secret from app details page
- [Issue new token](https://developers.pinterest.com/tools/access_token/)

### Instagram

[Hacky api endpoint](http://stackoverflow.com/a/26186389)

### Google+

[API Documentation](https://developers.google.com/+/domains/api/activities/insert)