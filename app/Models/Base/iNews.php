<?php


namespace App\Models\Base;


use Carbon\Carbon;

interface iNews
{
    const ACTIVE = 1;
    const NOT_ACTIVE = 0;

    public function getActiveFrom(): Carbon;

}
