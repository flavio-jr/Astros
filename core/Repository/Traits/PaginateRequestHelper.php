<?php

namespace Core\Repository\Traits;

trait PaginateRequestHelper
{
    /**
     * @param array $params
     * @return array
     */
    protected function sortArray(array $params)
    {
        $sort = [];
        if(!empty($params['field']) and !empty($params['sort'])){
            $sort = [
                'field' => $params['field'],
                'sort'  => $params['sort']
            ];
        }

        return $sort;
    }

    /**
     * @param array $params
     * @param array $searchable
     * @return array
     */
    protected function searchArray(array $params, array $searchable)
    {
        $search = [];
        foreach ($params as $key => $value){
            if(array_key_exists($key, $searchable) and !empty($value)){
                $search[] = [
                    'field' => $key,
                    'type'  => $searchable[$key],
                    'term'  => $value
                ];
            }
        }

        return $search;
    }
}