<?php
App::uses('FormAuthenticate', 'Controller/Component/Auth', 'CustomPasswordHasher');

class CustomAuthenticate extends FormAuthenticate {
    
    protected function _password($password) {
        return self::hash($password);
    }

    public static function hash($password) {
        $passwordHasher = new CustomPasswordHasher();
        return $passwordHasher->hash($password);
    }

}