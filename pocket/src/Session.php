<?php

namespace Yaserzare\PocketCore;

class Session
{
    protected const FLASH_KEY = '_flash_messages';
    public function __construct()
    {
        session_start();

        $_SESSION[self::FLASH_KEY] = array_map(function ($flashMessage){
            $flashMessage['remove'] = true;
            return $flashMessage;
    }, $_SESSION[self::FLASH_KEY] ?? []);
    }

    public function set(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key, mixed $default = null): mixed
    {
        return $_SESSION[$key] ?? $default;
    }

    public function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public function flash(string $key, mixed $message = null): mixed
    {
        if($message)
        {
            $_SESSION[self::FLASH_KEY][$key] = [
                'remove' => false,
                'value' => $message
            ];
        }

        return $_SESSION[self::FLASH_KEY][$key]['value'] ?? null;
    }

    public function __destruct()
    {
        $this->removeFlashMessages();
    }

    protected function removeFlashMessages(): void
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        $_SESSION[self::FLASH_KEY] = array_filter($flashMessages, fn($flashMessage) => !$flashMessage['remove']);

    }

}