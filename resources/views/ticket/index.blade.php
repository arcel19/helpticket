<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
      <h1 class='text-white text-lg font-bold'> support ticket </h1>

    <div class="w-full sm:max-w-xl mt-6 px-4 py-6 overflow-hidden  bg-gray-100 rounded-lg">
        @foreach ( $tickets as $ticket )
            <div class="p-4  flex justify-between px-5 ">
               <a href="{{ route('ticket.show', $ticket->id) }}"> <p>{{ $ticket->title }}</p> </a>
                <p>{{ $ticket->created_at->diffForHumans() }}</p>
            </div>

        @endforeach
    </div>

</div>

</x-app-layout>
