<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
      <h1 class='text-white text-lg font-bold'> {{ $ticket->title }} </h1>

    <div class="w-full sm:max-w-xl mt-6 px-4 py-6 overflow-hidden  bg-gray-100 rounded-lg">

            <div class="p-4  flex justify-between px-5 ">
               <p>{{ $ticket->description }}</p>
                <p>{{ $ticket->created_at->diffForHumans() }}</p>

            @if ($ticket->attachements)
                <a href=" {{'/storage/'.$ticket->attachement }}" target="blank"> attachements</a>
            @endif
            </div>
            <div class="flex gap-4">
                <a href="{{ route('ticket.edit', $ticket->id) }}">
                    <x-primary-button class="bg-green-500"> edit</x-primary-button>
                </a>

                <form method="POST" action ="{{ route('ticket.destroy',$ticket->id) }}" >
                    @method('delete')
                    @csrf

                    <x-primary-button class="bg-red-500"> delete </x-primary-button>
                </form>
            </div>



    </div>

</div>

</x-app-layout>
