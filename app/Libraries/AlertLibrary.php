<?php

namespace App\Libraries;

/**
 * AlertLibrary - nastavuje alertové zprávy do session flashdata
 */
class AlertLibrary
{
    /**
     * Nastaví alertovou zprávu do session.
     * @param string $type Typ alertu (např. 'success', 'danger')
     * @param string $message Zpráva pro uživatele
     * @return void
     */
    public static function setAlert(string $type, string $message): void
    {
        session()->setFlashdata('alert', [
            'type' => $type,
            'message' => $message,
        ]);
    }
}