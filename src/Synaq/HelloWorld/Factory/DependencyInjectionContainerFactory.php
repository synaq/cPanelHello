<?php
/**
 * Created by PhpStorm.
 * User: willemv
 * Date: 2017/06/28
 * Time: 09:11
 */

namespace Synaq\HelloWorld\Factory;


use Dice\Dice;

class DependencyInjectionContainerFactory
{
    public function create()
    {
        return new Dice();
    }
}