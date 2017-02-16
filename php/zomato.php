<?php

/**
 * Created by PhpStorm.
 * User: Xiao
 * Date: 14/04/2016
 * Time: 8:32 PM
 * Function: Get information from zomato API
 */
class zomato
{
    var $endpoint = 'https://developers.zomato.com/api/v2.1/';
    //change the token for your personel use
    var $token = 'c31173bf9d57bbc6aeee69445019a82f';

    function __construct($oauth_token) {
        $this->token = $oauth_token;
    }

    function __call($method, $args) {
        // Get the URI we need.
        $uri = $this->build_uri($method, $args);
        // Construct the full URL.
        $request_url = $this->endpoint . $uri;
        // This array is used to authenticate our request.
        $options = array(
            'http' => array(
                'method' => 'GET',
                'header'=> "user-key: " . $this->token
            )
        );
        // Call the URL and get the data.
        $resp = file_get_contents($request_url, false, stream_context_create($options));
        // Return it as arrays/objects.
        return (array) json_decode($resp);
    }

    function build_uri($method, $args) {
        $url = $args[0];
        $query = $args[1];

        if (array_key_exists('id', $query)){
            return $url. '/'. $query['id'];
        }
        else {
            $getdata = http_build_query($query['data']);
        }
        $uri = $url. '?'. $getdata;
        return $uri;
    }
}

?>