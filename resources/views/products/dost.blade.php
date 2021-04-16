@extends('layouts.app')

@section('title', $title)
@section('content')
    <h3>About Us</h3>
    <?php
  /* echo "<pre>";
		print_r($menu_rubrics);
		echo "</pre>";*/
		?>
    <div class="row">
		<div class="col-sm-12">
			<div class="row">
				@foreach ($menu_rubrics as $menu_rubric)
					<div class="rubric-menu">
						{{ Template::rubricMenuTemplate($menu_rubric, $locale, $product, "dosts")}}
					</div>
				@endforeach
			</div>
		</div>
		<div class="col-sm-12">hotels
			
						
							<div class="hotel-section1 marginSection shadow">	
								<div class="hotelHeader">{{$dost->name}}</div>
								<div class="img1">
									<img style="float: left; margin: 0px 15px 15px 0px;" class="hotel_image123 img-fluid-height123" src="{{url($image_path.'/'.$dost->foto)}}" alt="{{$dost->name}}">
								</div>
								
								<div class="">
										{{$dost->content}}
								</div>
							</div>
						
					
		</div>
		<div class="col-sm-12">dosts
			<div class="row">
				@foreach ($dosts as $item)
					<div class="col-sm-3">
						<a href="{{url($locale."/".$product->translit."/dosts/".$item->dost_translit)}}">
							<div class="hotel-section marginSection shadow">	
								<div class="hotelHeader">{{$item->name}}</div>
								<div class="img1">
									<img align="center"  class="hotel_image img-fluid-height" src="{{url($image_path.'/'.$item->smallfoto)}}" alt="">
								</div>
								<div class="hotelHeader">Подробно</div>
								<div class="hoteladditionalInfo">
									<div class="hotelAdditionalsectionAbsolute">
										
									</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
		<div class="col-sm-12">hotels
			<div class="row">
				@foreach ($hotels as $item)
					<div class="col-sm-3">
						<a href="{{url($product->translit."/".$item->sektor."/".$item->doma_id)}}">
							<div class="hotel-section marginSection shadow">	
								<div class="hotelHeader">{{$item->name}}</div>
								<div class="img1">
									<img align="center"  class="hotel_image img-fluid-height" src="{{url($image_path.'/smalldomgold/vadimtur'.$item->doma_id.'.jpg')}}" alt="">
								</div>
								<div class="hotelHeader">Подробно</div>
								<div class="hoteladditionalInfo">
									<div class="hotelAdditionalsectionAbsolute">
										
									</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
		<div class="col-sm-12">private
			<div class="row">
				@foreach ($privates as $item)
					<div class="col-sm-3">
						<a href="{{url($product->translit."/".$item->sektor."/".$item->doma_id)}}">
							<div class="hotel-section marginSection shadow">	
								<div class="hotelHeader">{{$item->name}}</div>
								<div class="img1">
									<img align="center"  class="hotel_image img-fluid-height" src="{{url($image_path.'/smalldomgold/vadimtur'.$item->doma_id.'.jpg')}}" alt="">
								</div>
								<div class="hotelHeader">Подробно</div>
								<div class="hoteladditionalInfo">
									<div class="hotelAdditionalsectionAbsolute">
										
									</div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
		</div>
	</div>	
@endsection
</html>
