@if ($errors->any())
<div class="alert alert-danger">
    <ul class="container">
        @foreach ($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@endif

@foreach(['success','info','default','warning','danger'] as $item)
	@if(session()->has("msg_".$item))
	    <div class="alert alert-{{$item}}">
	        {{ session()->get('msg_'.$item) }}
	    </div>
	@endif
@endforeach