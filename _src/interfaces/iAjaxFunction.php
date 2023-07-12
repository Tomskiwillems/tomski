<?php

namespace tomski\_src\interfaces;

interface iAjaxFunction
{
    public function execute(array $urlparams): bool;
}