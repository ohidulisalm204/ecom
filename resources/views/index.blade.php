@extends('ext/layouts/master')


@section('content')	
<section id="slider"><!--slider-->
	@include('ext/partial/slider')
</section><!--/slider-->
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				@include('ext/partial/leftsidebar')
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
				   @include('ext/partial/feature')
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
