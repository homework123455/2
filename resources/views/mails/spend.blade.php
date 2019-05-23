
<p>購買明細：</p>
<p>商品名稱：</p>
<hr>

<div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    
					<th width="100" style="text-align: center">商品名稱</th>
					<th width="100" style="text-align: center">商品數量</th>
					<th width="100" style="text-align: center">商品單價</th>
                    <th width="100" style="text-align: center">商品總價</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($ordersdetail as $orders1)
                    <tr>
					
                        <td style="text-align: center">{{$orders1->product}}</td>
                          <td style="text-align: center">{{$orders1->qty}}</td>  
                         <td style="text-align: center">{{$orders1->cost}}</td>
                        <td style="text-align: center">{{$orders1->total}}</td>

						
                    </tr>
               @endforeach
	
				 
                </tbody>
            </table>
        </div>

<hr>
<p>總金額：{{$total}}</p>