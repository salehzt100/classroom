@props([
        'value'=>'',
        'name',
        'label'
        ])


<textarea
       name="{{$name}}"
       id="{{$id ?? $name}}"
       {{$attributes->merge([])
        ->class(["form-control", "is-invalid"=>$errors->has($name) ])}}
> {{old($name,$value)}}</textarea>

<label for="{{$id??$name}}">{{ucwords($label??$name)}}</label>
