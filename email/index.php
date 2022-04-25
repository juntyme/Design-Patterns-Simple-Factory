<?php

interface EmailFactoryInterface
{
    public function send(string $email, string $password);
}

class EmailFactory
{

    public static function make(string $type): EmailFactoryInterface
    {
        switch ($type) {
            case 'google':
                $google = new GoogleService();
                $google->api('ds456465');
                return $google;
                break;
            case 'yahoo':
                $yahoo = new YahooService();
                $yahoo->api('ds456465');
                return $yahoo;
                break;
            default:
                throw new Exception("classe do tipo {$type} não existe.");
        }
    }
}


class GoogleService implements EmailFactoryInterface
{
    public function api($api)
    {
        ////
    }

    public function send(string $email, string $password)
    {
        return 'Enviar email com o Google Service';
    }
}
class YahooService implements EmailFactoryInterface
{
    public function api($api)
    {
        ////
    }

    public function send(string $email, string $password)
    {
        return 'Envia email com o Yahoo Service';
    }
}


$emailInstance = EmailFactory::make('google');
var_dump($emailInstance->send('email@email.com.br', '123'));
