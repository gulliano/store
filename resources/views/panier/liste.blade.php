@extends('layouts.store')


@section("content")

@php
    $total = 0  ;
@endphp

<ul class="divide-y  m-8  px-5 divide-gray-100">


    @forelse ($paniers as $panier )
        @php
            
            $total = $total + ($panier->product->price * $panier->quantite) ;
            
        @endphp

        <li class="flex justify-between gap-x-6 m-8 py-5">
            <div class="flex min-w-0 gap-x-4">
                <img src="" alt="" class="h-12 w-12 flex-none rounded-full bg-gray-50">
                <div class="min-w-0 flex-auto">
                    <p class="text-sm font-semibold leading-6 text-gray-900">{{$panier->product->name}}</p>
                    
                </div>
            </div>
            <div class="hidden shrink-0 sm:flex flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-500">{{$panier->product->price}} x {{$panier->quantite}}</p>
                <p class="text-sm font-semibold leading-6 text-gray-900"><a href="{{route('panier.moins',$panier)}}">-</a> <a href="{{route('panier.ajouter',$panier->product)}}">+</a> </p>
            </div>
            <div class="hidden shrink-0 sm:flex flex-col sm:items-end">
                <p class="text-sm leading-6 text-gray-800">{{$panier->product->price *  $panier->quantite}}</p>
                <p class="text-sm font-semibold leading-6 text-gray-900"><a href="{{route('panier.remove',$panier)}}"> supp</a> </p>
            </div>
            

        </li>
        
    @empty
    <li class="flex justify-between gap-x-6 m-8 py-5">
        <div class="flex min-w-0 gap-x-4">
      
            <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900">le panier est vide</p>
                
            </div>
        </div>
        
        

    </li>
        
    @endforelse

    <li class="flex justify-between gap-x-6 m-8 py-5">
        <div class="flex min-w-0 gap-x-4">
          <div class="min-w-0 flex-auto">
                <p class="text-sm font-semibold leading-6 text-gray-900"></p>
            
            </div>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-sm leading-6 text-gray-500"></p>
        </div>
        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
            <p class="text-lg leading-6 text-gray-900">Total : {{ $total }} </p>
        </div>
        

    </li>
   
</ul>
    
@endsection