<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/dao/viking.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/api/utils/server.php';

if (!methodIsAllowed('read')) {
    returnError(405, 'Method not allowed');
}

if (!isset($_GET['id'])) {
    returnError(400, 'Missing parameter : id');
}

$viking = findOneViking($_GET['id']);
if (!$viking) {
    returnError(404, 'Viking not found');
}
returnSuccess(200, $viking);
