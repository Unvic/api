<?php

namespace app\controller;

use Firebase\JWT\JWT;

class Token
{
    public function createJwt( $userId = 'zq' )
    {
        $key = md5( 'zq8876!@!' ); //jwt的签发密钥，验证token的时候需要用到
        $time = time(); //签发时间
        $expire = $time + 14400; //过期时间
        $token = array(
            "user_id" => $userId,
            "iss" => "http://www.najingquan.com/",//签发组织
            "aud" => "zhangqi", //签发作者
            "iat" => $time,
            "nbf" => $time,
            "exp" => $expire
        );
        return JWT::encode( $token, $key );
    }
}
