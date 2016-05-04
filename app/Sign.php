<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    //Schema::create('signs', function (Blueprint $table) {
    //        $table->increments('id');
    //        $table->string('comment');
    //       $table->string('route');
    //        $table->string('ordered_by');
    //       $table->enum('brand' , ['PepsiCo','Rockstar','DPSG','Jarritos','Other']);
    //        $table->double('price' , 6,2);
    //        $table->timestamps();

    // auto-fillable stuffs
    protected $fillable = [
        'description', 'route', 'ordered_by', 'brand', 'price',
    ];

     /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'int',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
