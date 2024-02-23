<?php

namespace App\Services\Project;


use App\Models\ProjectOrder;
use App\Services\Service;
use App\Traits\ImagesOperations;
use Illuminate\Support\Facades\DB;

class ProjectService implements Service
{

    use ImagesOperations;

    /**
     * list all records
     * @return mixed
     */
    public function index($pagination = 10, $type = 'compound'): mixed
    {
        try {
            return \App\Models\Project::query()->where('type', $type)->with('images')->paginate($pagination);
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
            return \App\Models\Project::query()->find($id);
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

            DB::beginTransaction();
            $project = \App\Models\Project::query()->find($id);

            if (!$project) {
                throw new \Exception('project not found');
            }

            if (isset($attributes['project_cover_image'])) {
                $this->deleteFile($project->cover_image);
                $attributes['cover_image'] = $this->storeFile($attributes['project_cover_image'], $this->PROJECT_MANAGER_PATH);
            }

            if (isset($attributes['manager_image'])) {
                $this->deleteFile($project->manager_image);
                $attributes['manager_image'] = $this->storeFile($attributes['manager_image'], $this->PROJECT_MANAGER_PATH);
            }

            if (isset($attributes['project_location_image'])) {
                $this->deleteFile($project->location_image);
                $attributes['location_image'] = $this->storeFile($attributes['project_location_image'], $this->PROJECT_LOCATION_PATH);
            }
            $project->update([
                'name' => $attributes['project_name'] ?? $project->name,
                'summary' => $attributes['project_summary'] ?? $project->summary,
                'description' => $attributes['project_description'] ?? $project->description,
                'cover_image' => $attributes['cover_image'] ?? $project->cover_image,
                'type' => $attributes['type'] ?? $project->type,
                'manager' => $attributes['manager_name'] ?? $project->manager,
                'manager_description' => $attributes['manager_description'] ?? $project->manager_description,
                'manager_image' => $attributes['manager_image'] ?? $project->manager_image,
                'status' => 'active' ?? $project->status,
                'location_image' => $attributes['location_image'] ?? $project->location_image,
                'gps_location' => $attributes['gps_location'] ?? $project->gps_location,

            ]);

            if (isset($attributes['features'])) {
                $featuresIds = [];
                foreach ($attributes['features'] as $feature) {
                    if (!isset($feature['id'])) {
                        if (isset($feature['image'])) {
                            $newImg = $this->storeFile($feature['image'], $this->PROJECT_FEATURES_PATH);
                        }
                        $newFeature = $project->features()->create([
                            'image' => $newImg,
                            'name' => $feature['title']
                        ]);
                        $featuresIds[] = $newFeature->id;
                    } else {
                        $oldFeature = $project->features()->find($feature['id']);
                        if (!$oldFeature) {
                            continue;
                        }
                        if (isset($feature['image'])) {
                            $this->deleteFile($oldFeature->image);
                            $newImage = $this->storeFile($feature['image'], $this->PROJECT_FEATURES_PATH);
                        }
                        $oldFeature->update([
                            'image' => $newImage ?? $oldFeature->image,
                            'name' => $feature['title'] ?? $oldFeature->name
                        ]);
                        $featuresIds[] = $oldFeature->id;
                        $newImage = null;
                    }
                }
                $project->features()->whereNotIn('id', $featuresIds)->delete();
            }

            if (isset($attributes['images'])) {
                $imagesIds = [];
                foreach ($attributes['images'] as $image) {
                    if (!isset($image['id'])) {

                        $newImageItem = $project->images()->create([
                            'image' => $this->storeFile($image['image'], $this->PROJECT_IMAGE_PATH),
                            'type' => $image['type']
                        ]);
                        $imagesIds[] = $newImageItem->id;
                    } else {
                        $oldImage = $project->images()->find($image['id']);
                        if (!$oldImage) {
                            continue;
                        }
                        if (isset($image['image'])) {
                            $this->deleteFile($oldImage->image);
                            $newImage = $this->storeFile($image['image'], $this->PROJECT_IMAGE_PATH);
                        }
                        $oldImage->update([
                            'image' => $newImage ?? $oldImage->image,
                            'type' => $image['type'] ?? $oldImage->type
                        ]);
                        $imagesIds[] = $oldImage->id;
                        $newImage = null;
                    }
                }

                $project->outSideImages()->whereNotIn('id', $imagesIds)->delete();
            }

            if (isset($attributes['photos'])) {
                $photosIds = [];
                foreach ($attributes['photos'] as $photo) {
                    if (!isset($photo['id'])) {
                        $newPhoto = $project->images()->create([
                            'image' => $this->storeFile($photo['image'], $this->PROJECT_IMAGE_PATH),
                            'type' => $photo['type']
                        ]);
                        $photosIds[] = $newPhoto->id;
                    } else {
                        $oldPhoto = $project->images()->find($photo['id']);
                        if (!$oldPhoto) {
                            continue;
                        }
                        if (isset($photo['image'])) {
                            $this->deleteFile($oldPhoto->image);
                            $newImage = $this->storeFile($photo['image'], $this->PROJECT_IMAGE_PATH);
                        }
                        $oldPhoto->update([
                            'image' => $newImage ?? $oldPhoto->image,
                            'type' => $photo['type'] ?? $oldPhoto->type
                        ]);
                        $photosIds[] = $oldPhoto->id;
                        $newImage = null;
                    }

                }
                $project->inSideImages()->whereNotIn('id', $photosIds)->delete();
            }
            if (isset($attributes['prices'])) {
                $pricesIds = [];
                foreach ($attributes['prices'] as $price) {

                    if (!isset($price['id'])) {
                        $newPrice = $project->prices()->create([
                            'configuration' => $price['configuration'],
                            'area' => $price['area'],
                            'price' => $price['price']
                        ]);
                        $pricesIds[] = $newPrice->id;
                    } else {
                        $oldPrice = $project->prices()->find($price['id']);
                        if (!$oldPrice) {
                            continue;
                        }
                        $oldPrice->update([
                            'configuration' => $price['configuration'] ?? $oldPrice->configuration,
                            'area' => $price['area'] ?? $oldPrice->area,
                            'price' => $price['price'] ?? $oldPrice->price
                        ]);
                        $pricesIds[] = $oldPrice->id;
                    }
                }
                $project->prices()->whereNotIn('id', $pricesIds)->delete();
            }

            if (isset($attributes['plans'])) {
                $plansIds = [];
                foreach ($attributes['plans'] as $plan) {
                    if (!isset($plan['id'])) {
                        $newPlan = $project->paymentPlans()->create([
                            'step' => $plan['step'],
                            'name' => $plan['name'],
                            'description' => $plan['description']
                        ]);
                        $plansIds[] = $newPlan->id;
                    } else {
                        $oldPlan = $project->paymentPlans()->find($plan['id']);
                        if (!$oldPlan) {
                            continue;
                        }
                        $oldPlan->update([
                            'step' => $plan['step'] ?? $oldPlan->step,
                            'name' => $plan['name'] ?? $oldPlan->name,
                            'description' => $plan['description'] ?? $oldPlan->description
                        ]);
                        $plansIds[] = $oldPlan->id;
                    }

                }
                $project->paymentPlans()->whereNotIn('id', $plansIds)->delete();
            }

            if (isset($attributes['near_places'])) {
                $nearPlacesIds = [];
                foreach ($attributes['near_places'] as $place) {
                    if (!isset($place['id'])) {
                        $newPlace = $project->nearPlaces()->create([
                            'name' => $place['place'],
                            'distance' => $place['distance'] ?? null,
                            'time' => $place['time']
                        ]);
                        $nearPlacesIds[] = $newPlace->id;
                    } else {
                        $oldPlace = $project->nearPlaces()->find($place['id']);
                        if (!$oldPlace) {
                            continue;
                        }
                        $oldPlace->update([
                            'name' => $place['place'] ?? $oldPlace->name,
                            'distance' => $place['distance'] ?? $oldPlace->distance,
                            'time' => $place['time'] ?? $oldPlace->time
                        ]);
                        $nearPlacesIds[] = $oldPlace->id;
                    }
                }
                $project->nearPlaces()->whereNotIn('id', $nearPlacesIds)->delete();
            }


//            foreach ($attributes['images'] as $image) {
//                $gallery->images()->create([
//                    'image' => $this->storeFile($image, 'galleries')
//                ]);
//            }

            DB::commit();
            return $project->fresh();
        } catch (\Exception $exception) {
            DB::rollback();
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
            $gallery = \App\Models\Project::query()->find($id);
            $gallery->delete();
            return $gallery;
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
            return \App\Models\Project::where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('description', 'LIKE', '%' . $search . '%')
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
            return \App\Models\Project::where('status', $attributes['status'] ?? 'active')
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

            DB::beginTransaction();
            if (isset($attributes['project_cover_image'])) {
                $attributes['cover_image'] = $this->storeFile($attributes['project_cover_image'], $this->PROJECT_MANAGER_PATH);
            }

            if (isset($attributes['manager_image'])) {
                $attributes['manager_image'] = $this->storeFile($attributes['manager_image'], $this->PROJECT_MANAGER_PATH);
            }

            if (isset($attributes['project_location_image'])) {
                $attributes['location_image'] = $this->storeFile($attributes['project_location_image'], $this->PROJECT_LOCATION_PATH);
            }
            $project = \App\Models\Project::query()->create([
                'name' => $attributes['project_name'],
                'summary' => $attributes['project_summary'],
                'description' => $attributes['project_description'],
                'cover_image' => $attributes['cover_image'] ?? null,
                'type' => $attributes['type'] ?? 'compound',
                'manager' => $attributes['manager_name'],
                'manager_description' => $attributes['manager_description'],
                'manager_image' => $attributes['cover_image'] ?? null,
                'status' => 'active',
                'location_image' => $attributes['location_image'] ?? null,
                'gps_location' => $attributes['gps_location'],

            ]);

            if (isset($attributes['features'])) {
                foreach ($attributes['features'] as $feature) {
                    $project->features()->create([
                        'image' => $this->storeFile($feature['image'], $this->PROJECT_FEATURES_PATH),
                        'name' => $feature['title']
                    ]);
                }
            }

            if (isset($attributes['images'])) {
                foreach ($attributes['images'] as $image) {
                    $project->images()->create([
                        'image' => $this->storeFile($image['image'], $this->PROJECT_IMAGE_PATH),
                        'type' => $image['type']
                    ]);
                }
            }

            if (isset($attributes['photos'])) {
                foreach ($attributes['photos'] as $photo) {
                    $project->images()->create([
                        'image' => $this->storeFile($photo['image'], $this->PROJECT_IMAGE_PATH),
                        'type' => $photo['type']
                    ]);
                }
            }
            if (isset($attributes['prices'])) {
                foreach ($attributes['prices'] as $price) {
                    $project->prices()->create([
                        'configuration' => $price['configuration'],
                        'area' => $price['area'],
                        'price' => $price['price']
                    ]);
                }
            }

            if (isset($attributes['plans'])) {
                foreach ($attributes['plans'] as $plan) {
                    $project->paymentPlans()->create([
                        'step' => $plan['step'],
                        'name' => $plan['name'],
                        'description' => $plan['description']
                    ]);
                }
            }

            if (isset($attributes['near_places'])) {
                foreach ($attributes['near_places'] as $place) {
                    $project->nearPlaces()->create([
                        'name' => $place['place'],
                        'distance' => $place['distance'] ?? null,
                        'time' => $place['time']
                    ]);
                }
            }


//            foreach ($attributes['images'] as $image) {
//                $gallery->images()->create([
//                    'image' => $this->storeFile($image, 'galleries')
//                ]);
//            }

            DB::commit();
            return $project;
        } catch (\Exception $exception) {
            DB::rollback();
            throw $exception;
        }
    }

    public function register($id, $data)
    {
        try {
            $project = \App\Models\Project::query()->find($id);

            if (!$project) {
                throw new \Exception('project not found');
            }
            $project->orders()->create([
                'phone' => $data['phone'],
                'email' => $data['email'],
                'name' => $data['name']
            ]);
            return $project;
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    function customers($id, $pagination = 10)
    {
        try {
            return ProjectOrder::query()->where('project_id', $id)->paginate($pagination);
        } catch (\Exception $exception) {
            throw $exception;
        }
    }
}
