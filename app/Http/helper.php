<?php 
use App\Http\Resources\SettingResource;
use App\Models\Utility;

if(!function_exists('active_link')){
    function active_link($param1 , $param2 = null){
        if($param2 == null){
            if($param1 === Illuminate\Support\Facades\Request::segment(1)){
                return 'active';
            }else{
                return '';
            }
        }else{
            if(
                $param1 === Illuminate\Support\Facades\Request::segment(1)
                &&
                $param2 === Illuminate\Support\Facades\Request::segment(2)
            ){
                return 'active';
            }else{
                return '';
            }
        }
    }
}

function company_setting()
{
    $settings = Utility::settings();
    return new SettingResource($settings);
}


// if(!function_exists('active_link')){
//     function active_link($param1 , $param2 = null){
//         if($param2 == null){
//             if(preg_match('/'.$param1.'/i' , Illuminate\Support\Facades\Request::segment(1))){
//                 return 'active';
//             }else{
//                 return '';
//             }
//         }else{
//             if(
//                 preg_match('/'.$param1.'/i' , Illuminate\Support\Facades\Request::segment(1))
//                 &&
//                 preg_match('/'.$param2.'/i' , Illuminate\Support\Facades\Request::segment(2))
//             ){
//                 return 'active';
//             }else{
//                 return '';
//             }
//         }
//     }
// }

?>