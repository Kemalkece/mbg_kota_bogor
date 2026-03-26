<?php

namespace App\Observers;

use App\Traits\LogActivity;
use Illuminate\Database\Eloquent\Model;

class GlobalModelObserver
{
    use LogActivity;

    public function created(Model $model)
    {
        $modelName = class_basename($model);
        self::logCreate($modelName, $model->id, $model->getAttributes());
    }

    public function updated(Model $model)
    {
        $modelName = class_basename($model);
        $changes = $model->getChanges();
        
        // Remove timestamps from changes
        unset($changes['updated_at']);
        
        if (empty($changes)) {
            return;
        }

        self::logUpdate($modelName, $model->id, $changes);
    }

    public function deleted(Model $model)
    {
        $modelName = class_basename($model);
        self::logDelete($modelName, $model->id);
    }
}
