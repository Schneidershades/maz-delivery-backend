<?php

namespace App\Repositories;

// use App\Exceptions\ModelNotFoundException;
// use App\Exceptions\ItemNotFoundHttpException;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use DB;

class AbstractRepository implements RepositoryInterface
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->getModel()->all();
    }

    public function latest()
    {
        return $this->getModel()->latest()->get();
    }

    public function latestPage()
    {
        return $this->getModel()->latest()->get();
    }


    public function find(int $id)
    {
        return $this->getModel()->find($id);
    }

    public function results($result)
    {
        if ($result == null) {
            // throw new ItemNotFoundHttpException(
            //     'the item was not found in '. strtolower(class_basename($this->getModel())) . ' table'
            // );
        }
    }

    public function items($criteria)
    {
        if (empty($criteria)) {
            // throw new \InvalidArgumentException(
            //     'paramter(s) you are sending cannot be an empty array.'
            // );
        }
    }

    public function findFirstByArray(array $criteria)
    {
        $this->items($criteria);
        $result = $this->getModel()->where($criteria)->first();
        $this->results($result);
        return $result;
    }

    public function findAllByArray(array $criteria)
    {
        $this->items($criteria);
        $result = $this->getModel()->where($criteria)->get();
        $this->results($result);
        return $result;
    }

    /**
     * A method for fetching an entity by field values.
     *  - $criteria will access an associated array with the columns => value
     * pair.
     *
     * @param array $criteria
     * @param null $limit
     * @param int $offset
     * @return mixed
     */
    public function findBy(array $criteria, $limit = null, $offset = 0): Collection
    {

        $this->items($criteria);

        return $this->getModel()
            ->where($criteria)
            ->forPage($offset, $limit)
            ->get();
    }

    /**
     * Find a model by criteria and fail if not found.
     *
     * @param array $criteria
     * @param null $limit
     * @param int $offset
     * @return mixed
     * @throws NoResultException
     */

    public function findByOrFail(array $criteria, int $limit = 1, int $offset = 0)
    {
        $this->items($criteria);

        $result = $this->getModel()
            ->where($criteria)
            ->limit($limit)
            ->offset($offset)
            ->get();

        $this->results($result);

        return $result;
    }

    /**
     * Save a model.
     *
     * @param Model $model
     * @return bool
     * @throws \Throwable
     */
    public function save(Model $model): bool
    {
        return $model->saveOrFail();
    }

    public function update(Model $model): bool
    {
        return $model->update();
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    /**
     * Delete an entity by model Id.
     *
     * @param int $id
     * @return bool
     */
    public function deleteById(int $id)
    {
        $model = $this->find($id);

        return $this->delete($model);
    }

    /**
     * Delete by criteria. Pass associative array of `columns => value`
     *
     * @param array $condition
     * @return bool
     */
    public function deleteByCriteria(array $condition): bool
    {
        return $this->getModel()->where($condition)->delete();
    }

    /**
     * Update entity by condition and replacement values.
     *
     * @param array $condition
     * @param array $replacementValue
     * @return int
     */
    public function updateBy(array $condition, array $replacementValue): int
    {
        // if (empty($condition)) {
        //     throw new \InvalidArgumentException('$condition cannot be empty');
        // }

        // if (empty($replacementValue)) {
        //     throw new \InvalidArgumentException('$replacementValue cannot be empty');
        // }

        // return $this->getModel()->where($condition)->update($replacementValue);
    }

    protected function getModel(): Model
    {
        return new $this->model;
    }

    public function getColumns($model)
    {       
        $columns = Schema::getColumnListing($model);
        return $columns;
    }

     /**
     * Get all tables for polymorphic relationships
     *
     * @param array $condition
     * @return bool
     */
    public function allTables()
    {
        return DB::connection()->getDoctrineSchemaManager()->listTableNames();
    }

    public function contentAndDbIntersection(array $content, $model, array $excludeFieldsForLogic = [], array $includeFields = [])
    {
        $excludeColumns = array_diff($content, $excludeFieldsForLogic);
        
        $allReadyColumns = array_merge($excludeColumns, $includeFields);

        $requestColumns = array_keys($allReadyColumns);

        $tableColumns = $this->getColumns($model->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $model->setAttribute($field, $allReadyColumns[$field]);
        }

        return $model;
    }

    public function requestAndDbIntersection($request, $model, array $excludeFieldsForLogic = [], array $includeFields = [])
    {
        return $request->all();
        
        $excludeColumns = array_diff($request->all(), $excludeFieldsForLogic);
        
        $allReadyColumns = array_merge($excludeColumns, $includeFields);

        $requestColumns = array_keys($allReadyColumns);

        $tableColumns = $this->getColumns($model->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $model->{$field} = $request[$field];
        }

        return $model;
    }
}
