@extends('layouts.app')

@section('content')
    <div class="p-5 bg-light">
        <div class="container">
            <h1 class="display-3">Contact us</h1>
            <p class="lead">We'll reach out to you</p>
            <hr class="my-2">
        </div>
    </div>


    <div class="container">
        @include('partials.errors')
        @include('partials.success')

        <form action="{{ route('contacts.send') }}" method="post">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId"
                            placeholder="Mario Rossi" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email" aria-describedby="helpId"
                            placeholder="example@example.com" value="{{ old('email') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" name="message" id="message" rows="5">{{ old('message') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
    </div>

@endsection
