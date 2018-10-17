<?php
declare(strict_types=1);

namespace LarsNieuwenhuizen\EUtilities\ESearch;

class Term
{

    /** @var string */
    const AND_CLAUSE = 'AND';

    /** @var string */
    const OR_CLAUSE = 'OR';

    /**
     * Defines if this term is an AND or OR term
     *
     * @var string
     */
    protected $clauseType;

    /**
     * @var string
     */
    protected $term;

    /**
     * @var array
     */
    protected $columns;

    /**
     * Term constructor.
     *
     * @param string $clauseType
     * @param string $term
     * @param array $columns
     */
    public function __construct(string $term, array $columns, string $clauseType = 'AND')
    {
        try {
            $this->setClauseType($clauseType);
            $this->setTerm($term);
            $this->setColumns($columns);
        } catch (\Exception $exception) {
            throw new \TypeError('Term could not be constructed because: ' . $exception->getMessage());
        }
    }

    /**
     * @return string
     */
    public function getClauseType(): string
    {
        return $this->clauseType;
    }

    /**
     * @param string $clauseType
     * @return Term
     * @throws \Exception
     */
    public function setClauseType(string $clauseType): Term
    {
        if ($clauseType === self::AND_CLAUSE || $clauseType === self::OR_CLAUSE) {
            $this->clauseType = $clauseType;

            return $this;
        }

        throw new \Exception('Term clause not correct');
    }

    /**
     * @return string
     */
    public function getTerm(): string
    {
        return $this->term;
    }

    /**
     * @param string $term
     * @return Term
     */
    public function setTerm(string $term): Term
    {
        $this->term = $term;

        return $this;
    }

    /**
     * @return array
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param array $columns
     * @return Term
     */
    public function setColumns(array $columns): Term
    {
        $this->columns = $columns;

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $columnString = '';
        $columns = $this->getColumns();

        if (count($columns) > 0) {
            $columnString .= '%5b';

            foreach ($columns as $column) {
                $columnString .= $column;

                if ($column !== end($columns)) {
                    $columnString .= '/';
                }
            }

            $columnString .= '%5d';
        }

        return '+' . $this->getClauseType() . '+' . $this->getTerm() . $columnString;
    }
}
