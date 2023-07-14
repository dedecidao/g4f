<?php 
namespace app\routes;

class Routes 
{
    public static function get()
    {
        return [
            'get' => [
                '/' => 'HomeController@index',
                '/series' =>'SeriesController@index'
            ],
            'post' => [
                '/series' => 'SeriesController@get'
            ], 
            
        ];
    }

}
