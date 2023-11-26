<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use thiagoalessio\TesseractOCR\TesseractOCR;


class ImageToText extends Component
{
    use WithFileUploads;
    

    public $image;
    public $text = "";
    public $path = "not here";


    public function save()
    {
        $this->validate([
            'image' => 'image|max:1024', // 1MB Max
        ]);
        
        $this->path = $this->image->store('photos');
        // dd($this->path);
        // dd(Storage::path($this->path));

        $tesseract = new TesseractOCR(Storage::path($this->path));
        $tesseract->lang('eng');
        $this->text = $tesseract->run();

        Storage::delete($this->path);

        
       

        
    }


    public function render()
    {
        return view('livewire.image-to-text');
    }
}
