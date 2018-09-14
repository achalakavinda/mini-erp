@if ($errors->any())
    <div style="margin: 10px;background-color: rgba(255, 0, 0,0.8);color: white" class="alert ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
