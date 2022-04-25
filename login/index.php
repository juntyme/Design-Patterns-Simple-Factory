<?php

interface LoginFactoryInterface
{
    public function logar(string $email, string $password);
}

class LoginFactory
{

    public static function make(string $type): LoginFactoryInterface
    {
        switch ($type) {
            case 'admin':
                return new Admin;
                break;
            case 'user':
                return new User;
                break;
            case 'funcionario':
                return new Funcionario;
                break;
            default:
                throw new Exception("classe do tipo {$type} não existe.");
        }
    }
}


class User implements LoginFactoryInterface
{
    public function logar(string $email, string $password)
    {
        return 'login como Usuario';
    }
}
class Admin implements LoginFactoryInterface
{
    public function logar(string $email, string $password)
    {
        return 'login como Admin';
    }
}
class Funcionario implements LoginFactoryInterface
{
    public function logar(string $email, string $password)
    {
        return 'login como Funcionario';
    }
}

$loginInstance = LoginFactory::make('admin');
var_dump($loginInstance->logar('email@email.com.br', '123'));
