<?php


namespace Core;


class Redirect
{

    /**
     * Redirect to a certain page with warning.
     * @param string $warning
     * @param string $redirectPage
     */
    public static function withWarning(string $warning, string $redirectPage) {
        $_SESSION['warning'] = $warning;
        header("Location: " . $redirectPage);
    }

}