@extends('layouts.app')

@section('title', 'Rate Our Products')

@section('content')

    <div class="rating-container">
        <div class="star-ratings">
            <div class="stars stars-example-fontawesome-o">
                <select id="u-rating-fontawesome-o" name="rating" data-current-rating="5.6" autocomplete="off">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                <span class="title current-rating font-primary">Current rating: <span class="value digits"></span></span>
                <span class="title your-rating font-primary hidden">
                    Your rating: <span class="value digits"></span><a class="clear-rating" href="javascript:void(0)"><i class="fa fa-times-circle"></i></a>
                </span>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('assets/js/rating/rating-script.js')}}"></script>
    @endpush
@endsection