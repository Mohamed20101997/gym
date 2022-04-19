@if (count($followUps) > 0)
<option value="">Select FollowUp</option>
    @foreach ($followUps as $followUp)
        <option value="{{ $followUp->id }}" {{ old('follow_up_id' , $followUp_id) == $followUp->id ? 'selected' : '' }}>
            {{ $followUp->name }}</option>
    @endforeach

 @else
 <option value="">not found FollowUp</option>
@endif
