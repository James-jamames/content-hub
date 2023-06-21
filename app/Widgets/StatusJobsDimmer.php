<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use Mockery\Undefined;

class StatusJobsDimmer extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    public function run()
    {
        $json = json_decode(file_get_contents("http://download.lapig.iesa.ufg.br/status/jobs"));
        return view('widgets.status_jobs_dimmer', array_merge($this->config, [
            'done'   => "$json->done",
            'failed'   => "$json->failed",
            'mean_running_minutes'   => "$json->mean_running_minutes",
            'max_running_minutes'   => "$json->max_running_minutes",
            'min_running_minutes'   => "$json->min_running_minutes",
        ]));
    }

    public function shouldBeDisplayed()
    {
        return true;
    }
}
