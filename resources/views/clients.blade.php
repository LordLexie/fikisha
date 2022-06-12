@extends('layouts.app')

@section('content')

<div class = "row" >

  <div class="modal fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Customer</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <form class = "form" method = "post" action = "{{route('new_client')}}">
              @csrf
              <div class = "row" >

              <div class = "form-group col-md-12" >
              <label>Name</label>
              <input type="text" name="name" class = "form-control name" required>
              <input type="hidden" class = "form-control client_id">
              </div>

              <div class = "form-group col-md-12" >
              <label>Phone</label>
              <input type="text" name="phone" class = "form-control phone" required>
              </div>

              <div class = "form-group col-md-12" >
              <label>Email</label>
              <input type="text" name="email" class = "form-control email" required>
              </div>

              <div class = "form-group col-md-12" >
              <input type="submit" value="Save Changes" class = "btn btn-sm btn-success update_customer">
              </div>

              </div>

            </form>

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
              <h4 class="modal-title">New Customer</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <form class = "form" method = "post" action = "{{route('new_client')}}">
            	@csrf
            	<div class = "row" >

            	<div class = "form-group col-md-12" >
            	<label>Name</label>
            	<input type="text" name="name" class = "form-control" required>
            	</div>

            	<div class = "form-group col-md-12" >
            	<label>Phone</label>
            	<input type="text" name="phone" class = "form-control" required>
            	</div>

            	<div class = "form-group col-md-12" >
            	<label>Email</label>
            	<input type="text" name="email" class = "form-control" required>
            	</div>

            	<div class = "form-group col-md-12" >
            	<input type="submit" value="Save Client" class = "btn btn-sm btn-success">
            	</div>

            	</div>

            	

            </form>

            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

	<div class = "col-md-12" >
		<div class = "card card-primary" >
			<div class = "card-header" >
				<h4><span class = "fa fa-users" ></span> Customers <span class = "btn btn-default btn-sm show_modal" style = "float:right;" >New Customer</span></h4>
			</div>
			<div class = "card-body" >
				<table class = "table table-stripped" >
					<thead>
						<th>#</th>
						<th>Date</th>
						<th>Client</th>
						<th>Phone</th>
						<th>Email</th>
						<th><span class = "fa fa-edit" ></span></th>
						<th><span class = "fa fa-trash" ></span></th>
					</thead>
					<tbody>
            @php
            $counter=1;
            @endphp
						@foreach($customers as $customer)
						<tr>
							<td>{{$counter}}</td>
							<td>{{$customer->created_at}}</td>
							<td>{{$customer->name}}</td>
							<td>{{$customer->phone}}</td>
							<td>{{$customer->email}}</td>
							<td><span class = "fa fa-edit edit_client" data = {{$customer->id}}></span></td>
							<td><span class = "fa fa-trash delete_client" data = {{$customer->id}}></span></td>
						</tr>
            @php $counter++; @endphp
						@endforeach
					</tbody>
					<tfoot></tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection