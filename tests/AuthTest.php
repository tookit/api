<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/2/2016
 * Time: 12:27 PM
 */

class AuthTest extends TestCase{


    protected $baseUrl = 'http://local.api.dev';

    protected $token ;



    protected function getToken()
    {
        $this->post('auth/login',['email'=>'wangqiangshen@gmail.com','password'=>'`7493064']);
        $this->assertEquals($this->response->getStatusCode(),200);
        return json_decode($this->response->getContent())->success->token;
    }

    public function testLogin(){

        $this->post('auth/login',['email'=>'wangqiangshen@gmail.com','password'=>'`7493064']);
        $this->assertEquals($this->response->getStatusCode(),200);
        dd(Cache::get('token'));
        $this->token = json_decode($this->response->getContent())->success->token;

    }

    public function test_view_user()
    {

    }


}