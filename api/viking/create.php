<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/viking.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/weapon.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/server.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/viking/service.php';

if (!methodIsAllowed('create')) {
    returnError(405, 'Method not allowed');
}

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

$newVikingId = createViking($data['name'], intval($data['health']), intval($data['attack']), intval($data['defense']), $weaponId);
if (!$newVikingId) {
    returnError(500, 'Could not create the viking');
}
returnSuccess(201, ['id' => $newVikingId]);
