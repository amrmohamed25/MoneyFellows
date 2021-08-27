<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Current;
use App\Models\User;
use App\Notifications\NotifyUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use phpDocumentor\Reflection\DocBlock\Serializer;

class CurrentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($current_id)
    {
        $user = Auth::user();
        if ($user->email != 'admin@admin.com') {
            $user->createOrGetStripeCustomer();
            if ($user->currents()->where('current_id', $current_id)->count() != 0 && Current::find($current_id)->no_of_members != DB::table('current_user')->where('current_id', $current_id)->pluck('months_left_to_be_paid')->count()) {
                Session::flash('message', "You have already registered this Category!!");
                return redirect(url('/') . '#pricing');
            } else {
                $category = Category::find($current_id);
                $current = Current::find($current_id);


                if ($current == null) {
                    $current = new Current;
                    $current->id = $current_id;
                    $current->name = $category->name;
                    $current->money = $category->money;
                    $current->months = $category->months;
                    $current->no_of_members = $category->no_of_members;
                    $current->save();
                } else {
                    while ($category->name != $current->name || $current->no_of_members === DB::table('current_user')->where('current_id', $current_id)->pluck('months_left_to_be_paid')->count()) {
                        $current_id = $current_id + 1;
                        $current = Current::find($current_id);
                        if ($current == null) {
                            $current = new Current;
                            $current->id = $current_id;
                            $current->name = $category->name;
                            $current->money = $category->money;
                            $current->months = $category->months;
                            $current->no_of_members = $category->no_of_members;
                            $current->save();
                            break;
                        }
                    }
                }
                $current = Current::find($current_id);
                $numbers = range(1, $current->no_of_members);
                $cur = DB::table('current_user')->where('current_id', $current_id)->pluck('months_left_to_be_paid')->toArray();
                $numbers = array_diff($numbers, $cur);
                return view('user', compact('user', 'numbers', 'current'));
            }
        } else {
            Session::flash('message', "Sorry admin can't register");
            return redirect(url('/#pricing'));
        }
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
        $user = Auth::user();
        $subscriptionfees = 0;
        $flag = 0;
        if (count($user->balanceTransactions()) == 0 && $user->currents()->count() == 0) {
            $subscriptionfees = 100;
            $flag = 1;
        }
        if ($user->email != 'admin@admin.com') {
            $current = Current::find($request->current_id);
            if ($user->currents()->where('current_id', $current->id)->count() === 0) {//check if user is already in it or not
                if (DB::table('current_user')->where('current_id', $request->current_id)->where('months_left_to_be_paid', $request->months_left_to_be_paid)->count() == 0) {
                    $user->currents()->attach($current, array('months_left_to_be_paid' => $request->months_left_to_be_paid, 'money' => $request->money + $subscriptionfees, 'is_paid' => 0));
                    if (Current::find($request->current_id)->no_of_members == DB::table('current_user')->where('current_id', $request->current_id)->pluck('months_left_to_be_paid')->count()) { // if it reached max number of members, then set due date(gam3eya started)
                        $current = Current::find($request->current_id);
                        $current->due_date = Carbon::now()->addMonth()->addDay()->format('Y-m-d');
                        $current->save();
                        $data = [
                            'body' => 'You received a new notification',
                            'text' => 'Category #' . $current->id . ': ' . $current->name . ' started with a due date ' . $current->due_date,
                            'url' => url('/gam3yatk'),
                            'thankyou' => 'Thank you'
                        ];
                        foreach ($current->users as $user) {
                            $user->notify(new NotifyUser($data));
                        }
                    }
                } else {
                    Session::flash('message', "Sorry someone registered this number of months!!Try Again");
                    return redirect(url('/') . '#pricing');
                }
                if ($flag == 1) {
                    Session::flash('message', "Category registered successfully with extra 100 egp (subcription fees 'only once per account')");
                } else {
                    Session::flash('message', "Category registered successfully");
                }
                return redirect(url('/gam3yatk'));
            } else {
                Session::flash('message', "You have already registered this Category!!");
                return redirect(url('/') . '#pricing');
            }

        } else if ($user->email == 'admin@admin.com') {
            Session::flash('message', "Admin can't register a category!!");
            return redirect(url('/') . '#pricing');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Current $current
     * @return \Illuminate\Http\Response
     */
    public
    function show($current_id)
    {
        $current = Current::find($current_id);
        $user = Auth::user();

        if (Auth::user()->email != 'admin@admin.com' && Auth::user()->currents()->where('current_id', $current_id)->count() != 0) {
            $temp = null;
            $money = null;
            foreach ($user->currents as $current) {
                if ($current->id == $current_id) {
                    $money = $current->pivot->money;
                    if ($current->pivot->is_paid == 0) {
                        $temp = 1;
                    }
                    break;
                }
            }
            if ($temp == 1) {
                $intent = auth()->user()->createSetupIntent();
                return view('payment', compact('current', 'intent', 'money'));
            } else {
                Session::flash('message', "You already paid this category");
                return redirect(url('/gam3yatk'));
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Current $current
     * @return \Illuminate\Http\Response
     */
    public function edit($current_id)
    {
        $user = Auth::user();
        $current = Current::find($current_id);
        if ($current != null) {
            if ($user->email == "admin@admin.com") {
                if ($current->users()->count() == 0) {
                    $numbers = range(1, $current->no_of_members);
                    $cur = DB::table('current_user')->where('current_id', $current_id)->pluck('months_left_to_be_paid')->toArray();
                    $numbers = array_diff($numbers, $cur);
                    return view('edit', compact('numbers', 'current', 'user'));
                } else {
                    Session::flash('message', "Admin can't modify a category that has members in it!!");
                    return redirect(url('/dashboard'));
                }
            } elseif ($current != $user->currents()->find($current_id)->first()) {
                Session::flash('message', "You didn't register in this category!!");
                return redirect(url('/gam3yatk'));
            } elseif ($current->no_of_members == DB::table('current_user')->where('current_id', $current_id)->pluck('months_left_to_be_paid')->count()) {
                Session::flash('message', "Full category so can't edit!!");
                return redirect(url('/gam3yatk'));
            } else {
                $numbers = range(1, $current->no_of_members);
                $cur = DB::table('current_user')->where('current_id', $current_id)->pluck('months_left_to_be_paid')->toArray();
                $numbers = array_diff($numbers, $cur);
                return view('edit', compact('numbers', 'current', 'user'));
            }
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Current $current
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $current = Current::find($request->current_id);
        if ($current == null || ($user->email != 'admin@admin.com' && $user->currents()->find($request->current_id) == null)) {
            Session::flash('message', "Error!!");
            return redirect()->back();
        } else {

            if ($user->email != 'admin@admin.com') {
                foreach ($user->currents as $current) {
                    if ($current->id = $request->current_id) {
                        $current->pivot->months_left_to_be_paid = $request->months_left_to_be_paid;
                        $current->pivot->save();
                        Session::flash('message', "Category updated successfully!!");
                        return redirect(url('/gam3yatk'));
                    }
                }
            } else {
                if ($request->months % $request->no_of_members != 0 || $request->months <= $current->users()->count()) {
                    Session::flash('message', "Months should be divisible by Members!!");
                    return redirect()->back();
                } else {
                    $current->months = $request->months;
                    $current->name = $request->current_name;
                    $current->money = $request->money;
                    $current->no_of_members = $request->no_of_members;
                    $current->save();
                    Session::flash('message', "Category updated successfully!!");
                    return redirect(url('/gam3yatk'));
                }

            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Current $current
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($current_id)
    {
        $user = Auth::user();
        $current = Current::find($current_id);
        if ($current != null) {
            if ($user->email == 'admin@admin.com') {
                if ($current->users()->count() == 0 || $current->months == 0) {
                    if ($current->months == 0) {
                        foreach ($current->users as $use)
                            $use->currents()->detach($current_id);
                    }
                    $order = 1;
                    $current->delete();
                    $records = DB::table('current_user')->get();
                    foreach ($records as $row) {
                        DB::table('current_user')->where('id', $row->id)->update(['id' => $order]);
                        $order++;
                    }
                    Session::flash('message', "Category removed successfully!!");
                    return redirect(url('/gam3yatk'));
                } else {
                    Session::flash('message', "Category has members so it cant be removed!!");
                    return redirect(url('/gam3yatk'));
                }
            } else {

                if ($current->no_of_members != DB::table('current_user')->where('current_id', $current_id)->pluck('months_left_to_be_paid')->count()) {
                    $user->currents()->detach($current_id);
                    Session::flash('message', "Category removed successfully!!");
                    return redirect(url('/gam3yatk'));
                } else {
                    Session::flash('message', "Category can't be removed since it is full so it started!!");
                    return redirect(url('/gam3yatk'));
                }
            }
        } else {
            Session::flash('message', "Error!!");
            return redirect(url('/gam3yatk'));
        }
    }

    public
    function checkout($current_id)
    {
        $user = Auth::user();

        foreach ($user->currents as $current) {
            if ($current->id == $current_id) {
                if ($current->pivot->is_paid == 1) {
                    Session::flash('message', "You already paid this category!!");
                } else {
                    $current->pivot->is_paid = 1;

                    $user->applyBalance($current->pivot->money * -100, 'Decrease');
                    $admin = User::where('email', 'admin@admin.com')->first();
                    $fees = $current->pivot->money - $current->money;
                    if ($fees != 0)
                        $admin->applyBalance($fees * 100, 'Increase');
                    $current->pivot->money = $current->money;
                    $current->pivot->save();
                    Session::flash('message', "Paid Successfully!!");
                }
            }
        }
        return redirect(url('/gam3yatk'));
    }

}
