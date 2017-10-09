<?php
/**
 * Created by PhpStorm.
 * User: csi0n
 * Date: 10/9/17
 * Time: 10:03 AM
 */

namespace csi0n\LaravelAdminApi\System\Repositories;


use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    private $model;

    protected $primaryKey;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $this->makeModel();
    }


    public function getModel()
    {
        return $this->model;
    }

    public abstract function model(): string;

    public function setModel($model)
    {
        if ($model instanceof Model) {
            $this->model = $model;

            return $model;
        }
        $model = app($model);
        if (!$model instanceof Model) {
            throw new \Exception("class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }
        $this->primaryKey = $model->getKeyName();
        $this->model = $model;
    }

    public function makeModel()
    {
        $this->setModel($this->model());
    }

    public function find($id, $columns = array('*'))
    {
        $tempModel = $this->model;
        $tempModel->select($columns);

        return is_array($id) ? $tempModel
            ->whereIn($this->primaryKey, $id)
            ->get() :
            $tempModel->find($id);
    }

    public function store(array $data, callable $callback = null)
    {
        $model = $this->model;
        if ($model->fill($data)->save()) {
            if ($callback instanceof \Closure) {
                return $callback($model);
            }

            return $model;
        }

        return false;
    }

    public function update(array $data, $id = null, callable $callback = null)
    {
        $model = $this->find($id);
        if (is_null($model)) {
            return false;
        }
        if ($model->fill($data)->save()) {
            if ($callback instanceof \Closure) {
                return $callback($model);
            }

            return $model;
        }

        return false;
    }

    public function destroy($id, callable $callback = null)
    {
        $model = $this->find($id);
        if (is_null($model)) {
            return false;
        }
        if ($model->delete()) {
            if ($callback instanceof \Closure) {
                return $callback($model);
            }

            return $model;
        }

        return $model;
    }

    public function delete($id, callable $callback = null)
    {
        $model = $this->find($id);
        if (is_null($model)) {
            return false;
        }
        if ($model->delete()) {
            if ($callback instanceof \Closure) {
                return $callback($model);
            }

            return $model;
        }

        return $model;
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array(array($this->getModel(), $name), $arguments);
    }
}