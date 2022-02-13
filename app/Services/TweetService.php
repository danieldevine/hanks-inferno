<?php

namespace App\Services;

use Coderjerk\BirdElephant\BirdElephant;
use Coderjerk\BirdElephant\Compose\Media;
use Coderjerk\BirdElephant\Compose\Tweet;

class TweetService
{

    public function credentials()
    {
        return array(
            'bearer_token' => $_ENV['TWITTER_BEARER_TOKEN'],
            'consumer_key' => $_ENV['TWITTER_API_KEY'],
            'consumer_secret' => $_ENV['TWITTER_SECRET'],
            'token_identifier' => $_ENV['TWITTER_ACCESS_TOKEN'],
            'token_secret' => $_ENV['TWITTER_ACCESS_TOKEN_SECRET'],
        );
    }
    /**
     * Uploads generated image to Twitter, retrieves
     * the media id then tweets it out.
     *
     * @param string $img
     * @return void
     */
    public function sendImageTweet($img)
    {
        $twitter = new BirdElephant($this->credentials);
        $image = $twitter->tweets()->upload($img);
        $media = (new Media)->mediaIds([$image->media_id_string]);
        $tweet = (new Tweet)->media($media);
        $twitter->tweets()->tweet($tweet);
    }

    public function sendTextTweet($verse)
    {
        $twitter = new BirdElephant($this->credentials);
        $tweet = (new Tweet)->text($verse);
        $twitter->tweets()->tweet($tweet);
    }
}
