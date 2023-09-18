<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookManager1 extends Component
{
    public $books = [];

    #[Rule('required|min:3')]
    public $title, $author, $price, $publisher, $addBook;

    public function render()
    {
        $this->books = Book::all();
        return view('livewire.book-manager');
    }

    protected $rules = [
        'title' => 'required|string|min:6',
    ];

    protected $messages = [
        'title.required' => 'Please enter the task title',
        'title.min' => 'Title must be atleast 6 chars long',
        'description.required' => 'Please enter the task description',
        'description.min' => 'Description must be atlest 6 chars long',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    // Validation Rules
    // protected $rules = [
    //     'title' => 'required|min:4',
    //     'author' => 'required|string',
    //     'price' => 'required|numeric',
    //     'publisher' => 'required|string'
    // ];


    public function createBook() {
        $this->addBook = true;
        $this->updateBook = false;
    }

    public function store() {
        // Call validation method
        $validatedData = $this->validate();
        $this->book = Book::create($validatedData);

        dd($this->book);
    }
}
