<?php

namespace App\Models;

use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coffee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'bean_id'
    ];

    function beans() {
        return $this->belongsTo(Beans::class ,'bean_id', 'id');
    }

    public static function search($query)
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => 'products',
            'type' => '_doc',
            'body' => [
                'query' => [
                    'bool' => [
                        'must' => [
                            'match' => [
                                'name' => $query
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return $client->search($params);
    }
}
