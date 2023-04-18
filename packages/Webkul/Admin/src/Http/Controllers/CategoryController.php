<?php

namespace Webkul\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webkul\Admin\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \Webkul\Admin\Repositories\CategoryRepository  $categoryRepository
     * 
     * @return void
     */
    public function __construct(
        protected CategoryRepository $categoryRepository
    )
    {}

    /**
     * Display category Resources listing.
     */
    public function index(): \Illuminate\View\View
    {
        $all = $this->categoryRepository->all();
        
        return view('admin::category.index', compact('all'));
    }

    /**
     * Create a new category
     */
    public function create(): \Illuminate\View\View
    {
        $all = $this->categoryRepository->all();

        return view('admin::category.create', compact('all'));
    }

    /**
     * Store the form for creating a new category.
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        request()->merge([
            'slug' => str()->slug($request->input('name'))
        ]);

        $this->validate($request, [
            'name' => 'required',
            'slug' => 'unique:categories,slug,',
        ]);

        $this->categoryRepository->create(request()->all());

        session()->flash('flash.banner', __('Category is created successfully.'));

        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('category.index');
    }

    /**
     * Delete the specified category.
     *
     * @param  int  $id
     */
    public function destroy($id): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->categoryRepository->findOrFail($id);

            $this->categoryRepository->delete($id);

            session()->flash('flash.bannerStyle', 'success');

            return redirect()->route('category.index');
        } catch (\Exception $e) {
            session()->flash('flash.banner', __('This category can not be deleted.'));

            session()->flash('flash.bannerStyle', 'danger');

            return redirect()->route('category.index');
        }  

    }
}
