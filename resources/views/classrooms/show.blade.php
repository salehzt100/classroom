@extends('layouts.master')
@section('title','Classroom '."$classroom->name")
@section('content')
<div class="container">

    <h1>{{$classroom->name}} (#{{$classroom->id}})</h1>
    <h3>{{$classroom->section}}</h3>


    <div class="row">
        <div class="col-md-3">
            <div class="border rounded p-3 text-center">
                <span class="text-success fs-2" >{{$classroom->code}}</span>
            </div>
        </div>
        <div class="col-md-9">
            <p><a href="{{$invitation_link}}" class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><span class="text text-success"> Invitation Link :</span> {{$invitation_link}}</a></p>
        </div>
    </div>

</div>

@endsection
