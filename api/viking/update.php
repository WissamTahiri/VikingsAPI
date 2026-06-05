<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/viking.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/weapon.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/server.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/viking/service.php';

if (!methodIsAllowed('update')) {
    returnError(405, 'Method not allowed');
}

if (!isset($_GET['id'])) {
    returnError(400, 'Missing parameter : id');
}

$id = intval($_GET['id']);
$data = getBody();

if (!validateMandatoryParams($data, ['name', 'health', 'attack', 'defense'])) {
    returnError(412, 'Mandatory parameters : name, health, attack, defense');
}

verifyViking($data);

$weaponId = null;
if (isset($data['weaponId']) && $data['weaponId'] !== null) {
    $weapon = findOneWeapon($data['weaponId']);
    if (!$weapon) {
        returnError(404, 'Weapon not found');
    }
    $weaponId = intval($data['weaponId']);
}

$viking = findOneViking($id);
if (!$viking) {
    returnError(404, 'Viking not found');
}

updateViking($id, $data['name'], intval($data['health']), intval($data['attack']), intval($data['defense']), $weaponId);
returnSuccess(204);
