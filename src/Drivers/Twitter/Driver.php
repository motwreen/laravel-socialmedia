<?php
namespace Motwreen\Socialmedia\Drivers\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use Motwreen\Socialmedia\Contracts\DriverInterface;

/**
 * Class FacebookDriver
 * @package Motwreen\Socialmedia\Drivers\Twitter
 */
class Driver implements DriverInterface
{
    /**
     * @var string
     */
    public $consumerKey;
    /**
     * @var string
     */
    public $consumerSecret;
    /**
     * @var string
     */
    public $accessToken;
    /**
     * @var string
     */
    public $accessTokenSecret;
    /**
     * @var Twitter
     */
    public $twitter;

    /**
     * Driver constructor.
     * @param bool $consumerKey
     * @param bool $consumerSecret
     * @param bool $accesstoken
     * @param bool $accessTokenSecret
     */
    public function __construct($consumerKey = false, $consumerSecret = false, $accesstoken = false, $accessTokenSecret = false)
    {
        $this->consumerKey = $consumerKey ?: loadOption('TWITTER_CONSUMER_KEY');
        $this->consumerSecret = $consumerSecret ?: loadOption('TWITTER_CONSUMER_SECRET');
        $this->accessToken = $accesstoken ?: loadOption('TWITTER_ACCESS_TOKEN');
        $this->accessTokenSecret = $accessTokenSecret ?: loadOption('TWITTER_ACCESS_TOKEN_SECRET');

        $this->twitter = new TwitterOAuth($this->consumerKey,$this->consumerSecret,$this->accessToken,$this->accessTokenSecret);
    }

    /**
     * @param $params
     * @return string
     */
    public function post($params)
    {
        $post = new Post($this->twitter,$params);
        return $post->exec();
    }

    public function delete($id)
    {
        $post = Post::withId($this->twitter,$id);
        return $post->delete();
    }
}