<?php

namespace App\Http\Controllers\Site;

use App\Models\City;
use App\Models\Image;
use App\Models\Estate;
use App\Models\Feature;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Site\EstateRequest;

class EstateController extends Controller
{
    public function index()
    {
        $estates =auth()->user()->estates()->where('is_completed', 1)->with('images')->latest()->get();
        return view('site.profile.my-estate', compact('estates'));
    }


    public function create()
    {

        $estate = auth()->user()->estates()->where('is_completed', 0)->first();
        $step = $estate->step ?? 1;

        $requestedStep = request()->step;

        if ($requestedStep && $requestedStep <= $step) {
            $step = $requestedStep;
        }


        return view('site.estate.create' , compact('step' , 'estate' ));
    }


    public function store(EstateRequest $request)
    {

        switch ($request->step) {
            case 1:
                $this->StepOne($request);
                break;
            case 2:
                $this->StepTwo($request);
                break;
            case 3:
                $this->StepThree($request);
                break;
            case 4:
                $this->StepFour($request);
                break;
            case 5:
                $this->StepFive($request);
                break;
            case 6:
                //check if the images is less than 5

                $estate = $this->getEstate();
                if ($estate->images->count() < 5) {
                    return redirect()->route('site.estate.create', ['step' => 3])->with('error', __('يجب ان يكون عدد الصور 5 على الاقل') );
                }

                $this->StepSix();


                return redirect()->route('site.home')->with('success', __('Estate created successfully'));
                break;
            default:
                 return redirect()->route('site.estate.create', ['step' => 1]);
                break;
        }

        return redirect()->route('site.estate.create', ['step' => $request->step + 1]);
    }



    private function StepOne(EstateRequest $request , $id = null)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        //if the id is exist update the estate
        $estate = $this->getStateFromUpdateOrCreate($id);

        if ($estate) {
            // Update the existing estate
            $estate->update($data);
            return;
        }

        // Set the step to 2 for the new estate
        $data['step'] = 2;
        Estate::create($data);
    }




    private function StepTwo($request , $id = null)
    {
        $data = $request->validated();
        //check if the step is 2
        $estate = $this->getStateFromUpdateOrCreate($id);

        if ($estate->step == 2) {

            $data['step'] = 3;
         }
        $estate->update($data);
    }

    private function StepThree($request , $id = null){

        $estate = $this->getStateFromUpdateOrCreate($id);


        $images = $request->file('images') ?? [];
      //  array_pop($images);

        foreach($images as $image){

            $path = Storage::disk('public')->put('images', $image);
            $estate->images()->create([
                'path' => $path,
            ]);
        }
        if ($estate->step == 3) {
            $data['step'] = 4 ;
        }else{
            $data['step'] = $estate->step ;
        }

        $estate->update([
            'feature_ids' => $request->feature_ids,
            'step' => $data['step'],
        ]);

    }


    private function StepFour($request , $id = null)
    {
        $estate = $this->getStateFromUpdateOrCreate($id);


        $data = $request->validated();
        if ($estate->step == 4) {
            $data['step'] = 5 ;
        }else{
            $data['step'] = $estate->step ;
        }
        $estate->update($data);
    }

    private function StepFive($request , $id = null)
    {

        $estate = $this->getStateFromUpdateOrCreate($id);

        if (!$request->hasFile('tourism_ministry')) {
            return;
        }

        $path = Storage::disk('public')->put('tourism_ministry', $request->file('tourism_ministry'));

        if ($estate->step == 5) {
            $data['step'] = 6 ;
        }else{
            //delete the old file if exists

            Storage::disk('public')->delete($estate->tourism_ministry);


            $data['step'] = $estate->step ;
        }

        $estate->update([
            'tourism_ministry' => $path,
            'step' => $data['step'],
        ]);
    }

    private function StepSix()
    {
        $estate = $this->getEstate();
        $estate->update([
            'is_completed' => 1,
        ]);

    }


    public function edit($id)
    {
        $estate = auth()->user()->estates()->where('id', $id)->where('is_completed', 1)->firstOrFail();
        $step =  Request()->step ?? 1;
        return view('site.estate.edit', compact('estate' , 'step' ));
    }

    public function update(EstateRequest $request, $id)
    {
        // dd($request->all());
        switch ($request->step) {
            case 1:
                $this->StepOne($request , $id);
                break;
            case 2:
                $this->StepTwo($request , $id);
                break;
            case 3:
                $this->StepThree($request , $id);
                break;
            case 4:
                $this->StepFour($request , $id);
                break;
            case 5:
                $this->StepFive($request , $id);
                break;


        }

        return redirect()->route('site.estate.edit', ['step' => $request->step , 'id' => $id])->with('success', __('Estate updated successfully'));
    }




    public function destroy($id)
    {
        $estate = auth()->user()->estates()->where('id', $id)->firstOrFail();
        $estate->delete();
        // if ($estate) {

        // }
        return redirect()->route('site.estate.index')->with('success', __('Estate deleted successfully'));
    }

    private function getEstate(){
        return $estate = auth()->user()->estates()->where('is_completed', 0)->first();
        if (!$estate) {
            return redirect()->route('site.estate.create');
        }
    }

    private function getStateFromUpdateOrCreate($id){
        if ($id) {
            $estate = auth()->user()->estates()->where('id', $id)->firstOrFail();
        }else{
            $estate = auth()->user()->estates()->where('is_completed', 0)->first();
        }
        return $estate;
    }

    public function deleteImage($id , $estate_id)
    {

        $estate = Estate::where('id', $estate_id)->where('user_id', auth()->id())->first();
        if ($estate->images()->count() <= 5 && $estate->step > 3 ) {
            return \response()->json([ 'message' => __('يجب ان يكون عدد الصور 5 على الاقل') , 'status' => 'error']);
        }
        $image = Image::where('id', $id)->first();

        Storage::disk('public')->delete($image->path);
        $image->delete();
        return \response()->json([ 'id' => $id ]);
    }


    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);



        $path = Storage::disk('public')->put('images', $request->file('image'));
        $image = Image::create([
            'path' => $path,
            'estate_id' => $request->id,
        ]);
        $image_path = asset('storage/' . $image->path);
        $image->image_path = $image_path;
        return response()->json($image);
    }


}
