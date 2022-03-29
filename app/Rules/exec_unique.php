<?php

namespace App\Rules;

use App\Exercise;
use App\FollowUp;
use App\Meal;
use Illuminate\Contracts\Validation\Rule;

class exec_unique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $follow_id;
    protected $id;
    public function __construct($follow_id , $id=null)
    {
        $this->follow_id = $follow_id;
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
            $follow = Exercise::where([[$attribute,$value],['follow_up_id',$this->follow_id],['id', '!=', $this->id]])->first();
        }else{
            $follow = Exercise::where([[$attribute,$value],['follow_up_id',$this->follow_id]])->first();
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
