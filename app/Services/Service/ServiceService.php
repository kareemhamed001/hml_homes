<?php

namespace App\Services\Service;

use App\Traits\ImagesOperations;

class ServiceService implements \App\Services\Service
{

    use ImagesOperations;

    /**
     * list all records
     * @return mixed
     */
    public function index($pagination = 10, $where = []): mixed
    {

        try {
            $items = \App\Models\Service::query();
            if ($where) {
                foreach ($where as $key => $value) {

                    $items->where($key, $value);
                }
            }

            return $items->paginate($pagination);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * show a record
     * @param $id
     * @return mixed
     */
    public function show($id): mixed
    {
        try {
            return \App\Models\Service::query()->find($id);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * update a record
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes): mixed
    {
        try {
            $service = \App\Models\Service::query()->find($id);
            if (isset($attributes['cover_image'])) {
                $attributes['cover_image'] = $this->storeFile($attributes['cover_image'], 'services');
            } else {
                $attributes['cover_image'] = $service->cover_image;
            }
            $service->update([
                'title' => $attributes['title'] ?? $service->title,
                'cover_image' => $attributes['cover_image'] ?? $service->cover_image,
                'status' => $attributes['status'] ?? $service->status
            ]);

            foreach ($attributes['images'] ?? [] as $image) {
                $service->images()->create([
                    'image' => $this->storeFile($image, 'services')
                ]);
            }

            return $service;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * delete a record
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        try {
            $service = \App\Models\Service::query()->find($id);
            if (!$service) {
                throw new \Exception('Service not found');
            }
            $service->delete();
            return $service;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * search records
     * @param $search
     * @return mixed
     */
    public function search($search, $pagination = 10): mixed
    {
        try {
            return \App\Models\Service::query()->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')->paginate($pagination);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * filter records
     * @param $attributes
     * @return mixed
     */
    public function filter($attributes): mixed
    {

        try {
            return \App\Models\Service::where('status', $attributes['status'] ?? 'active')
                ->paginate($attributes['pagination']);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * store a record
     * @param $attributes
     * @return mixed
     */
    public function store($attributes): mixed
    {
        try {
            $service = \App\Models\Service::query()->create([
                'title' => $attributes['title'] ?? '',
                'cover_image' => $this->storeFile($attributes['cover_image'] ?? '', 'services'),
                'status' => $attributes['status'] ?? 'active'
            ]);

            return $service;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
