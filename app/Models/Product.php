<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * tags associated with products
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    /**
     * add tags to the product
     * @param array $tagNames
     * @return array|\Illuminate\Support\Collection
     */
    public function addTags(array $tagNames)
    {
        // filter out empty tags
        $validTagNames = array_filter($tagNames, fn($item) => !empty($item));

        // extract unique tags
        $uniqueTagNames = array_unique($validTagNames);


        // fetch if exist else create the tag before attaching it to the product
        $tags = array_map(function ($tagName) {
            return Tag::firstOrCreate([
                'name' => trim($tagName)
            ]);
        }, $uniqueTagNames);

        return $this->tags()->saveMany($tags);
    }
}
