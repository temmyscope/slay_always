<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageScript extends Model
{
    use HasFactory;

    public static function head()
    {
        $codes = PageScript::where('position', 'head')->where('deleted', 'false')->get()->all();
        $str = "";
        if (empty($codes)) {
            foreach($codes as $code){
                $str .= $code->code;
            }
        }
        return $str;
    }

    public static function foot()
    {
        $codes = PageScript::where('position', 'foot')->where('deleted', 'false')->get()->all();
        $str = "";
        if (empty($codes)) {
            foreach($codes as $code){
                $str .= $code->code;
            }
        }
        return $str;
    }

}
