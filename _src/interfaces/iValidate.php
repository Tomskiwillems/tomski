<?php

namespace tomski\_src\interfaces;

interface iValidate
{
    public function validate(array $postresult, array $response): array|false;
}