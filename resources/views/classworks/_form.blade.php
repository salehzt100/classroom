<div class="row">
    @if($errors->any())
        <div class="alert alert-danger">

        <ul>
        @foreach($errors->all() as $message)
            <li> {{$message}}</li>
        @endforeach
        </ul>
        </div>

    @endif
    <div class="col-md-8">

        <x-form.floating-control name="title">
            <x-form.input name="title" label="Classwork Title" :value="$classwork->title"
                          placeholder="Classwork Title"/>
        </x-form.floating-control>

        <x-form.floating-control name="description">
            <x-form.input-text name="description" label="Description (Option)" :value="$classwork->description"
                               placeholder="Classwork Description"/>
        </x-form.floating-control>
    </div>
    <div class="col-md-4">
        <x-form.floating-control name="published_at">
            <x-form.input name="published_at" label="Publish Date" :value="$classwork->published_date"
                          placeholder="Publish Date" type="date"/>
        </x-form.floating-control>

        <button class="btn btn-primary mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Select Students ...</button>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title border-bottom border-gray-400 p-3 fs-3" id="offcanvasRightLabel">Students </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="students">
                    @foreach($classroom->students as $student)
                        <div class="form-check">
                            <input name="students[]" class="form-check-input" type="checkbox" value="{{ $student->id }}" @checked(!isset($assigned) || in_array($student->id,$assigned))
                            id="std-{{ $student->id }}">
                            <label class="form-check-label" for="std-{{ $student->id }}">
                                {{ $student->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @if($type == $classwork::TYPE_ASSIGNMENT->value)
            <x-form.floating-control name="options.grade">
                <x-form.input name="options[grade]" label="Grade" :value="$classwork->options['grade'] ?? ''"
                              placeholder="Grade" type='number' min="0"/>
            </x-form.floating-control>
            <x-form.floating-control name="options.due">
                <x-form.input name="options[due]" label="Due" :value="$classwork->options['due'] ?? ''"
                              placeholder="Due" type="date"/>
            </x-form.floating-control>


        @endif


            <div class="form-floating mt-3">

                <div class="form-floating mb-3">
                <select class="form-select" name="topic_id" aria-label="Default select example" id="topics">
                    <option disabled selected>No Topic</option>
                    @foreach($classroom->topics as $topic)
                        <option value="{{$topic->id}}"  @selected($classwork->topic_id == $topic->id)>{{$topic->name}}</option>
                    @endforeach
                </select>
                <label class="text-muted" for="topics">
                    Topic (Optional)
                </label>
                </div>
            </div>

    </div>

</div>
