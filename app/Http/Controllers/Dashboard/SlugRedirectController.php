<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use App\Models\SlugRedirect;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugRedirectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $redirects = SlugRedirect::all();
            return datatables()::of($redirects)
                ->addColumn('action', function ($row) {
                    return
                        "<div class='d-flex align-items-center justify-content-center gap-2'>"
                        .
                        "<a class='text-success' href='" . route('dashboard.slug-redirects.edit', $row['id']) . "'><i class='ri-pencil-line fs-4'></i></a>"
                        .
                        "<form data-id='" . $row['id'] . "'>
                            <input type='hidden' name='_method' value='DELETE'>
                            <input type='hidden' name='_token' value='" . csrf_token() . "'>
                            <button class='remove_button remove_button_action' type='button'><i class='ri-delete-bin-5-line text-danger fs-4'></i></button>
                        </form>"
                        .
                        "</div>";
                })
                ->editColumn('type', function ($row) {
                    return $row->type === 'blog'
                        ? '<span class="badge bg-info">' . __('dashboard.blogs') . '</span>'
                        : '<span class="badge bg-primary">' . __('dashboard.services') . '</span>';
                })
                ->rawColumns(['action', 'type'])
                ->make(true);
        }
        return view('dashboard.slug-redirects.index');
    }

    public function create()
    {
        return view('dashboard.slug-redirects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'from_slug' => 'required|string|max:255',
            'to_slug' => 'required|string|max:255',
            'type' => 'required|in:blog,service',
        ]);

        $data['from_slug'] = Str::slug($data['from_slug']);
        $data['to_slug'] = Str::slug($data['to_slug']);

        if ($data['from_slug'] === $data['to_slug']) {
            return response()->json(['errors' => ['to_slug' => [__('dashboard.redirect_same_slug')]]], 422);
        }

        if (SlugRedirect::where('from_slug', $data['from_slug'])->exists()) {
            return response()->json(['errors' => ['from_slug' => [__('validation.unique', ['attribute' => 'from_slug'])]]], 422);
        }

        // Verify target slug exists
        $exists = $data['type'] === 'blog'
            ? Blog::where('slug', $data['to_slug'])->exists()
            : Service::where('slug', $data['to_slug'])->exists();

        if (!$exists) {
            return response()->json(['errors' => ['to_slug' => [__('dashboard.redirect_target_not_found')]]], 422);
        }

        SlugRedirect::create($data);

        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.redirect_created'),
            'redirectUrl' => route('dashboard.slug-redirects.index'),
        ]);
    }

    public function edit($id)
    {
        $redirect = SlugRedirect::findOrFail($id);
        return view('dashboard.slug-redirects.edit', compact('redirect'));
    }

    public function update(Request $request, $id)
    {
        $redirect = SlugRedirect::findOrFail($id);

        $data = $request->validate([
            'from_slug' => 'required|string|max:255',
            'to_slug' => 'required|string|max:255',
            'type' => 'required|in:blog,service',
        ]);

        $data['from_slug'] = Str::slug($data['from_slug']);
        $data['to_slug'] = Str::slug($data['to_slug']);

        if ($data['from_slug'] === $data['to_slug']) {
            return response()->json(['errors' => ['to_slug' => [__('dashboard.redirect_same_slug')]]], 422);
        }

        if (SlugRedirect::where('from_slug', $data['from_slug'])->where('id', '!=', $redirect->id)->exists()) {
            return response()->json(['errors' => ['from_slug' => [__('validation.unique', ['attribute' => 'from_slug'])]]], 422);
        }

        $exists = $data['type'] === 'blog'
            ? Blog::where('slug', $data['to_slug'])->exists()
            : Service::where('slug', $data['to_slug'])->exists();

        if (!$exists) {
            return response()->json(['errors' => ['to_slug' => [__('dashboard.redirect_target_not_found')]]], 422);
        }

        $redirect->update($data);

        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.redirect_updated'),
        ]);
    }

    public function destroy($id)
    {
        $redirect = SlugRedirect::findOrFail($id);
        $redirect->delete();

        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.redirect_deleted'),
        ]);
    }
}
