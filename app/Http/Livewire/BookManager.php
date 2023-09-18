<?php

namespace App\Http\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookManager extends Component
{
    public $books = [];
    public $title, $author, $price, $publisher, $book = null, $isView = false, $isEdit = false;

    public function render()
    {
        $this->books = Book::orderBy('id', 'DESC')->get();
        return view('livewire.book-manager');
    }

    // Define Validation error rules
    protected $rules = [
        'title' => 'required|min:3',
        'author' => 'required|string|max:50',
        'price' => 'required|numeric',
        'publisher' => 'required|string'
    ];

    // Customize Validation error messages
    protected $messages = [
        'title.required' => 'Book title is required',
        'title.min' => 'Book title must be atleast 3 chars',
        'author.required' => 'Book author is required',
        'author.max' => 'Book author must be max 50 chars',
        'price.required' => 'Book price is required',
        'price.numeric' => 'Book price allows number only',
        'publisher.required' => 'Book publisher is required',
    ];

    /**
     * Function : Updated
     * @description : For triggering Real Time Validation
     */
    public function updated($inputs)
    {
        $this->validateOnly($inputs);
    }

    /**
     * Function : Form Action Handling
     * Description : used to handle two different action based on condtion
     */
    public function saveBook()
    {
        if (!$this->isEdit) {
            $this->storeBook();
        } else {
            $this->updateBook();
        }
    }

    /**
     * Function : Submit Book Details
     * @param NA
     * @return response
     **/
    public function storeBook()
    {
        $validatedData = $this->validate();

        $book = Book::create($validatedData);

        if ($book) {
            session()->flash('success', 'New Book details added successfully!');
        } else {
            session()->flash('error', 'Unable to create Book details!');
        }

        $this->resetInputs();

        // Dispatching browser event to close modal
        $this->dispatchBrowserEvent('close-modal');
    }

    /**
     * Function : Reset inputs
     * @param NA
     */
    private function resetInputs()
    {
        $this->title = null;
        $this->author = null;
        $this->price = null;
        $this->publisher = null;
        $this->isEdit = false;
        $this->isView = false;
        $this->book = null;
    }

    /**
     * Function : Show Book
     * @param Book $book // Route Model Binding
     */
    public function showBook(Book $book)
    {
        if ($book) {
            $this->title = $book->title;
            $this->author = $book->author;
            $this->price = $book->price;
            $this->publisher = $book->publisher;
            $this->isView = true;
        } else {
            return redirect()->route('books');
        }
    }

    /**
     * Function : Edit Book
     * @param Book $book // Route Model Binding
     */
    public function editBook(Book $book)
    {
        // If Book Exist then assign attributes to variables
        if ($book) {
            $this->book = $book;
            $this->title = $book->title;
            $this->author = $book->author;
            $this->price = $book->price;
            $this->publisher = $book->publisher;
            $this->isEdit = true;
        } else {
            return redirect()->route('books');
        }
    }

    /**
     * Function : Update Book Details
     * @param NA
     * @return response
     */
    public function updateBook()
    {
        // Validate book inputs data
        $validatedData = $this->validate();

        // If Book exist
        if ($this->book) {
            $this->book->title = $validatedData['title'];
            $this->book->author = $validatedData['author'];
            $this->book->price = $validatedData['price'];
            $this->book->publisher = $validatedData['publisher'];
            $this->book->save();
            session()->flash('success', 'Book updated successfully!');
        } else {
            session()->flash('error', 'Unable to update. Book record not found!');
        }
        $this->isEdit = false;

        // Dispatching browser event to close modal
        $this->dispatchBrowserEvent('close-modal');
    }

    /**
     * Function : Delete Book
     * @description : This is for delete confirmation
     * @param Book $book // Route model binding
     */
    public function deleteBook(Book $book)
    {
        // Assign book model object to variable
        $this->book = $book;
    }

    /**
     * Function : Destroy Book Details
     * @param NA
     * @return response
     */
    public function destroyBook()
    {
        // If book model
        if ($this->book) {
            $this->book->delete();
            session()->flash('success', 'Book record deleted successfully!');
        } else {
            session()->flash('error', 'Unable to delete. Book record not found!');
        }

        // Dispatching browser event to close modal
        $this->dispatchBrowserEvent('close-modal');
    }

    /**
     * Function : Close Modal
     */
    public function closeModal()
    {
        // calling reset inputs function
        $this->resetInputs();
    }
}
