<!-- View Cart Page -->
@extends('layouts.base')

@section('title', 'Cart')

@section('cart')
<div class="container mt-5">
    <h2 class="mb-4">Shopping Cart</h2>
    <div class="row">
        <div class="col-md-8">
            <!-- Cart Items -->
            @if (session('cart') && count(session('cart')) > 0)
                @foreach (session('cart') as $id => $details)
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="{{ asset('images/' . $details['image']) }}" class="card-img" alt="{{ $details['name'] }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $details['name'] }}</h5>
                                    <p class="card-text">{{ $details['description'] }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex align-items-center">
                                            @csrf
                                            <button type="button" class="btn btn-secondary btn-sm mr-2" onclick="updateQuantity('{{ $id }}', -1)">-</button>
                                            <input type="text" name="quantity" value="{{ $details['quantity'] }}" class="form-control w-25 text-center" readonly>
                                            <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="updateQuantity('{{ $id }}', 1)">+</button>
                                        </form>
                                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">Remove</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Your cart is empty</p>
            @endif
        </div>

        <!-- Checkout Form -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5>Checkout</h5>
                    <form action="{{ route('cart.checkout') }}" method="POST" id="checkoutForm">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" name="subject" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Request a Quote</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function updateQuantity(id, change) {
        let input = document.querySelector(`form[action*="${id}"] input[name="quantity"]`);
        let quantity = parseInt(input.value);
        quantity += change;
        if (quantity <= 0) {
            quantity = 1; // Minimum quantity of 1
        }
        input.value = quantity;

        // Submit the form to update quantity
        let form = document.querySelector(`form[action*="${id}"]`);
        let data = new FormData(form);
        fetch(form.action, {
            method: 'POST',
            body: data,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response => response.json()).then(data => {
            // Refresh the cart page or handle success
            location.reload();
        }).catch(error => console.error('Error:', error));
    }

    document.getElementById('checkoutForm').addEventListener('submit', function (event) {
        event.preventDefault();
        Swal.fire({
            title: 'Success!',
            text: 'Your order has been placed successfully. our representative will reach you soon',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            this.submit(); // Submit the form after alert
        });
    });
</script>
@endsection
