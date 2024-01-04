<?php

namespace App\Service;

class Token {
    public function decode($authorizationHeader): string {

        $tokenParts = explode(' ', $authorizationHeader);
        if (count($tokenParts) === 2 && $tokenParts[0] === 'Bearer') {
            $token = $tokenParts[1];
        }

        $tokenParts = explode(".", $token);  
        $tokenPayload = base64_decode($tokenParts[1]);
        $jwtPayload = json_decode($tokenPayload);

        return $jwtPayload->username;

    }
}