@props(['experience'])

<h1 class="text-3xl text-center font-bold m-10">{{$experience->name}}</h1>
    <div class="relative items-center rounded-lg flex flex-col justify-center text-center gap-4 m-4 overflow-hidden min-h-[200px]">
        <div class="z-10 flex flex-col items-center justify-center text-center gap-4">
            <div class="prose max-w-3xl mx-auto text-justify mb-8">
                {!! $experience->description !!}
            </div>
            <img 
            src="{{ $experience->image ? asset('storage/' . $experience->image) : asset('images/no-image-available.png') }}" 
            class="w-[120px] h-auto object-contain" />
                    <p>{{$experience->company}}</p>
        </div>

    </div>

