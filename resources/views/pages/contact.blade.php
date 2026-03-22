@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
    <h1>Contact Us</h1>

    <div class="row">
        <div class="col-md-6">
            <h2>Send us a message</h2>
            <form action="/contact" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>

        <div class="col-md-6">
            <h2>Our Office</h2>
            <address>
                Bag End<br>
                Hobbiton, The Shire<br>
                <abbr title="Phone">P:</abbr> (000) 123-45-56
            </address>
        </div>
    </div>
@endsection
