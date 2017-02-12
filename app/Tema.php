<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    //
    protected $table = "temes";

    public function embedUrl() {
    	// de moment nomes Youtube
    	$url = $this->video;
    	$parts = explode("watch?v=",$url);
    	$code = $parts[1];
    	//return "https://www.youtube.com/embed/$code?ecver=2";
    	return "https://www.youtube.com/embed/CdfPDKgCOcQ?ecver=2";
    }
}
