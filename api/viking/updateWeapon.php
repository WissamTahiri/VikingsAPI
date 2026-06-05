<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/viking.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/weapon.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/server.php';

if (!methodIsAllowed('patch')) {
    returnError(405, 'Method not allowed');
}

if (!isset($_GET['id'])) {
    returnError(400, 'Missing parameter : id');
}

$id = intval($_GET['id']);
$data = getBody();

if (!array_key_exists('weaponId', $data)) {
    returnError(412, 'Mandatory parameter : weaponId');
}

$viking = findOneViking($id);
if (!$viking) {
    returnError(404, 'Viking not found');
}

$weaponId = null;
if ($data['weaponId'] !== null) {
    $weapon = findOneWeapon($data['weaponId']);
    if (!$weapon) {
        returnError(404, 'Weapon not found');
    }
    $weaponId = intval($data['weaponId']);
}

$updated = updateVikingWeapon($id, $weaponId);
if ($updated !== null) {
    returnSuccess(204);
} else {
    returnError(500, 'Could not update the viking weapon');
}
