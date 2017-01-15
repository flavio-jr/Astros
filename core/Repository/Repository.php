<?php

namespace Core\Repository;

use Core\Model\Model;

/**
 * Repository class
 * Class Repository
 * @package Core\Repository
 */
abstract class Repository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update($id, array $data)
    {
        return $this->model->where($this->model->getPrimaryKey(), '=', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function lists($identifier, $field)
    {
        return $this->model->pluck($field, $identifier);
    }

    private function paginate($sort = null, $search = null)
    {
        $result = $this->model;

        if(!empty($search)){
            foreach ($search as $key => $value){
                switch ($value['type']){
                    case 'like':
                        $result = $result->where($value['field'], $value['type'], "%{$value['term']}%");
                        break;
                    default:
                        $result = $result->where($value['field'], $value['type'], $value['term']);
                }
            }
        }

        if(!empty($sort)){
            $result = $result->orderBy($sort['field'], $sort['sort']);
        }

        return $result->paginate(10);
    }


    public function paginateRequest(array $parameters = null)
    {
        $sort = [];
        if (!empty($requestParameters['field']) and !empty($requestParameters['sort'])) {
            $sort = [
                'field' => $requestParameters['field'],
                'sort' => $requestParameters['sort']
            ];
        }

        $searchable = $this->model->searchable();
        $search = [];
        foreach ($requestParameters as $key => $value) {
            if (array_key_exists($key, $searchable) and !empty($value)) {
                $search[] = [
                    'field' => $key,
                    'type' => $searchable[$key],
                    'term' => $value
                ];
            }
        }
        return $this->paginate($sort, $search);
    }

    public function getFillableModelFields()
    {
        return $this->model->getFillable();
    }
}