<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Current;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->months % $request->no_of_members != 0) {
            Session::flash('message', "Error!!! Months should be divisble by members");
            return redirect()->back();
        } else if (Auth::user()->email == 'admin@admin.com') {
            if (DB::table('categories')->count() != 0) {
                for ($i = 1; $i <= DB::table('categories')->latest('id')->first()->id + 1; $i++) {
                    $category = Category::find($i);
                    if ($category == null) {
                        $category = new Category;
                        $category->id = $i;
                        $category->name = $request->name;
                        $category->money = $request->money;
                        $category->months = $request->months;
                        $category->no_of_members = $request->no_of_members;
                        $category->save();
                        Session::flash('message', "Category registered successfully");
                        return redirect(url('/dashboard'));
                    }
                }
            } else {
                $category = new Category;
                $category->id = 1;
                $category->name = $request->name;
                $category->money = $request->money;
                $category->months = $request->months;
                $category->no_of_members = $request->no_of_members;
                $category->save();
                return redirect(url('/dashboard'));
            }

        } else {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        $category = Category::find($id);
        if ($category != null) {
            if ($user->email == "admin@admin.com") {
                $current = Current::where('name', $category->name)->where('due_date', null)->first();
                if ($current != null) {
                    $count = $current->users()->count();
                    if ($count == 0)
                        return view('edit-category', compact('category'));
                    else {
                        Session::flash('message', "This category is shared by a gam3eya that hasn't started so it can't be edited till the gam3eya start");
                        return redirect(url('/dashboard'));
                    }
                } else {
                    return view('edit-category', compact('category'));
                }
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $category = Category::find($request->category_id);
        if ($category == null || Auth::user()->email != 'admin@admin.com') {
            Session::flash('message', "Error!!");
        } else {
            $category->months = $request->months;
            $category->name = $request->category_name;
            $category->money = $request->money;
            $category->no_of_members = $request->no_of_members;
            if ($category->months % $category->no_of_members != 0) {
                Session::flash('message', "Months should be divisible by members!!");
                return redirect()->back();
            } else {
                $category->save();
                Session::flash('message', "Category updated successfully!!");
                return redirect(url('/dashboard'));
            }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
        $user = Auth::user();
        $category = Category::find($id);
        if ($category != null && $user->email == 'admin@admin.com') {
            $current = Current::where('name', $category->name)->where('due_date', null)->first();
            if ($current != null) {
                $count = $current->users()->count();
                if ($count == 0) {
                    $category->delete();
                    $current->delete();
                    Session::flash('message', "Category and gam3eya removed successfully!!");
                    return redirect(url('/dashboard'));
                } else {
                    Session::flash('message', "This category is shared by a gam3eya that hasn't started so it can't be deleted till the gam3eya start");
                    return redirect(url('/dashboard'));
                }
            } else {
                $category->delete();
                Session::flash('message', "Category removed successfully!!");
                return redirect(url('/dashboard'));
            }
        } else {
            return redirect()->back();
        }
    }
}
