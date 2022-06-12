@extends('layouts.app')

@section('content')

<div class="modal fade" id="modal-assign">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Assign to Truck</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <form class = "form" >
                
                <div class = "row" >
                    <div class = "form-group col-md-12" >
                    <label>Truck</label>
                    <select class = "form-control" id = "truck_id" >
                    @foreach($trucks as $truck)
                    <option value = "{{$truck->id}}" >{{$truck->registration}}</option>
                    @endforeach      
                    </select>
                </div>
                </div>

                <input type="hidden" id = "order_id">
               

            </form>

            </div>
            <div class="modal-footer justify-content-between">
             <span class = "btn btn-success btn-sm link_truck" >Assign to Truck</span>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Order</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <form class = "form" >
            	
            	<div class = "row" >
            		<div class = "form-group col-md-12" >
            		<label>Customer</label>
            		<select class = "form-control customer " >
                    @foreach($customers as $customer)
                    <option value = "{{$customer->id}}" >{{$customer->name}}</option>
                    @endforeach      
                    </select>
            	</div>
            	</div>

            	<div class = "row" >
            		<div class = "form-group col-md-6" >
            		<label>From</label>
            		<select class = "form-control from" >
            		<option>Nairobi</option>
            		<option>Mombasa</option>	
            		</select>
            	</div>

            	<div class = "form-group col-md-6" >
            		<label>To</label>
            		<select class = "form-control to" >
            		<option>Nairobi</option>
            		<option>Mombasa</option>	
            		</select>
            	</div>
            	</div>

            	<div class = "row" >
            		<div class = "col-md-12" >
            			<label>Description</label>
            		<div class = "form-group" >
            			<textarea class = "form-control description" ></textarea>
            		</div>
            		</div>
            	</div>

            </form>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-primary save_order">Save order</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<div class = "row" >
	
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-spinner"></i></span>

<div class="info-box-content">
<span class="info-box-text">Pending Orders</span>
<span class="info-box-number pending"></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-dolly"></i></span>

<div class="info-box-content">
<span class="info-box-text">Loading Orders</span>
<span class="info-box-number loading"></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-shipping-fast"></i></span>

<div class="info-box-content">
<span class="info-box-text">Dispatched Orders</span>
<span class="info-box-number dispatched"></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-default elevation-1"><i class="fas fa-check-circle"></i></span>

<div class="info-box-content">
<span class="info-box-text">Delivered Orders</span>
<span class="info-box-number delivered"></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

</div>

<div class = "row" >
	
<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-truck"></i></span>

<div class="info-box-content">
<span class="info-box-text">Available Vehicles</span>
<span class="info-box-number available"></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-truck"></i></span>

<div class="info-box-content">
<span class="info-box-text">Loading</span>
<span class="info-box-number loading_trucks"></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-shipping-fast"></i></span>

<div class="info-box-content">
<span class="info-box-text">On Transit</span>
<span class="info-box-number on_transit"></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

<div class="col-12 col-sm-6 col-md-3">
<div class="info-box mb-3">
<span class="info-box-icon bg-dark elevation-1"><i class="fas fa-users"></i></span>

<div class="info-box-content">
<span class="info-box-text">Clients</span>
<span class="info-box-number clients"></span>
</div>
<!-- /.info-box-content -->
</div>
<!-- /.info-box -->
</div>

</div>

<div class = "row" >

	<div class = "col-md-12" >
		<div class = "card card-primary" >
			<div class = "card-header" >
				<h4>Orders Summary <span class = "btn btn-default btn-sm show_modal" style = "float:right;" >New Order</span></h4>

			</div>
			<div class = "card-body" >
				<table class = "table table-stripped" >
					<thead>
						<th>#</th>
						<th>Date</th>
						<th>Client</th>
						<th>Description</th>
						<th>Status</th>
                        <th>Route</th>
                        <th>Action</th>
					</thead>
					<tbody>
                    @php $count=1; @endphp
                    @foreach($orders as $order)
                    <tr>
                        <td>{{$count}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->description}}</td>

                        <td>
                        @if($order->status == "pending")
                        <span class = "fa fa-spinner" ></span> {{$order->status}}
                        @elseif($order->status == "loading")
                        <span class = "fa fa-dolly" ></span> {{$order->status}}
                        @elseif($order->status == "dispatched")
                        <span class = "fa fa-shipping-fast" ></span> {{$order->status}}
                        @elseif($order->status == "delivered")
                        <span class = "fa fa-check-circle" ></span> {{$order->status}}
                        @endif
                        </td>

                        <td>{{$order->from}} to {{$order->to}}</td>

                        <td>
                        @if($order->status == "pending")
                        <span class = "btn btn-success btn-xs assign_order" data = "{{$order->id}}" >Assign to truck</span>
                        @elseif($order->status == "loading")
                        <span class = "btn btn-primary btn-xs dispatch_order" data = "{{$order->id}}">Dispatch Order</span>
                        @elseif($order->status == "dispatched")
                        <span class = "btn btn-warning btn-xs deliver_order" data = "{{$order->id}}">Set to delivered</span>
                        @elseif($order->status == "delivered")
                        ...
                        @endif
                        </td>

                    </tr>
                     @php $count++; @endphp
                    @endforeach               
                    </tbody>
					<tfoot></tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection