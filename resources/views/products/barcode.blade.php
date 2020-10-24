
<div class="barcode">

    <p class="name" style="margin-bottom: -1rem;">{{$product->name}}</p>
    <p class="price">Price: {{$product->sale_price}}</p>

    <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($product->barcode , "C128",1.4,22)}}" style="margin-top: -1rem;margin-bottom: -1rem;" >

    <p class="pid" style="margin-top: 0.5rem;">{{$product->barcode}}</p>

</div>
