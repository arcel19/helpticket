<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
        <form method="POST" action="{{ route('ticket.update',$ticket) }}" enctype="multipart/form-data">
            @method('put')
            @csrf
            <!-- title  -->
            <div>
                <x-input-label for="text" :value="__('title')" />
                <x-text-input id="text" class="block mt-1 w-full" type="text" name="title" value="{{ $ticket->title }}"  autofocus  />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('description')" />

               <x-textarea name="description" value="{{ $ticket->description }}"/>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mt-4">

                <x-input-label for="upload file" :value="__('attachements')" />
                @if ($ticket->attachements)
                <a class ="text-white" href=" {{'/storage/'.$ticket->attachement }}" target="blank"> see attachements</a>
                @endif

              <x-fileInput name="attachements"/>

                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    save changes
                </x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
