<?php

namespace App\Http\Controllers;

use App\Review;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::with('review_owner')->has('review_owner')->get();
        return view('review.index', ['reviews' => $reviews]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'product_id'   => 'numeric|required', //might be bad
            'rating'       => 'numeric|gt:0|lt:6|required',
            'review'       => 'string|max:255',
            'haspurchased' => 'required'
        ];

        $custommsg = [
            'required'=>'You cannot leave a review for something you have not purhcased!'
        ];
        $request->request->remove('haspurchased');

        $user = Auth::user();
        //has the user previously bought the item in question
        foreach($user->orders as $order) {
            if($order->products->contains($request['product_id'])){
                //user has previously purchased the item
                $request->request->add(['haspurchased'=>true]);
            }
        }
        $validator = Validator::make($request->all(), $rules,$custommsg);
        $validator->validate();

        Review::create(array_merge($request->all(), ['reviewer_id' => $user->id]));
        $request->session()->flash('status', "Review created!");
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('review.show',['review' => $review]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('review.edit',['review' => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {

        $rules = [
            'rating'=>'numeric|gt:0|lt:6|required',
            'review'=>'string|max:255'
        ];

        $this->validate($request,$rules);
        $review->update($request->all());
        $review->save();
        $request->session()->flash('status', "Review updated");
        return redirect()->route('reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Review $review)
    {
        $review->delete();
        $request->session()->flash('status', "Review deleted");
        return redirect()->route('reviews.index');
    }
}
