<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ServiceController extends Controller
{
    public function index()
    {
        return view('admin.services.index', [
            'services' => Service::oldest()->paginate(5)
        ]);
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $request->request->add(['slug' => Str::slug($request->slug)]);
        $this->validate(request(), [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => 'required|unique:services',
            'description' => 'required',
            'imagen' => 'required',
        ]);

        Service::create([
            'title' => request('title'),
            'subtitle' => request('subtitle'),
            'slug' => request('slug'),
            'description' => request('description'),
            'imagen' => request('imagen'),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Servicio creado correctamente');
    }

    public function edit(Service $service)
    {

        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {

        $request->request->add(['slug' => Str::slug($request->slug)]);
        $this->validate(request(), [
            'title' => 'required',
            'subtitle' => 'required',
            'slug' => ['required', Rule::unique('services')->ignore($service->id)],
            'description' => 'required',
            'imagen' => 'required',
        ]);

        $service->update([
            'title' => request('title'),
            'subtitle' => request('subtitle'),
            'slug' => request('slug'),
            'description' => request('description'),
            'imagen' => request('imagen'),
        ]);


        return redirect()->route('admin.services.index')->with('success', 'Servicio actualizado correctamente');
    }

    public function destroy(Service $service)
    {

        if ($service->status == 'ACTIVE') {
            $service->update(['status' => 'INACTIVE']);
            return redirect()->route('admin.services.index')->with('success', 'Servicio desactivado correctamente');
        } else {
            $service->update(['status' => 'ACTIVE']);
            return redirect()->route('admin.services.index')->with('success', 'Servicio activado correctamente');
        }
    }

    public function status($id)
    {
        $service = Service::find($id);
        if ($service->status == 'ACTIVE') {
            $service->update(['status' => 'INACTIVE']);
            return redirect()->route('admin.services.index')->with('success', 'Servicio desactivado correctamente');
        } else {
            $service->update(['status' => 'ACTIVE']);
            return redirect()->route('admin.services.index')->with('success', 'Servicio activado correctamente');
        }
    }

    // mostrar en vista general

    public function services()
    {
        $services = Service::where('status', 'ACTIVE')->paginate(6);
        return view('servicios', compact('services'));
    }

    public function show($slug)
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('includes.services.show', compact('service'));
    }
}
