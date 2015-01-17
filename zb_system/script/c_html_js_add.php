<?php
/**
 * Z-Blog with PHP
 * @author
 * @copyright (C) RainbowSoft Studio
 * @version 2.0 2013-06-14
 */
require '../function/c_system_base.php';

$zbp->Verify();

ob_clean();

header('Content-Type: application/x-javascript; charset=utf-8');
?>
var bloghost = "<?php echo $zbp->host; ?>";
var cookiespath = "<?php echo $zbp->cookiespath; ?>";
var ajaxurl = "<?php echo $zbp->ajaxurl; ?>";
var lang_comment_name_error = "<?php echo $lang['error']['72']; ?>";
var lang_comment_email_error = "<?php echo $lang['error']['29']; ?>";
var lang_comment_content_error = "<?php echo $lang['error']['46']; ?>";

<?php
echo '$(function () {';
echo 'var $cpLogin = $(".cp-login").find("a");';
echo 'var $cpVrs = $(".cp-vrs").find("a");';

if ($zbp->CheckRights('admin')){
	echo '$(".cp-hello").html("' . $zbp->lang['msg']['welcome'] . ' ' . $zbp->user->Name .  ' ('  . $zbp->user->LevelName  . ')");';
	
	echo 'if ($cpLogin.length == 1 && $cpLogin.html().indexOf("[") > -1) { ';
	echo '$cpLogin.html("[' . $zbp->lang['msg']['admin'] . ']");';
	echo '} else {';
	echo '$cpLogin.html("' . $zbp->lang['msg']['admin'] . '");';
	echo '};';
}

if ($zbp->CheckRights('ArticleEdt')){
	echo 'if ($cpLogin.length == 1 && $cpVrs.html().indexOf("[") > -1) {';
	echo '$cpVrs.html("[' . $zbp->lang['msg']['new_article'] . ']"); ';
	echo '} else {';
	echo '$cpVrs.html("' . $zbp->lang['msg']['new_article'] . '");';
	echo '};';
	echo '$cpVrs.attr("href", "' . $zbp->host . 'zb_system/cmd.php?act=ArticleEdt");';
}

	echo 'SetCookie("timezone", (new Date().getTimezoneOffset()/60)*(-1));';

if ($zbp->user->ID==0){
	echo 'LoadRememberInfo();';
}

echo '});' . "\r\n";

foreach ($GLOBALS['Filter_Plugin_Html_Js_Add'] as $fpname => &$fpsignal) {$fpname();}

die();

?>