<?php
namespace App\DTO;

class GetAllParams
{
    public $perPage;
    public $arrayFilters;
    public $pagination;
    public $filterType;
    public $orderBy;
    public $orderDirection;
    public $fields;

    public function __construct(
        $perPage = 20, 
        array $arrayFilters = [],  
        $pagination = true, 
        $filterType,
        $orderBy,
        $orderDirection,
        array $fields = ['*']
    ) {
        $this->perPage = $perPage;
        $this->arrayFilters = $arrayFilters;
        $this->pagination = $pagination;
        $this->filterType = $filterType;
        $this->orderBy = $orderBy;
        $this->orderDirection = $orderDirection;
        $this->fields = $fields;
    }
}