<?php

namespace Thunderlabid\PACKAGE_NAME\BLL\Events\MODEL_NAME;

/*===============================
=            LARAVEL            =
===============================*/
use Illuminate\Queue\SerializesModels;
/*=====  End of LARAVEL  ======*/

/*=============================
=            MODEL            =
=============================*/
use Thunderlabid\PACKAGE_NAME\DAL\Models\MODEL_NAME as Model;
/*=====  End of MODEL  ======*/

abstract class Base
{
    use SerializesModels;

    protected $data;
    public $attr;
    public $when;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Model $data = null, &$attr = null)
    {
        $this->data = $data;
        $this->attr = &$attr;
        $this->when = \Carbon\Carbon::now();
    }

    public function __get($x)
    {
        if ( $x == 'data' ) return $this->data;
        if ( $x == 'attr' ) return $this->attr;
        if ( $x == 'when' ) return $this->when;
    }
}