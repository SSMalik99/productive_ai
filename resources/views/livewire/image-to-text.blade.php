<div>
    <div class="relative p-36 sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

        <div class="flex justify-center">
                
            <img src="{{ asset('logo.png') }}" alt="logo" width="430px">
        </div>
        
        <div class="text-white">

            {{-- <form wire:submit="save">
                <input type="file" wire:model="photo">
             
                @error('photo') <span class="error">{{ $message }}</span> @enderror
             
                <button type="submit">Save photo</button>
            </form> --}}


            <form wire:submit.prevent="save" class="">

                <div>
                    <label 
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                    Upload file
                </label>
                
                <input 
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" 
                    id="image" 
                    type="file" wire:model="image">
                  
                </div>  
               
             
                @error('photo') <div class="error text-red-500">{{ $message }}</div> @enderror
                
                <button 
                    type="submit" 
                    class="focus:outline-none mt-2 text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                    Get Text
                </button>

                
            </form>

            @if (strlen($text) > 0)
                <div x-data="textInImage">

                    <button class="focus:outline-none mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" x-on:click="copyText">Copy</button>


                    {{-- <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Text On Image</label> --}}
                    <textarea id="message" rows="20" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $text }}</textarea>

                    
                    
                </div>    
            @endif
            
        </div>
    </div>
</div>
@script
<script>
    Alpine.data('textInImage', () => {
        return {
            copyText(){
                document.getElementById('message').select()
                document.execCommand('copy')
            }
        }
    })
</script>

@endscript