<?php
class Auth {
    public static function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }

    public static function logout() {
        session_start();
        session_unset();
        session_destroy();
    }

    public static function redirectIfNotLoggedIn() {
        if (!self::isLoggedIn()) {
            header("Location: Signin.html");
            exit;
        }
    }
}
?>
