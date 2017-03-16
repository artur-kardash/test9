<?php
/*
Plugin Name: Val15sear
Plugin URI: https://site.mcc
Description: Test.
Author: Valentin Shykhman
Version: 1.0
*/

add_action( 'admin_init', 'options_init' );

function options_init(){
register_setting( 'serch35', 'somekey');
}

add_action('admin_menu', 'test_menu');

function test_menu() {
add_menu_page('Search console', 'Search console', 10, 'testsear', 'sconsole');
}

add_action('init', 'valentin_init_session', 1);
 
if ( !function_exists('valentin_init_session')):
    function valentin_init_session()
    {
        session_start();
    }
endif;

function sconsole() {
if ($_GET['outt']) {unset($_SESSION['token']);}
?>
<style>
 .mybutton {
	 display:block;
	 width:150px;
	 height:40px;
	 text-align:center;
	 background-color:blue;
	 color:#fff !important;
	 text-decoration:none !important;
	 padding-top:13px;
 }
</style>
<h2>Enter client_id and client_secret to make the plugin to work</h2>
<form method="post" action="options.php">
<?php settings_fields( 'serch35' ); ?>
<?php $options = get_option( 'somekey' ); ?>
<table width="600" border="0">
<tr>
<td>Client_id:</td>
<td><input name="somekey[id]" id="somekey[id]" value="<?php echo $options['id'];?>"></td>
</tr>
<tr>
<td>Client_secret:</td>
<td><input name="somekey[secret]" id="somekey[secret]" value="<?php echo $options['secret'];?>"></td>
</tr>
<tr>
<td colspan="2">You have to type this redirect uri in your 'allowed uri redirects' section of google api dispatcher to make this plugin to work = <?php echo  empty($_SERVER['HTTPS'])?'http://':'https://';
 echo $_SERVER['HTTP_HOST'] . '/wp-admin/admin.php?page=testsear'; ?></td>
</tr>
<tr><td colspan="2"><input type="submit" value="Apply" /></td></tr>
</table>
<br />
<hr />
<?php
 $redir = empty($_SERVER['HTTPS'])?'http://':'https://';
 $redir .= $_SERVER['HTTP_HOST'];
 $redir .= '/wp-admin/admin.php?page=testsear';
 if ($options['id'] !='' && $options['secret'] != '' && !$_SESSION['token'] && !$_GET['code']) {
 ?> 
 <a href="https://accounts.google.com/o/oauth2/auth?redirect_uri=<?php echo $redir; ?>&response_type=code&client_id=<?php echo $options['id'];?>&scope=https://www.googleapis.com/auth/webmasters" class="mybutton">ENTER</a>
 <?php } 
if($_GET['code'] && !isset($_SESSION['token'])) {
$url = 'https://accounts.google.com/o/oauth2/token';
$params = array(
    'code' => $_GET['code'], 
    'client_id' => '243658362381-618lbbs0a5ct0k9rsf627monmtknju79.apps.googleusercontent.com', 
	'client_secret' => $options['secret'],
	'redirect_uri' => $redir,
	'grant_type' => 'authorization_code'	
);
$result = file_get_contents($url, false, stream_context_create(array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($params)
    )
)));
$result = json_decode($result);
/*echo '<hr /><pre>';
print_r($_SESSION);
echo '</pre><hr />';*/
}
if ($result) {
	$_SESSION['token'] = $result->access_token;
}
if ($_SESSION['token']) {
    $r = file_get_contents("https://www.googleapis.com/webmasters/v3/sites?fields=siteEntry&access_token={$_SESSION['token']}");
	$r = json_decode($r);
	echo '<h2>List</h2>';
	foreach ($r->siteEntry as $var) {
		echo $var->siteUrl . '<br />';
	}
    echo '<a href="/wp-admin/admin.php?page=testsear&outt=out">OUT</a>';
}



} 



<?php
/*
Plugin Name: Val15sear
Plugin URI: https://site.mcc
Description: Test.
Author: Valentin Shykhman
Version: 1.0
*/

add_action( 'admin_init', 'options_init' );

function options_init(){
register_setting( 'serch35', 'somekey');
}

add_action('admin_menu', 'test_menu');

function test_menu() {
add_menu_page('Search console', 'Search console', 10, 'testsear', 'sconsole');
}

add_action('init', 'valentin_init_session', 1);
 
if ( !function_exists('valentin_init_session')):
    function valentin_init_session()
    {
        session_start();
    }
endif;

function sconsole() {
if ($_GET['outt']) {unset($_SESSION['token']);}
?>
<style>
 .mybutton {
	 display:block;
	 width:150px;
	 height:40px;
	 text-align:center;
	 background-color:blue;
	 color:#fff !important;
	 text-decoration:none !important;
	 padding-top:13px;
 }
</style>
<h2>Enter client_id and client_secret to make the plugin to work</h2>
<form method="post" action="options.php">
<?php settings_fields( 'serch35' ); ?>
<?php $options = get_option( 'somekey' ); ?>
<table width="600" border="0">
<tr>
<td>Client_id:</td>
<td><input name="somekey[id]" id="somekey[id]" value="<?php echo $options['id'];?>"></td>
</tr>
<tr>
<td>Client_secret:</td>
<td><input name="somekey[secret]" id="somekey[secret]" value="<?php echo $options['secret'];?>"></td>
</tr>
<tr>
<td colspan="2">You have to type this redirect uri in your 'allowed uri redirects' section of google api dispatcher to make this plugin to work = <?php echo  empty($_SERVER['HTTPS'])?'http://':'https://';
 echo $_SERVER['HTTP_HOST'] . '/wp-admin/admin.php?page=testsear'; ?></td>
</tr>
<tr><td colspan="2"><input type="submit" value="Apply" /></td></tr>
</table>
<br />
<hr />
<?php
 $redir = empty($_SERVER['HTTPS'])?'http://':'https://';
 $redir .= $_SERVER['HTTP_HOST'];
 $redir .= '/wp-admin/admin.php?page=testsear';
 if ($options['id'] !='' && $options['secret'] != '' && !$_SESSION['token'] && !$_GET['code']) {
 ?> 
 <a href="https://accounts.google.com/o/oauth2/auth?redirect_uri=<?php echo $redir; ?>&response_type=code&client_id=<?php echo $options['id'];?>&scope=https://www.googleapis.com/auth/webmasters" class="mybutton">ENTER</a>
 <?php } 
if($_GET['code'] && !isset($_SESSION['token'])) {
$url = 'https://accounts.google.com/o/oauth2/token';
$params = array(
    'code' => $_GET['code'], 
    'client_id' => '243658362381-618lbbs0a5ct0k9rsf627monmtknju79.apps.googleusercontent.com', 
	'client_secret' => $options['secret'],
	'redirect_uri' => $redir,
	'grant_type' => 'authorization_code'	
);
$result = file_get_contents($url, false, stream_context_create(array(
    'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => http_build_query($params)
    )
)));
$result = json_decode($result);
/*echo '<hr /><pre>';
print_r($_SESSION);
echo '</pre><hr />';*/
}
if ($result) {
	$_SESSION['token'] = $result->access_token;
}
if ($_SESSION['token']) {
    $r = file_get_contents("https://www.googleapis.com/webmasters/v3/sites?fields=siteEntry&access_token={$_SESSION['token']}");
	$r = json_decode($r);
	echo '<h2>List</h2>';
	foreach ($r->siteEntry as $var) {
		echo $var->siteUrl . '<br />';
	}
    echo '<a href="/wp-admin/admin.php?page=testsear&outt=out">OUT</a>';
}



} 