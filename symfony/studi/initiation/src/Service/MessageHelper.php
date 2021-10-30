<?php

namespace App\Service;

use Symfony\Component\Routing\RouterInterface;

class MessageHelper
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public function addUrlsToMessages(array $messages): array
    {
        $messageWithUrls = [];
        foreach ($messages as $index => $message) {
            $messageWithUrls[] = [
                'text' => $message,
                'url' => $this->router->generate('app_message_showmessage', ['id' => $index]),
            ];
        }
        return $messageWithUrls;
    }
}
