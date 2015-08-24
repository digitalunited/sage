<?php
namespace Component;

class Video extends \DigitalUnited\Components\VcComponent
{
    const YT_API_KEY = 'AIzaSyDG2xiol3Ng2LxucQHIXuSTLmwNVVYr5_o';

    protected $id;
    protected $source;

    protected function getDefaultParams()
    {
        $params = parent::getDefaultParams();
        $params['image'] = '';

        return $params;
    }

    protected function getComponentConfig()
    {
        return [
            'name' => 'Video (YouTube eller Vimeo)',
            'description' => '',
            'params' => [
                [
                    'type' => 'textfield',
                    'holder' => 'div',
                    'class' => '',
                    'heading' => __('component.Video.heading.videourl', 'components'),
                    'param_name' => 'videourl',
                    'value' => '',
                    'description' => '',
                ]
            ],
            'icon' => 'icon-wpb-film-youtube',
        ];
    }

    protected function sanetizeDataForRendering($data)
    {
        $this->source = $this->getSource();
        $this->id = $this->parseVideoId();
        return $data;
    }


    protected function getSource()
    {
        $url = $this->param('videourl');
        if (preg_match('/youtu\.{0,1}be/', $url)) {
            return 'youtube';
        } elseif (preg_match('/vimeo/', $url)) {
            return 'vimeo';
        } else {
            return false;
        }
    }

    protected function parseVideoId()
    {
        if ($this->source == 'youtube') {
            $parsedUrl = parse_url($this->param('videourl'));
            if (isset($parsedUrl['query'])) {
                parse_str($parsedUrl['query'], $queryArgs);
                return isset($queryArgs['v']) ? $queryArgs['v'] : false;
            } else {
                preg_match('/\/([^\/]+)$/', $parsedUrl['path'], $matches);
                return $matches[1];
            }
        } elseif ($this->source == 'vimeo') {
            if (preg_match('|/(\d{4,})|', $this->param('videourl'), $matches)) {
                return $matches[1];
            }
        }
        return false;
    }

    public function getStaticImage()
    {
        if (!$this->id) {
            return false;
        }

        if ($this->param('image')) {
            return $this->param('image');
        }

        $cache = wp_cache_get($this->id, $this->source);
        if ($cache) {
            return $cache;
        }

        $return = false;
        if ($this->source == 'youtube') {
            $return = $this->getStaticYouTubeImage();
        } elseif ($this->source == 'vimeo') {
            $return = $this->getStaticVimeoImage();
        }

        wp_cache_set($this->id, $return, $this->source);
        return $return;
    }

    private function getStaticYouTubeImage()
    {
        $url = "https://www.googleapis.com/youtube/v3/videos?id={$this->id}&key=".self::YT_API_KEY.'&part=snippet';
        $res = json_decode(file_get_contents($url));
        if (is_object($res)) {
            $thumbs = (array)$res->items[0]->snippet->thumbnails;
            $highestAvailable = array_pop($thumbs);
            return $highestAvailable->url;
        }
    }

    private function getStaticVimeoImage()
    {
        $url = "http://vimeo.com/api/v2/video/{$this->id}.php";
        $apireturn = unserialize(file_get_contents($url));
        return $apireturn[0]['thumbnail_large'];
    }

    public function getEmbedUrl()
    {
        if ($this->source == 'youtube') {
            return 'http://www.youtube.com/embed/'.$this->id
                . '?hd=1&autohide=1&modestbranding=1&border=0&wmode=transparent&rel=0';
        } elseif ($this->source == 'vimeo') {
            return 'http://player.vimeo.com/video/'.$this->id;
        } else {
            return false;
        }
    }
}
