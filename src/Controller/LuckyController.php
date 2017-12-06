<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

/**
 * Class LuckyController
 *
 * @package App
 */
class LuckyController
{

    /**
     * @return Response
     */
    public function index()
    {
        $number = mt_rand(0, 1000);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

    /**
     * @return Response
     */
    public function number()
    {
        $number = mt_rand(0, 100);

        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }

}