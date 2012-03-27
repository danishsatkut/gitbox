<?php

/**
 * Defines a behavior for all the component actions to require login
 *
 * @author Danish Satkut
 */
class RequireLogin extends CBehavior {
    public function attach($owner) {
        // Attach the event to the owner
        $owner->onBeginRequest = array($this, 'handleBeginRequest');
    }
    
    public function handleBeginRequest($event) {
        $app = Yii::app();
        $user = $app->user;
        $requestUri = $app->request->requestUri;
        
        
        $requestUrl = trim($app->urlManager->parseUrl($app->request),'/');
        $loginUrl = trim($user->loginUrl[0],'/');
        $registerUrl = trim('site/register','/');
        
        // publicly accessible pages
        $allowedUrl = array($loginUrl, $registerUrl);
        
        if($user->isGuest && !in_array($requestUrl, $allowedUrl)) {
            $user->loginRequired();
        }
    }
}

?>
