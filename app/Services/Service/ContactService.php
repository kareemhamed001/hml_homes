<?php

namespace App\Services\Service;

use App\Traits\ImagesOperations;

class ContactService implements \App\Services\Service
{

    use ImagesOperations;

    public function index($pagination = 10, $where = []): mixed
    {

        try {
            $items = \App\Models\Contact::query();
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

    public function delete($id): mixed
    {
        try {
            $contact = \App\Models\Contact::query()->find($id);
            if (!$contact) {
                throw new \Exception('Service not found');
            }
            $contact->delete();
            return $contact;
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
            return \App\Models\Contact::query()->find($id);
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
            $contact = \App\Models\Contact::query()->find($id);

            $contact->update($attributes);
            return $contact;
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
            return \App\Models\Contact::query()
                ->where('email', 'like', '%' . $search . '%')
                ->orWhere('phone', 'like', '%' . $search . '%')
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
            return \App\Models\Contact::where('status', $attributes['status'] ?? 'active')
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
            $contact = \App\Models\Contact::query()->create($attributes);
            return $contact;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
