@props([
        'value'=>'',
        'name',
        'label'
        ])

@php

@endphp

<input value="{{old($name,$value)}}"
       name="{{$name}}"
       id="{{$id ?? $name}}"
       {{$attributes->merge(['type'=>'text'])
        ->class(["form-control", "is-invalid"=>$errors->has($name) ])}}
>
<label for="{{$id??$name}}">{{ucwords($label??$name)}}</label>
