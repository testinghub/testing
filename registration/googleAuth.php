<?php
$client_id = '982231778523-t6eha4lnvu50k3voi2q59mfeee301dui.apps.googleusercontent.com'; // Client ID
$client_secret = 'thuI1fgXL4wO_aRWpv42S6sq'; // Client secret
$redirect_uri = 'http://localhost:8888'; // Redirect URIs
$url = 'https://accounts.google.com/o/oauth2/auth';

$params = array(
    'redirect_uri'  => $redirect_uri,
    'response_type' => 'code',
    'client_id'     => $client_id,
    'scope'         => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
);

echo $link = '<p><a href="' . $url . '?' . urldecode(http_build_query($params)) . '">Аутентификация через Google</a></p>';

if (isset($_GET['code'])) {
    $result = false;

$params = array(
    'client_id'     => $client_id,
    'client_secret' => $client_secret,
    'redirect_uri'  => $redirect_uri,
    'grant_type'    => 'authorization_code',
    'code'          => $_GET['code']
);

$url = 'https://accounts.google.com/o/oauth2/token';

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($curl);
curl_close($curl);
$tokenInfo = json_decode($result, true);

if (isset($tokenInfo['access_token'])) {
    $params['access_token'] = $tokenInfo['access_token'];

$userInfo = json_decode(file_get_contents('https://www.googleapis.com/oauth2/v1/userinfo' . '?' . urldecode(http_build_query($params))), true);
if (isset($userInfo['id'])) {
    $userInfo = $userInfo;
    $result = true;
    $_SESSION['name']=$userInfo['given_name'];
    }
}
}
echo '<pre>';
print_r($userInfo['picture']);
exit;
?>