@if($errors->any())
    <div class="alert alert-danger">
        <div>
            @foreach($errors->all() as $errors)
                <p>{{ $errors }}</p>
            @endforeach    
        </div>
    </div>
@endif