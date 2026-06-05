<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/server.php';

function verifyWeapon(array $data): bool {
    $type = trim($data['type']);
    if (strlen($type) < 2) {
        returnError(412, 'Type must be at least 2 characters long');
    }

    $damage = intval($data['damage']);
    if ($damage < 1) {
        returnError(412, 'Damage must be a positive and non zero number');
    }
    return true;
}
