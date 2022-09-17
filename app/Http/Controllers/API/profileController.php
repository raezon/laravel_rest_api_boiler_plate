<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Profile;
use App\Http\Resources\Profile as ProfileResource;
use Illuminate\Support\Facades\Storage;
   
class ProfileController extends BaseController
{
    public function index()
    {
        $profiles = Profile::all();
        return $this->sendResponse(ProfileResource::collection($profiles), 'Profile fetched.');
    }
    
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name'=>'required',
            'surname'=>'required',
            'age'=>'required',
            'job'=>'required',
            'dateOfBirth'=>'required'
        ]);
        $pictureName = Storage::disk('public')->put('profile', $request->photo);

        $input['photo']=$pictureName;

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $profile = Profile::create($input);
     
        return $this->sendResponse(new ProfileResource($profile), 'Profile created.');
    }
   
    public function show($id)
    {
        $profile = Profile::find($id);
        if (is_null($blog)) {
            return $this->sendError('Profile does not exist.');
        }
        return $this->sendResponse(new ProfileResource($blog), 'Post fetched.');
    }
    
    public function update(Request $request, Profile $profile)
    {
        $input = $request->all();
        $pictureName = Storage::disk('public')->put('products', $request->photo);
        
        $validator = Validator::make($input, [
            'name'=>'required',
            'surname'=>'required',
            'age'=>'required',
            'job'=>'required',
            'dateOfBirth'=>'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $profile->name = $input['name'];
        $profile->surname = $input['surname'];
        $profile->age = $input['age'];
        $profile->job = $input['job'];
        $profile->dateOfBirth = $input['dateOfBirth'];
        if($pictureName)
        $profile->photo=$pictureName;
        $profile->save();
        
        return $this->sendResponse(new ProfileResource($profile), 'Profile updated.');
    }
   
    public function destroy(Profile $profile)
    {
        $profile->delete();
        return $this->sendResponse([], 'Profile deleted.');
    }
}