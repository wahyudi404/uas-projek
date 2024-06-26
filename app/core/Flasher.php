<?php

class Flasher {
    public static function setFlash($message, $type)
    {
        $_SESSION['flash'] = [
            'message' => $message,
            'type' => $type
        ];
    }

    public static function flash()
    {
        if(isset($_SESSION['flash'])) {
            echo '
            <div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
                ' . $_SESSION['flash']['message'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';

            unset($_SESSION['flash']);
        }
    }

    public static function flash4()
    {
        if(isset($_SESSION['flash'])) {
            echo '
            <div class="alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
                ' . $_SESSION['flash']['message'] . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>';

            unset($_SESSION['flash']);
        }
    }
}