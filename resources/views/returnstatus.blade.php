<h2>Your Return Request {{$status}} !</h2><br>
<h3><b>Order No:    </b> {{$order_line->order_header_id}}</h3>
<h3><b>Product: </b> {{$order_line->product_name}}</h3>
<h3><b>Color: </b> {{$order_line->color}}</h3>
<h3><b>Size: </b> {{$order_line->size}}</h3><br>
<h2><b>Reason: </b> {{$order_line->cancle_note}}</h2>
