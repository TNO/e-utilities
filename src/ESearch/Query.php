<?php

namespace LarsNieuwenhuizen\EUtilities\Esearch;

class Query
{

    /**
     * @var array
     */
    protected $terms = [];

    /**
     * @return array
     */
    public function getTerms(): array
    {
        return $this->terms;
    }

    /**
     * @param array $terms
     * @return Query
     */
    public function setTerms(array $terms): Query
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * @param Term $term
     */
    public function addTerm(Term $term)
    {
        $terms = $this->getTerms();
        $terms[] = $term;
        $this->setTerms($terms);
    }

    /**
     * @return string
     */
    public function getQueryString()
    {
        $terms = $this->getTerms();
        $termString = '';

        foreach ($terms as $term) {
            /** @var Term $term */
            $termString .= $term->__toString();
        }

        return preg_replace('/^(\+OR\+)|^(\+AND\+)/', '', $termString);
    }
}
