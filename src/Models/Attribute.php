<?php

namespace Neon\Attributable\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model as EloquentModel;

use Neon\Models\Traits\Uuid;

class Attribute extends EloquentModel
{
  use SoftDeletes;
  use Uuid;

  /** The attributes that should be handled as date or datetime.
   *
   * @var array
   */
  protected $dates = [
    'created_at', 'updated_at', 'deleted_at'
  ];

  public function values()
  {
    /** We getting only the valid variable values, that are published and
     * not yet expired.
     */
    return $this->hasMany(\Neon\Attributable\Models\AttributeValue::class);
  }
}
