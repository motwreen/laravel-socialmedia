#laravel-socialmedia

[![Build Status](https://travis-ci.org/motwreen/laravel-socialmedia.svg?branch=master)](https://travis-ci.org/Motwreen/laravel-socialmedia)
[![MIT License](https://img.shields.io/packagist/l/motwreen/laravel-socialmedia.svg?style=flat-square)](https://packagist.org/packages/motwreen/laravel-socialmedia)

The first step will be to implement a post function for each Driver and on this way a matching delete function for testing reasons.


## Install
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
Socialmedia::post($params,$drivers=[]);
```

## Drivers

Socialmedia Network Drivers, in the process I would like to craft somekind of unified api for all of them

### Facebook

[Api Documentation](https://developers.facebook.com/docs/graph-api/reference/v2.7/post)

Obtain permanent Access Token: http://stackoverflow.com/a/28418469
#### Settings
##### ENV Variables
 - FACEBOOK_APP_ID
 - FACEBOOK_APP_SECRET
 - FACEBOOK_ACCESS_TOKEN

### Twitter

[Api Documentation](https://dev.twitter.com/rest/reference/post/statuses/update)

Obtain permanent Access Token: https://dev.twitter.com/oauth/overview/application-owner-access-tokens

#### Settings
##### ENV Variables
 - TWITTER_ACCESS_TOKEN
 - TWITTER_ACCESS_TOKEN_SECRET
 - TWITTER_CONSUMER_KEY
 - TWITTER_CONSUMER_SECRET

### Pinterest

[Api Documentation](https://developers.pinterest.com/docs/api/pins/)

How to get an access token:
- [Create Developer Account here](https://developers.pinterest.com)
- Create App and get app_id & app_secret from app details page
- [Issue new token](https://developers.pinterest.com/tools/access_token/)

#### Settings
##### ENV Variables
- PINTEREST_APP_ID
- PINTEREST_APP_SECRET
- PINTEREST_ACCESS_TOKEN

### Instagram

[Hacky api endpoint](http://stackoverflow.com/a/26186389)

### Google+

[API Documentation](https://developers.google.com/+/domains/api/activities/insert)