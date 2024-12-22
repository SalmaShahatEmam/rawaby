<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Image;
use App\Models\Feature;
use App\Models\Favorite;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estate extends Model
{
    use HasFactory , SoftDeletes;


    protected $fillable = [
        'name',
        'phone',
        'email',
        'personal_address',
        'title',
        'category_id',
        'area',
        'rooms',
        'baths',
        'finishing',
        'type',
        'desc',
        'city_id',
        'address',
        'lat',
        'lng',
        'price',
        'status',
        'step',
        'is_completed',
        'slug',
        'is_admin',
        // 'location'

    ];

//add location key

    //slug add when create

    public static function boot()
    {
        parent::boot();

        static::creating(function ($estate) {
            $baseSlug = Str::slug($estate->name);
            $slug = $baseSlug;
            $count = 1;

            while (Estate::where('slug', $slug)->exists()) {
                $slug = $baseSlug . '-' . $count++;
            }

            $estate->slug = $slug;
        });
    }

    // protected $appends = [
    //     'location',
    // ];


    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }







    public function orders()
    {
        return $this->hasMany(Order::class, 'estate_id', 'id');
    }



    public function images()
    {
        return $this->hasMany(Image::class, 'estate_id', 'id');
    }






    protected function formatTime($time)
    {
        $parsedTime = Carbon::parse($time);
        $formattedTime = $parsedTime->format('h:i');
        $period = $parsedTime->format('A') === 'AM' ? 'صباحًا' : 'مساءً';

        if (app()->getLocale() === 'ar') {
            return "{$formattedTime} {$period}";
        }

        return $parsedTime->format('h:i A');
    }

    public function getFormattedCreatedAtAttribute()
    {
        // Set the locale to Arabic
        Carbon::setLocale(app()->getLocale());

        // Format the date in Arabic
        return Carbon::parse($this->created_at)->translatedFormat('d F Y');
    }


    // public function getLocationAttribute()
    // {
    //     //{"lat":26.820553,"lng":30.802498}
    //     return json_encode([
    //         'lat' => $this->lat,
    //         'lng' => $this->lng,
    //     ]);

    //        }



/************************** Filter *********************************/
  public function scopeApproved(Builder $query): Builder
  {
      return $query->where('status', 'approved');
  }

  public function scopeType(Builder $query, $type): Builder
  {
      return $type ? $query->where('type', $type) : $query;
  }

  public function scopeCategory(Builder $query, $categoryId): Builder
  {
      return $categoryId ? $query->where('category_id', $categoryId) : $query;
  }

  public function scopeCity(Builder $query, $city): Builder
  {
      return $city ?
             $query->whereHas('city', function ($q) use ($city) {
                 $q->where('name_ar' , 'like' , '%' . $city . '%');
                  $q->orWhere('name_en' , 'like' , '%' . $city . '%');
             })

            : $query;


  }

  public function scopeRooms(Builder $query, $rooms): Builder
  {
      return $rooms > 0 ? $query->where('rooms', $rooms == 7 ? '>=' : '=', $rooms) : $query;
  }

  public function scopeBaths(Builder $query, $baths): Builder
  {
      return $baths > 0 ? $query->where('baths', $baths == 7 ? '>=' : '=', $baths) : $query;
  }

  public function scopePriceRange(Builder $query, $minPrice, $maxPrice): Builder
  {
      return $query->whereBetween('price', [$minPrice, $maxPrice]);
  }

  public function scopeAreaRange(Builder $query, $minArea, $maxArea): Builder
  {
      return $query->whereBetween('area', [$minArea, $maxArea]);
  }

  //is_completed
    public function scopeIsCompleted(Builder $query): Builder
    {
        return $query->where('is_completed', 1);
    }

  public function scopeSort(Builder $query, $sortType): Builder
  {

      return match ($sortType) {
          'latest' => $query->orderBy('created_at', 'desc'),
          'high_price' => $query->orderBy('price', 'desc'),
          'low_price' => $query->orderBy('price', 'asc'),
          default => $query,
      };
  }
/************************** End Filter *********************************/


}
