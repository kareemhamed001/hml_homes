<?php

namespace App\Services\Feedback;

use App\Traits\ImagesOperations;

class FeedbackService implements \App\Services\Service
{

    use ImagesOperations;

    /**
     * list all records
     * @return mixed
     */
    public function index($pagination = 10): mixed
    {
        try {
            return \App\Models\Feedback::query()->paginate($pagination);
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
            return \App\Models\Feedback::query()->find($id);
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
    public function update($id, $attributes): mixed
    {
        try {
            $feedback = \App\Models\Feedback::query()->find($id);
            if (isset($attributes['user_image'])) {
                $attributes['user_image'] = $this->storeFile($attributes['user_image'], $this->FEEDBACK_USER_IMAGE_PATH);
            }
            $feedback->update([
                'user_name' => $attributes['user_name'] ?? $feedback->user_name,
                'user_image' => $attributes['user_image'] ?? $feedback->user_image,
                'comment' => $attributes['comment'] ?? $feedback->comment,
                'rate' => $attributes['rate'] ?? $feedback->rate,
                'status' => $attributes['status'] ?? $feedback->status
            ]);
            return $feedback;
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
            return \App\Models\Feedback::query()->find($id)->delete();
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
            return \App\Models\Feedback::query()
                ->where('user_name', 'like', '%' . $search . '%')
                ->orWhere('comment', 'like', '%' . $search . '%')
                ->orWhere('rate', 'like', '%' . $search . '%')
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

            return \App\Models\Feedback::query()
                ->where('status', $attributes['status'] ?? 'active')
                ->orWhere('rate', '>=', $attributes['rate_from'] ?? 0)
                ->orWhere('rate', '<=', $attributes['rate_to'] ?? 5)
                ->paginate($attributes['pagination'] ?? 10);
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
            if (isset($attributes['user_image'])) {
                $attributes['user_image'] = $this->storeFile($attributes['user_image'], $this->FEEDBACK_USER_IMAGE_PATH);
            }
            return \App\Models\Feedback::query()->create([
                'user_name' => $attributes['user_name'],
                'user_image' => $attributes['user_image'],
                'comment' => $attributes['comment'],
                'rate' => $attributes['rate'],
                'status' => $attributes['status'] ?? 'active'
            ]);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
