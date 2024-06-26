{{--<!doctype html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}
{{--    <meta name="description" content="">--}}
{{--    <meta name="author" content="">--}}

{{--    <title>Pricing example for Bootstrap</title>--}}

{{--    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">--}}

{{--   --}}
{{--</head>--}}

{{--<body>--}}


<x-main-layout title="Plans">
    <x-slot name="nav">
        <x-nav.home-nav />
    </x-slot>
    @push('styles')
        <link href="{{asset("assets/css/pricing.css")}}" rel="stylesheet">

       <style>

           .subscribe-btn:hover{
               border-color: rgb(182, 160, 146);
           }
       </style>
    @endpush


{{--        <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">--}}
{{--            <h5 class="my-0 mr-md-auto font-weight-normal">Company name</h5>--}}
{{--            <nav class="my-2 my-md-0 mr-md-3">--}}
{{--                <a class="p-2 text-dark" href="#">Features</a>--}}
{{--                <a class="p-2 text-dark" href="#">Enterprise</a>--}}
{{--                <a class="p-2 text-dark" href="#">Support</a>--}}
{{--                <a class="p-2 text-dark" href="#">Pricing</a>--}}
{{--            </nav>--}}
{{--            <a class="btn btn-outline-primary" href="#">Sign up</a>--}}
{{--        </div>--}}

        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4 ">Pricing</h1>
            <p class="lead">Experience enhanced education with Classroom for Education's scalable plans for advanced classroom management and collaborative learning.</p>
        </div>

        <div class="container">
            <div class="card-deck mb-3 text-center">
                @foreach($plans as $plan)
                    <div class="card mb-4 box-shadow @if($plan->feature)  main-border-color @endif">
                        <div class="card-header @if($plan->feature) text-white main-bg-color @endif">
                            <h4 class="my-0 font-weight-normal">{{$plan->name}}</h4>
                        </div>
                        <div class="card-body ">
                            <h1 class="card-title pricing-card-title">${{$plan->price}} <small class="text-muted">/ mo</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                @foreach($plan->features as $feature)

                                    <li>{{$feature->name}} : {{$feature->pivot->feature_value}}</li>

                                    <li></li>
                                @endforeach

                            </ul>
                            <form action="{{route('subscriptions.store')}}" method="post">
                                @csrf
                                <input type="hidden" name="period" value='3'>
                                <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                <button type="submit" class="btn btn-lg btn-block main-bg-color subscribe-btn ">Subscribe</button>

                            </form>
                        </div>
                    </div>

                @endforeach

            </div>

{{--            <footer class="pt-4 my-md-5 pt-md-5 border-top">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 col-md">--}}
{{--                        <img class="mb-2" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="24" height="24">--}}
{{--                        <small class="d-block mb-3 text-muted">&copy; 2017-2018</small>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md">--}}
{{--                        <h5>Features</h5>--}}
{{--                        <ul class="list-unstyled text-small">--}}
{{--                            <li><a class="text-muted" href="#">Cool stuff</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Random feature</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Team feature</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Stuff for developers</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Another one</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Last time</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md">--}}
{{--                        <h5>Resources</h5>--}}
{{--                        <ul class="list-unstyled text-small">--}}
{{--                            <li><a class="text-muted" href="#">Resource</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Resource name</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Another resource</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Final resource</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="col-6 col-md">--}}
{{--                        <h5>About</h5>--}}
{{--                        <ul class="list-unstyled text-small">--}}
{{--                            <li><a class="text-muted" href="#">Team</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Locations</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Privacy</a></li>--}}
{{--                            <li><a class="text-muted" href="#">Terms</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </footer>--}}
        </div>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="{{asset("assets/js/popper.min.js")}}" ></script>
        <script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
        <script src="{{asset("assets/js/holder.min.js")}}" ></script>
        <script>
            Holder.addTheme('thumb', {
                bg: '#55595c',
                fg: '#eceeef',
                text: 'Thumbnail'
            });
        </script>

</x-main-layout>

{{--</body>--}}
{{--</html>--}}
