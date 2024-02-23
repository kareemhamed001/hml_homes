<?php

namespace App\Services\CoverImage;

use Illuminate\Database\Eloquent\Builder;

class CoverImageService implements \App\Services\Service
{

    use \App\Traits\ImagesOperations;

    /**
     * list all records
     * @return mixed
     */
    public function index($pagination = 10, $status = null): mixed
    {

        try {
            return \App\Models\CoverImage::query()->when($status, function (Builder $query)use($status){
                $query->where('status', $status);
            })->paginate($pagination);
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
            return \App\Models\CoverImage::query()->find($id);
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
            $coverImage = \App\Models\CoverImage::query()->find($id);

            if (isset($attributes['image'])) {
                $attributes['image'] = $this->storeFile($attributes['image'], 'cover_images');
            } else {
                $attributes['image'] = $coverImage->image;
            }
            $coverImage->update([
                'name' => $attributes['name'] ?? $coverImage->name,
                'description' => $attributes['description'] ?? $coverImage->description,
                'image' => $attributes['image'] ?? $coverImage->image,
                'status' => $attributes['status'] ?? $coverImage->status
            ]);

            return $coverImage;
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
            $coverImage = \App\Models\CoverImage::query()->find($id);
            $coverImage->delete();
            return $coverImage;
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
            return \App\Models\CoverImage::query()
                ->where('name', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->paginate($pagination);
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
            return \App\Models\CoverImage::query()
                ->where('name', 'like', '%' . $attributes['name'] . '%')
                ->where('description', 'like', '%' . $attributes['description'] . '%')
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

            if (isset($attributes['image'])) {
                $attributes['image'] = $this->storeFile($attributes['image'], 'cover_images');
            }
            $coverImage = \App\Models\CoverImage::query()->create([
                'name' => $attributes['name'] ?? '',
                'description' => $attributes['description'] ?? '',
                'image' => $attributes['image'] ,
                'status' => $attributes['status']
            ]);

            return $coverImage;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
