<?php
    session_start();
    require_once 'lib/Facebook/autoload.php'; // change path as needed

    $fb = new \Facebook\Facebook([
    'app_id' => '440304850195243',
    'app_secret' => '7acac7fa74fcfd94c40aa59b4305e5ca',
    'default_graph_version' => 'v3.2'
    ]);

    $helper = $fb->getRedirectLoginHelper();
    $permissions = ['email']; // Optional permissions

    try {
        if (isset($_SESSION['face_access_token'])) {
            $accessToken = $_SESSION['face_access_token'];
        } else {
            $accessToken = $helper->getAccessToken();
        }
    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }

    if (! isset($accessToken)) {
        $urlLogin = "http://localhost/Login%20-%20OAuth2.3/facebook.php";
        $loginUrl = $helper->getLoginUrl($urlLogin, $permissions);
    } else {
        $urlLogin = "http://localhost/Login%20-%20OAuth2.3/facebook.php";
        $loginUrl = $helper->getLoginUrl($urlLogin, $permissions);
        if (isset($_SESSION['face_access_token'])) {
            $fb->setDefaultAccessToken($_SESSION['face_access_token']);
        } else {
            $_SESSION['face_access_token'] = (string) $accessToken;
            $oAuth2Client = $fb->getOAuth2Client();
            $_SESSION['face_access_token'] = $oAuth2Client->getLongLivedAccessToken($_SESSION['face_access_token']);
            $fb->setDefaultAccessToken($_SESSION['face_access_token']);
        }

        try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me?fields=name, picture, email');
            $user = $response->getGraphUser();
            $result_user = "SELECT id, nome, email, administrador FROM usuarios WHERE email='".$user[email]."' LIMIT 1";
            $resulted_user = mysqli_query($conn, $result_user);
            if ($resulted_user) {
                $row_user = mysqli_fetch_assoc($resulted_user);
                $_SESSION['id'] = $row_user['id'];
                $_SESSION['nome'] = $row_user['name'];
                $_SESSION['email'] = $row_user['email'];
                $_SESSION['administrador'] = $row_user['administrador'];
                    
                if ($_SESSION['administrador'] == '1') {
                    header("Location: admin.php");
                } else {
                    header("Location: user.php");
                }   
            }
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            header("Location: user.php");
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
    }
?>