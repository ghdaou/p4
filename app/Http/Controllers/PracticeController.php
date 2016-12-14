<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Carbon;
use App\Book;
use App\Author;
use App\Auth;
use App\Reservation;
use App\Event;
use App\PickupLocation;

class PracticeController extends Controller
{
    public function example19() {

        return view('datepicker');

    }

    public function example18() {
        dump (PickupLocation::all());
    }

    public function example17() {
        $reservations = Reservation::where('user_id', '=', '1')->get();

        # Make sure we have results before trying to print them...
        if($reservations) {

                dump ($reservations);
            }

        else {
                echo 'You have no reservations';
        }
    }

    public function example16() {
        $author_id = Author::where('last_name','=', 'Fitzgerald')->pluck('id')->first();
        dump($author_id);
    }


    #Remove any books by the author “J.K. Rowling”
    public function example15() {
        $books = Book::where('author', 'LIKE', 'J.K. Rowling')->get();

        # If we found the book, delete it
        if($books) {

            foreach ($books as $book) {

                $book->delete();
            }

            return "Deletion complete; check the database to see if it worked...";

        }
        else {
            return "Can't delete - Book not found.";
        }
    }


    #Find any books by the author Bell Hooks and update the author name to be bell hooks (lowercase).
    public function example14() {

        $books = Book::where('author', 'LIKE', 'Bell Hooks')->get();
        if($books) {

            foreach ($books as $book) {
                $book->author = 'bell hooks';
                $book->save();
            }

            return "Change completed; check the database to see if it worked...";

        }
        else {
            return " - Book not found.";
        }
    }

    #Retrieve all the books in descending order according to published date
    public function example13() {

        $books = Book::orderBy('published','descending')->get();
        if(!$books->isEmpty()) {
            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }else
            { echo "No books found";}
    }

    #Retrieve all the books in alphabetical order by title.
    public function example12() {

        $books = Book::orderBy('title' , 'asc')->get();
        if(!$books->isEmpty()) {
            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }else
            { echo "No books found";}    }

    # Retreive all books published after 1950
    public function example11() {

        $books = Book::where('published' , '>=' , '1990')->get();

        if(!$books->isEmpty()) {
            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
            }
        }else
            { echo "No books found";}
    }

    # Retreive the last five books that were added to list
    public function example10() {
        $i = 0;
        $books = Book::orderBy('id','descending')->get();
        # If we found books
        if(!$books->isEmpty()) {
            # Output the books
            foreach($books as $book) {
                echo $book->title.'<br>';
                if ($i == 4) {break;}
                $i++;
            }
        }
        else {
            echo "No books found";
        }

    }

    #deleting a book
    public function example9() {
    # First get a book to delete
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        # If we found the book, delete it
        if($book) {

            # Goodbye!
            $book->delete();

            return "Deletion complete; check the database to see if it worked...";

        }
        else {
            return "Can't delete - Book not found.";
        }
    }

    public function example8() {
    # First get a book to update
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        # If we found the book, update it
        if($book) {

            # Give it a different title
            $book->title = 'The Not NOT Really Great Gatsby';

            # Save the changes
            $book->save();

            echo "Update complete; check the database to see if your update worked...";
        }
        else {
            echo "Book not found, can't update.";
        }
    }

    public function example7() {
        # where() is the constraint method
        # first() is the fetch method
        $book = Book::where('author', 'LIKE', '%sylvia%')->first();

        if($book) {
            return $book->title;
        }
        else {
            return 'Book not found.';
        }
    }

        public function example6() {
            $books = Book::all();

            # Make sure we have results before trying to print them...
            if(!$books->isEmpty()) {

                # Output the books
                foreach($books as $book) {
                    echo $book->title.'<br>';
                }
            }
            else {
                echo 'No books found';
            }

        }

        /**
    	*
    	*/
        public function example5() {
            # Instantiate a new Book Model object
            $book = new Book();

            # Set the parameters
            # Note how each parameter corresponds to a field in the table
            $book->title = 'Harry Potter';
            $book->author = 'Bells Hooks';
            $book->published = 1997;
            $book->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
            $book->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

            # Invoke the Eloquent save() method
            # This will generate a new row in the `books` table, with the above data
            $book->save();

        }
        /**
    	*
    	*/
        public function example4() {
            $random = new \Random();
            return $random->getRandomString(8);
        }
        /**
    	*
    	*/
        public function example3() {
            echo \App::environment();
            echo 'App debug: '.config('app.debug');
        }
        /**
    	* Demonstrates useful data output methods like dump, and dd
    	*/
        public function example2() {
            $fruits = ['apples','oranges','pears'];
            dump($fruits);
            var_dump($fruits);
            dd($fruits);
        }
        /**
    	*
    	*/
        public function example1() {
            #return \Calendar::generate(2016);;

        }
        /**
    	* Display an index of all available index methods
    	*/
        public function index() {
            # Get all the methods in this class
            $actionsMethods = get_class_methods($this);
            # Loop through all the methods
            foreach($actionsMethods as $actionMethod) {
                # Only if the method includes the word "example"...
                if(strstr($actionMethod, 'example')) {
                    # Display a link to that method's route
                    echo '<a target="_blank" href="/practice/'.str_replace('example','',$actionMethod).'">'.$actionMethod.'</a>';
                }
            }
        }
}
