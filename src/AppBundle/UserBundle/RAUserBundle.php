<?php
namespace AppBundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RAUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}