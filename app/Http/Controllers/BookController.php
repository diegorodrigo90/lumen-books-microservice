<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Book;
use DB;

class BookController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return a list of books.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {

        $books = Book::all();
        return $this->successResponse($books);
    }

    /**
     * Create a new book.
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:255',
            'gender' => 'required|max:255|in:male,female',
            'country' => 'required|max:255'
        ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());

        return $this->successResponse("Book " . $book->name . " created with id: " . $book->id, Response::HTTP_CREATED);
    }

    /**
     * Display details about one book.
     *
     * @return illuminate\Http\Response
     */
    public function show($bookId)
    {
        $book = Book::findOrFail($bookId);
        return $this->successResponse($book);
    }

    /**
     * Update details about one book.
     *
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $bookId)
    {
        $rules = [
            'name' => 'max:255',
            'gender' => 'max:7|in:male,female',
            'country' => 'max:255'
        ];

        $this->validate($request, $rules);
        $book = Book::findOrFail($bookId);

        $book->fill($request->all());

        if ($book->isClean()) {
            DB::rollback();
            return $this->errorResponse("At least on value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();
        return $this->successResponse($book, Response::HTTP_OK);
    }

    /**
     * Delete one book.
     *
     * @return illuminate\Http\Response
     */
    public function destroy($bookId)
    {

        $book = Book::findOrFail($bookId);

        $book->delete();

        return $this->successResponse($book->name . " with id " . $book->id . " has ben deleted.", Response::HTTP_OK);
    }
}
