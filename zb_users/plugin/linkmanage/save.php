<?php

require '../../../zb_system/function/c_system_base.php';
require '../../../zb_system/function/c_system_admin.php';
$zbp->Load();
$action = 'root';
if (!$zbp->CheckRights($action)) {
    $zbp->ShowError(6);
    die();
}
if (!$zbp->CheckPlugin('linkmanage')) {
    $zbp->ShowError(48);
    die();
}

switch (GetVars('type', 'GET')) {
    case 'sort':
        linkmanage_saveNav();
        break;
    case 'del_link':
        linkmanage_deleteLink(GetVars('id', 'POST'),GetVars('menuid', 'POST'));
        break;
    case 'save_link':
        linkmanage_saveLink();
        break;
    case 'creat_link':
        linkmanage_creatLink();
        break;
    default:
        # code...
        break;
}
