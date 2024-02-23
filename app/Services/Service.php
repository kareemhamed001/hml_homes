<?php

namespace App\Services;

use App\Traits\ImagesOperations;

interface Service
{
    /**
     * list all records
     * @return mixed
     */
    public function index($pagination=10): mixed;

    /**
     * show a record
     * @param $id
     * @return mixed
     */
    public function show($id): mixed;

    /**
     * update a record
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes): mixed;

    /**
     * delete a record
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed;

    /**
     * search records
     * @param $search
     * @return mixed
     */
    public function search($search,$pagination=10): mixed;

    /**
     * filter records
     * @param $attributes
     * @return mixed
     */
    public function filter($attributes): mixed;

    /**
     * store a record
     * @param $attributes
     * @return mixed
     */
    public function store($attributes): mixed;
}
