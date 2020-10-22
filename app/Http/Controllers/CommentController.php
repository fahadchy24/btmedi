<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function productReview(Request $request, $id)
    {
        $review = new Comment();
        $review->product_id = $id;
        $review->name = $request->name;
        $review->email = $request->name;
        $review->details = $request->details;
        $review->rating = $request->rating;

        $success = $review->save();
        if ($success) {
            $notification=array(
             'message' => 'Thank you for your review.',
             'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }

        // $success = Comment::insert($data);
        // if ($success) {
        //     $notification=array(
        //      'message' => 'Thank you for your comment.',
        //      'alert-type' => 'success'
        //     );
        //     return redirect()->back()->with($notification);
        // }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('product')->get();
        return view('backend.comment.index', compact('comments'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comments = Comment::with('product')->findOrFail($id);
        return view('backend.comment.view', compact('comments'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments = Comment::with('product')->findOrFail($id);

        $success = $comments->delete();
        if ($success) {
            $notification=array(
             'message' => 'Comment has been deleted.',
             'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }



    // Activa Status Functions
    public function status($id, $status)
    {
        $brand = Comment::find($id);
        $brand->status = $status;

        $brand->save();

        return response()->json();

    }
}
