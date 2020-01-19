<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Exception;

abstract class BaseRepository
{
    protected const PAGE_LIMIT = 25;
    /**
     * Full Model classname.
     *
     * @var string
     */
    protected $modelClassName;
    protected $model;
    protected $app;

    /**
     * @param Container $app
     * @throws Exception
     */
    public function __construct(Container $app)
    {
        $this->app = $app;
        $this->model = $app->make($this->modelClassName);
    }

    /**
     * Set the entity object.
     *
     * @param [type] $id
     *
     * @return mixed
     */
    public function setModel($id)
    {
        return $this->find($id);
    }

    /**
     * Create a new entity.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes = [])
    {
        return $this->model = $this->model->create($attributes);
    }

//    /**
//     * Create a new instance of class without persisting it.
//     *
//     * @return mixed
//     */
//    public function createObject()
//    {
//        return $this->app->make($this->modelClassName);
//    }

    /**
     * Update an existing model.
     *
     * @param array $attributes
     * @param mixed $id
     *
     * @return mixed
     */
    public function update($id, array $attributes = [])
    {
        $this->model->where('id', $id)->update($attributes);

        return $this->find($id);
    }

    /**
     * Get all the items.
     *
     * @param array $attributes
     *
     * @return EloquentCollection
     */
    public function all(array $attributes = ['*']): EloquentCollection
    {
        return $this->model->all($attributes);
    }

    /**
     * Get all the items by cursor.
     *
     * @param mixed $pageLimit
     * @param mixed $orderAttribute
     * @param mixed $orderType
     *
     * @return Paginate
     */
    public function paginate($pageLimit = self::PAGE_LIMIT, $orderAttribute = 'created_at', $orderType = 'DESC')
    {
        return $this->model->orderBy($orderAttribute, $orderType)->paginate($pageLimit);
    }

    /**
     * Get a specific entity.
     *
     * @param mixed $id
     *
     * @return mixed
     */
    public function find($id)
    {
        $model = $this->model->find($id);
        if ( ! empty($model)) {
            $this->model = $model;
        }
//        if ($model instanceof EloquentCollection|| $model instanceof EloquentCollection) {
        if ($model instanceof EloquentCollection) {
            $model = $model->first();
        }

        return $model;
    }

    /**
     * Get a specific entity.
     *
     * @param mixed $attribute
     * @param mixed $value
     *
     * @return mixed
     */
    public function findBy($attribute, $value)
    {
        return $this->model->where($attribute, $value)->first();
    }

    /**
     * Filter by multiple conditions.
     *
     * @param array $where
     *
     * @return EloquentCollection
     */
    public function findByMultiple(array $where): EloquentCollection
    {
        return $this->model->where($where)->get();
    }

    /**
     * Filter by multiple conditions.
     *
     * @param array $where
     *
     * @return mixed
     */
    public function findOneByMultiple(array $where)
    {
        return $this->model->where($where)->first();
    }

    /**
     * Get a specific entity.
     *
     * @param string $attribute
     * @param string $value
     *
     * @return EloquentCollection
     */
    public function findByWithTrashed(string $attribute, string $value): EloquentCollection
    {
        return $this->model->where($attribute, $value)->withTrashed()->first();
    }

    /**
     * Get all entity's matching condition.
     *
     * @param string $attribute
     * @param string $value
     *
     * @return EloquentCollection
     */
    public function findAllByWithTrashed(string $attribute, string $value): EloquentCollection
    {
        return $this->model->where($attribute, $value)->withTrashed()->get();
    }

    /**
     * Find an item by slug.
     *
     * @param string $slug
     * @param array  $columns
     *
     * @return EloquentCollection
     */
    public function findBySlug(string $slug, array $columns = ['*']): EloquentCollection
    {
        return $this->model->where($slug, [$columns]);
    }

    /**
     * Delete an entity.
     *
     * @param mixed $ids
     *
     * @return bool
     */
    public function remove($ids): bool
    {
        return $this->model->destroy([$ids]);
    }

    /**
     * Delete multiple by condition.
     *
     * @param array $where
     *
     * @return mixed
     */
    public function deleteMultipleBy(array $where)
    {
        return $this->model->where($where)->delete();
    }

    /**
     * Restore a soft deleted entity.
     *
     * @param array $idsArray
     *
     * @return bool
     */
    public function restoreSoftDelete($idsArray): bool
    {
        return $this->model->withTrashed()->whereIn('id', $idsArray)->restore();
    }
}
