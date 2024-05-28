<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Message;
use App\Models\Pricing;
use App\Models\service;
use App\Models\PrevEvents;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $prevs = PrevEvents::all();
        $services = service::all();
        $abouts = About::all();
        $pricings = Pricing::all();
        return view('home.index', compact('prevs', 'services', 'abouts', 'pricings'));
    }
    public function admin()
    {
        $prevs = PrevEvents::all();
        $services = service::all();
        $abouts = About::all();
        $pricings = Pricing::all();
        $messages = Message::all();
        return view('home.admin', compact('prevs', 'services', 'abouts', 'pricings', 'messages'));
    }
    public function prevEvents()
    {
        return view('prevevents.create');
    }
    public function storeEvents(Request $request)
    {
        $request->validate([
            'image1' => 'required|mimes:png,jpg,jpeg|max:10000',
            'image2' => 'required|mimes:png,jpg,jpeg|max:10000',
            'image3' => 'required|mimes:png,jpg,jpeg|max:10000',
            'image4' => 'required|mimes:png,jpg,jpeg|max:10000',
            'image5' => 'required|mimes:png,jpg,jpeg|max:10000',
            'image6' => 'required|mimes:png,jpg,jpeg|max:10000',
        ]);
        $images = [];
        for ($i = 1; $i <= 6; $i++) {
            $image = $request->file('image' . $i);
            $imageName = time() . '_image' . $i . '.' . $image->extension();
            $image->move(public_path('all_storages'), $imageName);
            $images['image' . $i] = $imageName;
        }

        $prev = new PrevEvents();
        foreach ($images as $key => $value) {
            $prev->$key = $value;
        }
        $prev->save();

        return redirect()->route('home.admin')->with('success', 'Event Images Uploaded Successfully');
    }
    public function editEvents($id)
    {
        $prev = PrevEvents::find($id);
        return view('prevevents.update', compact('prev'));
    }
    public function updateEvents(Request $request, $id)
    {
        $request->validate([
            'image1' => 'nullable|mimes:png,jpg,jpeg|max:10000',
            'image2' => 'nullable|mimes:png,jpg,jpeg|max:10000',
            'image3' => 'nullable|mimes:png,jpg,jpeg|max:10000',
            'image4' => 'nullable|mimes:png,jpg,jpeg|max:10000',
            'image5' => 'nullable|mimes:png,jpg,jpeg|max:10000',
            'image6' => 'nullable|mimes:png,jpg,jpeg|max:10000',
        ]);

        $prev = PrevEvents::find($id);
        if (!$prev) {
            return redirect()->route('home.admin')->with('error', 'Event not found');
        }

        for ($i = 1; $i <= 6; $i++) {
            $imageKey = 'image' . $i;
            if ($request->hasFile($imageKey)) {
                $image = $request->file($imageKey);
                $imageName = time() . '_' . $imageKey . '.' . $image->extension();
                $image->move(public_path('all_storages'), $imageName);
                $prev->$imageKey = $imageName;
            }
        }

        $prev->save();

        return redirect()->route('home.admin')->with('success', 'Event Images Updated Successfully');
    }
    public function destroy($id)
    {
        $prev = PrevEvents::find($id);

        if (!$prev) {
            return redirect()->route('home.admin')->with('error', 'Event not found');
        }

        for ($i = 1; $i <= 6; $i++) {
            $imageKey = 'image' . $i;
            if ($prev->$imageKey) {
                $imagePath = public_path('all_storages/' . $prev->$imageKey);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
        }

        $prev->delete();

        return redirect()->route('home.admin')->with('success', 'Event deleted successfully');
    }
    public function services()
    {
        return view('service.create');
    }
    public function storeService(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $service = new service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('home.admin')->with('success', 'Service added successfully');
    }
    public function editService($id)
    {
        $service = service::find($id);
        return view('service.update', compact('service'));
    }
    public function updateService(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $service = service::find($id);
        if (!$service) {
            return redirect()->route('home.admin')->with('error', 'Service not found');
        }

        $service->title = $request->title;
        $service->description = $request->description;
        $service->save();

        return redirect()->route('home.admin')->with('success', 'Service updated successfully');
    }
    public function destroyService($id)
    {
        $service = service::find($id);

        if (!$service) {
            return redirect()->route('home.admin')->with('error', 'Service not found');
        }

        $service->delete();

        return redirect()->route('home.admin')->with('success', 'Service deleted successfully');
    }
}
