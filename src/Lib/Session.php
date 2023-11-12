<?php

namespace XC2S\Lib;

use XC2S\Configuration\WebsiteConfiguration;
use Exception;

class Session
{
    private static ?Session $instance = null;

    /**
     * @throws Exception
     */
    private function __construct()
    {
        if (session_start() === false) {
            throw new Exception("The session couldn't start.");
        }
    }

    public static function getInstance(): Session
    {
        if (is_null(Session::$instance))
            Session::$instance = new Session();

        self::checkLastActivity();
        return Session::$instance;
    }


    // ---- CRUD ----
    public function register(string $key, mixed $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function read(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    public function delete($key): void
    {
        unset($_SESSION[$key]);
    }

    public function contains($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function destroy(): void
    {
        session_unset();     // unset $_SESSION variable for the run-time
        session_destroy();   // destroy session data in storage
        Cookie::delete(session_name()); // deletes the session cookie
        // Il faudra reconstruire la session au prochain appel de getInstance()
        self::$instance = null;
    }

    private static function checkLastActivity(): void
    {
        if (isset($_SESSION['lastActivity']) && (time() - $_SESSION['lastActivity'] > WebsiteConfiguration::sessionUpTime))
            session_unset();     // unset $_SESSION variable for the run-time

        $_SESSION['lastActivity'] = time(); // update last activity time stamp
    }
}
