<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\Interfaces;

interface Query
{

    /**
     * @return string
     */
    public function getQueryString(): string;
}
