<div>
   
    <div wire:click="showModal" wire:loading.attr="disabled" class="p-4 text-gray-900 cursor-pointer"> 
        Open modal
    </div>

    <x-jet-dialog-modal wire:model="showingModal" >
        
        <x-slot name="title">
            Modal custom title
        </x-slot>


        <x-slot name="content">

            <p>Test modal content</p>

        </x-slot>


        <x-slot name="footer">

        </x-slot>

    </x-jet-dialog-modal>

    

</div>