<x-app-layout>
    <div class="justify-center">
        <form method="POST" action="{{ route('ticket.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- title  -->
            <div>
                <x-input-label for="text" :value="__('title')" />
                <x-text-input id="text" class="block mt-1 w-full" type="text" name="title" :value="old('title')"  autofocus  />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('description')" />

               <x-textarea name="description" :value="old('description')"/>

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="upload file" :value="__('attachements')" />

              <x-fileInput name="attachements"/>

                <x-input-error :messages="$errors->get('file')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    create
                </x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
