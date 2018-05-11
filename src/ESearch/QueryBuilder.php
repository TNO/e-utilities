<?php

namespace LarsNieuwenhuizen\EUtilities\Esearch;

class QueryBuilder
{

    /**
     * @var Query
     */
    protected $query;

    /**
     * QueryBuilder constructor.
     */
    public function __construct()
    {
        $this->setQuery(new Query());
    }

    /**
     * @return Query
     */
    public function getQuery(): Query
    {
        return $this->query;
    }

    /**
     * @param Query $query
     * @return QueryBuilder
     */
    public function setQuery(Query $query): QueryBuilder
    {
        $this->query = $query;

        return $this;
    }

    /**
     * @param string $term
     * @param array $columns
     * @param string $clauseType
     * @return QueryBuilder
     * @throws \Exception
     */
    public function addTerm(string $term, array $columns = [], string $clauseType = 'AND'): QueryBuilder
    {
        $term = new Term($term, $columns, $clauseType);

        $this->query->addTerm($term);

        return $this;
    }
}
