<?php



function uploadImage($folder,$image){
    $image->store('/images', $folder);
    $filename = $image->hashName();
    return  $filename;
}


function remove_previous($image)
{
    if(!empty($image)){
        $image_path = public_path().'/uploads/images/'.$image;
        if(file_exists($image_path)){
            unlink($image_path);
        }
    }

} //end of remove_previous function



function remove_image($folder,$image)
{
    Storage::disk($folder)->delete($image);

} //end of remove_previous function

function image_path($val)
{
    return asset('uploads/images/'. $val);
}

