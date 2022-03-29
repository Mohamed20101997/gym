<?php

namespace App\Rules;

use App\FollowUp;
use App\Meal;
use Illuminate\Contracts\Validation\Rule;

class meal_unique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $cat_id;
    protected $id;
    public function __construct($cat_id , $id=null)
    {
        $this->cat_id = $cat_id;
        $this->id = $id;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if(!empty($this->id)){
            $follow = Meal::where([[$attribute,$value],['category_id',$this->cat_id],['id', '!=', $this->id]])->first();
        }else{
            $follow = Meal::where([[$attribute,$value],['category_id',$this->cat_id]])->first();
        }

        if($follow){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This value existed before';
    }
}
