<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;

class UserResource extends JsonResource
{
//    public $with = ['status' => 'ok', 'data' => ['name' => 'hamidreza']];

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [
            'id' => $this->id,
            'username' => $this->name,
            'email' => $this->email,
            'articles' => $this->whenLoaded('articles', function() use($request){
                return $request->with === 'articles' ? ArticleResource::collection($this->articles) : new MissingValue();
            }),
                $this->mergeWhen($this->id === 1, [
                    'type' => 'admin',
                    'test' => 'hamid'
                ])
        ];

        return $result;
    }

    public function with($request)
    {

        return [
            'status' => strtoupper('ok'),
            'data' => ['name' => 'mohammad'],

        ];
    }
}
