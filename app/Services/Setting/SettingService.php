<?php

namespace App\Services\Setting;

use App\Models\Setting;
use App\Traits\ImagesOperations;

class SettingService implements \App\Services\Service
{

    use ImagesOperations;

    /**
     * list all records
     * @return mixed
     */
    public function index($pagination = 10): mixed
    {
        try {
            return \App\Models\Setting::query()->first();
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
            return \App\Models\Setting::query()->find($id);
        } catch (\Exception $exception) {
            return $exception->getMessage();
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
            $setting = \App\Models\Setting::query()->find($id);
            $setting->update([
                'website_name' => $attributes['name'] ?? $setting->website_name,
                'website_description' => $attributes['description'] ?? $setting->website_description,
                'email' => $attributes['description'] ?? $setting->email,
                'phone' => $attributes['description'] ?? $setting->phone,
                'about_us' => $attributes['description'] ?? $setting->about_us,
            ]);

            return $setting;
        } catch (\Exception $exception) {
            return $exception->getMessage();
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
            return \App\Models\Setting::query()->find($id)->delete();
        } catch (\Exception $exception) {
            return $exception->getMessage();
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
            return \App\Models\Setting::query()->where('name', 'like', '%' . $search . '%')->paginate($pagination);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * filter records
     * @param $attributes
     * @return mixed
     */
    public function filter($attributes): mixed
    {
        return null;
    }

    /**
     * store a record
     * @param $attributes
     * @return mixed
     */
    public function store($attributes): mixed
    {
        try {
            if (isset($attributes['website_logo'])) {
                $attributes['website_logo'] = $this->storeFile($attributes['website_logo'], $this->WEBSITE_LOGO_PATH);
            }
            if (isset($attributes['website_logo_dark'])) {
                $attributes['website_logo_dark'] = $this->storeFile($attributes['website_logo_dark'], $this->WEBSITE_DARK_LOGO_PATH);
            }
            $settings = \App\Models\Setting::query()->first();
            if(!$settings) {
                $settings = Setting::query()->create($attributes);
            }else {
                $settings->update($attributes);
            }
            return $settings;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
