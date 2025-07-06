<?php
// echo "hi on me";

ini_set('session.gc_maxlifetime', 2592000); // 30 * 24 * 60 * 60
session_set_cookie_params(2592000);
session_start();

$_SESSION['username'] = "11111";
$_SESSION['password'] = "11111";

echo "success";

header("Location: https://se.ifmo.ru/~s338930/genealogy/trees/tree.php?uuid=c6cacbb9-2e54-4606-8380-73fcabbb6b99&screen=list&root=7");