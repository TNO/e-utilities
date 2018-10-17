<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\Tests\Unit\ESearch;

use LarsNieuwenhuizen\EUtilities\AbstractBase;
use LarsNieuwenhuizen\EUtilities\Interfaces\EUtility;
use LarsNieuwenhuizen\EUtilities\Interfaces\Query;

class ESearchDummy extends AbstractBase implements EUtility
{

    /** @const string */
    const URL_PATH = '';

    /**
     * @param Query $query
     * @return string
     */
    public function execute(Query $query): string
    {
        return 'Dummy';
    }
}
