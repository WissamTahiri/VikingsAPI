<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/weapon.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/server.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/weapon/service.php';

if (!methodIsAllowed('patch')) {
    returnError(405, 'Method not allowed');
}

if (!isset($_GET['id'])) {
    returnError(400, 'Missing parameter : id');
}

$data = getBody();

if (!validateMandatoryParams($data, ['type', 'damage'])) {
    returnError(412, 'Mandatory parameters : type, damage');
}

verifyWeapon($data);

$updated = updateWeapon($_GET['id'], $data['type'], intval($data['damage']));
if ($updated == 1) {
    returnSuccess(204);
} elseif ($updated == 0) {
    returnError(404, 'Weapon not found');
} else {
    returnError(500, 'Could not update the weapon');
}
