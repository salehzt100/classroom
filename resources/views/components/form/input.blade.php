@props([
        'value'=>'',
        'name',
        'label',
        'errorname'
        ])

@php


@endphp



<input value="{{old($name,$value)}}"
       name="{{$name}}"
       id="{{$id ?? $name}}"
       {{$attributes->merge(['type'=>'text'])
        ->class(["form-control   ms-1", "is-invalid"=>$errors->has($errorname ?? '') ])}}
>
<label class=" ms-1" for="{{$id??$name}}">{{ucwords($label??$name)}}</label>


