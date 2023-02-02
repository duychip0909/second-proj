<div class="card flex-fill cart-detail">
    <h5 class="card-header border-bottom">Order items</h5>
    <div class="card-body pt-0">
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Cup</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @php
                    $i = 1;
                @endphp
                @foreach($order->items as $item)
                    <tr class="record">
                        <td><strong>{{$i++}}</strong></td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="coffee-img me-4">
                                    <img src="{{$item->coffees->image}}" alt="">
                                </div>
                                {{$item->coffees->name}}
                            </div>
                        </td>
                        <td>
                            <input class="form-control w-25 incrementInput" type="number" data-id="{{$item->id}}" value="{{$item->quantity}}">
                        </td>
                        <td>{{number_format($item->coffees->price)}}đ</td>
                        <td>
                            {{number_format(($item->quantity) * ($item->coffees->price))}}đ
                        </td>
                        <td>
                            <a href="{{route('deleteCupCart')}}" class="trash-icon" data-id="{{$item->id}}">
                                <i class='bx bx-trash'></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td>{{number_format($subTotal)}}đ</td>
                </tbody>
            </table>
        </div>
    </div>
</div>

