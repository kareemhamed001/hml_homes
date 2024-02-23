<?php

namespace App\Services\Partner;

use App\Traits\ImagesOperations;
use Illuminate\Database\Eloquent\Builder;

class PartnerService implements \App\Services\Service
{

    use ImagesOperations;

    /**
     * list all records
     * @return mixed
     */
    public function index($pagination = 10, $status=null): mixed
    {

        try {
            return \App\Models\Partner::query()->when($status, function (Builder $query)use($status){
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
            return \App\Models\Partner::query()->find($id);
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
            $partner = \App\Models\Partner::query()->find($id);
            if (isset($attributes['cover_image']) && $attributes['cover_image'] != null) {
                $this->deleteFile($partner->cover_image);
                $attributes['cover_image'] = $this->storeFile($attributes['cover_image'], $this->PARTNERS_COVER_IMAGES_PATH);
            } else {
                $attributes['cover_image'] = $partner->cover_image;
            }

            $partner->update([
                'name' => $attributes['name'] ?? $partner->name,
                'description' => $attributes['description'] ?? $partner->description,
                'cover_image' => $attributes['cover_image'],
                'status' => $attributes['status'] ?? $partner->status,
                'link' => $attributes['link'] ?? $partner->link
            ]);
            return $partner;
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
            return \App\Models\Partner::query()->find($id)->delete();
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
            return \App\Models\Partner::query()
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
            return \App\Models\Partner::query()
                ->where('status', 'like', '%' . $attributes['status'] . '%')
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
            return \App\Models\Partner::query()->create([
                'name' => $attributes['name'] ?? null,
                'description' => $attributes['description'] ?? null,
                'cover_image' => $this->storeFile($attributes['cover_image'], 'partners'),
                'link' => $attributes['link'] ?? null,
                'status' => $attributes['status'] ?? 'inactive'
            ]);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
