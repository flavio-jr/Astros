<?php

namespace Core\Repository;

use Core\Model\Model;
use Core\Repository\Contracts\RepositoryInterface;
use Core\Repository\Traits\PaginateRequestHelper;

/**
 * Repository class
 * Class Repository
 * @package Core\Repository
 */
class Repository implements RepositoryInterface
{
    use PaginateRequestHelper;

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Returns a single record
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return $this->model->find($id);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->model->all();
    }

    /**
     * @param array $data
     * @return bool
     */
    public function save(array $data)
    {
        return $this->model->save($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        return $this->model->where($this->model->getKeyName(), '=', $id)->update($data);
    }

    /**
     * @param $id
     * @return int
     */
    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function lists($identifier, $field)
    {
        return $this->model->pluck($field, $identifier);
    }

    /**
     * Paginate a given request
     * @param array|null $request
     * @param int $take
     * @return mixed
     */
    public function paginate(array $request = null, $take = 10)
    {
        $sort = is_null($request) ? null : $this->sortArray($request);
        $search = is_null($request) ? null : $this->searchArray($request, $this->model->searchable());

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

        return $result->paginate($take);
    }


    /**
     * Model fillable fields
     * @return array
     */
    public function getFillableFields()
    {
        return $this->model->getFillable();
    }
}