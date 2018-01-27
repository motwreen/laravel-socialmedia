<?php
namespace Motwreen\Socialmedia\Drivers\Facebook;
use Facebook\Facebook;
use Facebook\FacebookRequest;
use Motwreen\Socialmedia\Contracts\DriverInterface;

/**
 * Class FacebookDriver
 * @package Motwreen\Socialmedia\Drivers\Facebook
 */
class Driver implements DriverInterface
{
    /**
     * @var string
     */
    public $app_id;
    /**
     * @var string
     */
    public $app_secret;
    /**
     * @var string
     */
    public $default_graph_version = 'v2.11';
    /**
     * @var string
     */
    public $default_access_token;
    /**
     * @var Facebook
     */
    public $fb;

    /**
     * FacebookDriver constructor.
     * @param bool $app_id
     * @param bool $app_secret
     * @param string $default_graph_version
     * @param bool $default_access_token
     */

    public function buildConfig(array $config,$access_token)
    {
        $this->app_id                = $config['app_id'] ?: env('FACEBOOK_APP_ID');
        $this->app_secret            = $config['app_secret'] ?: env('FACEBOOK_APP_SECRET');
        $this->default_graph_version = "v2.11";
        $this->default_access_token  = $access_token ?: null;
        $this->fb = new Facebook(array_filter([
            'app_id'                =>  $this->app_id,
            'app_secret'            =>  $this->app_secret,
            'default_graph_version' =>  $this->default_graph_version,
            'default_access_token'  => $this->default_access_token
        ]));
        
    }

    public function post($params,$access_token)
    {
        $this->buildConfig()
        $post = new Post($this->fb,$params);
        return $post->exec();
    }

    public function delete($id)
    {
        $post = Post::withId($this->fb,$id);
        $post->delete();
    }
}