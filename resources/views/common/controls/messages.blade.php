@if($message = Session::get('error'))
    <div class="message error">
        <h2>Just a heads up&hellip;</h2>

        <p>{{ $message }}</p>
    </div>
@endif


@if ($errors->any())
    <div class="message ">
        <h2>Just a heads up&hellip;</h2>

        <p>One or more errors occurred during the last action.</p>

        <ul>
            @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif
