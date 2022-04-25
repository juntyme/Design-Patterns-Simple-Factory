<?php
class CarFactory
{
    public static function make(string $class): CarFactoryInterface /// assinatura
    {
        $className = ucfirst($class);

        /// Verificar se a classe existe
        if (!class_exists($className)) {
            throw new Exception("A classe {$className} não exite.");
        }

        // se existe instancia
        $class = new $className;

        // vericiar se a classe é do tipo CarFactoryInterface
        if (!$class instanceof CarFactoryInterface) {
            throw new Exception("A classe {$className} não é do tipo CarFactoryInterface");
        }

        return $class;

        // switch ($type) {
        //     case 'fusca':
        //         return new Fusca;
        //         break;
        //     case 'chevette':
        //         return new Fusca;
        //         break;
        //     case 'corcel':
        //         return new Fusca;
        //         break;
        //     default:
        //         throw new Exception("Classe do tipo {$type} não existe");
        // }
    }
}

interface CarFactoryInterface
{
    public function drive();
}

class fusca implements CarFactoryInterface
{
    public function drive()
    {
        return 'drive fusca';
    }
}
class chevette implements CarFactoryInterface
{
    public function drive()
    {
        return 'drive chevette';
    }
}
class corcel implements CarFactoryInterface
{
    public function drive()
    {
        return 'drive corcel';
    }
}

$carInstance = CarFactory::make('chevette');

var_dump($carInstance->drive());
