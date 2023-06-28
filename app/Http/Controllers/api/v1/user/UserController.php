<?php

namespace App\Http\Controllers\api\v1\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Http\Resources\user\UserResource;
use App\Http\Filters\user\UserFilter;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return UserFilter::excecute($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create(
            $validated
        );
        return response(['message' => 'User created'], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
        return response(['message' => 'User modified'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response(['message' => 'User deleted'], 204);
    }

    /*protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }*/

    public function uploadProfilePicture(Request $request)
    {
        $this->validate($request, [
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
   
        $image = $request->file('profile_picture');
        $imageName = time().'.'.$image->extension();
       
        $destinationPathThumbnail = public_path('../public/files/thumbnails');
        $img = Image::make($image->path());
        $img->resize(300, 300, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPathThumbnail.'/'.$imageName);
     
        return ['path' => 'files/thumbnails/'.$imageName];
    }

    public function password(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->password = bcrypt($request->password);
        $user->save();
        return response(['message' => 'Contraseña modificada con éxito'], 201);
    }
}

