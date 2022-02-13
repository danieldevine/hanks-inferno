<?php

namespace App\Services;

use Coderjerk\BirdElephant\BirdElephant;
use Coderjerk\BirdElephant\Compose\Media;
use Coderjerk\BirdElephant\Compose\Tweet;

class TweetService
{
    public function sendTweet($img)
    {
        $credentials = array(
            'bearer_token' => $_ENV['TWITTER_BEARER_TOKEN'],
            'consumer_key' => $_ENV['TWITTER_API_KEY'],
            'consumer_secret' => $_ENV['TWITTER_SECRET'],
            'token_identifier' => $_ENV['TWITTER_ACCESS_TOKEN'],
            'token_secret' => $_ENV['TWITTER_ACCESS_TOKEN_SECRET'],
        );

        $twitter = new BirdElephant($credentials);

        $image = $twitter->tweets()->upload($img);

        // //pass the returned media id to a media object as an array
        $media = (new Media)->mediaIds(
            [
                $image->media_id_string
            ]
        );

        $tweet = (new Tweet)->text($media);

        $twitter->tweets()->tweet($tweet);
    }
}
