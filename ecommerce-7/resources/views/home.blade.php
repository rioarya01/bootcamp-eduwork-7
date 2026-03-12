@extends('template.layouts')
@section('title', 'Home Page')
@section('content')
	<div class="container py-4">
		<div class="row g-4">
			@foreach ($products as $product)
				<div class="col-md-4 d-flex justify-content-center">
					<x-product-card
						:name="$product['name']"
						:price="$product['price']"
						:image="$product['image']"
					/>
				</div>
			@endforeach
		</div>
	</div>
    <x-alert-bootstrap type="success">
        Selamat datang di halaman home
    </x-alert-bootstrap>

	<x-accordion-bootstrap id="accordionExample" :items="$accordionItems" />
	
    <h1>Home Page</h1>
    @forelse ($products as $product)
        <li>{{ $loop->first ? 'First' : ''}} {{ $product['name'] }} - ${{ $product['price'] }}</li>
    @empty
        <p>Belum ada produk</p>
    @endforelse
@endsection