@extends('layouts.app')

@section('content')

<div class = "row" >

  <div class="modal fade" id="modal-success">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Truck</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <form class = "form">
              @csrf
              

              <div class = "form-group col-md-12" >
              <label>Registration</label>
              <input type="text" name="name" class = "form-control registration" required>
              <input type="hidden" class = "form-control truck_id">
              </div>

              <div class = "form-group col-md-12" >
              <label>Type</label>
              <select class = "form-control type" name = "type">
              <option>Lorry</option>
              <option>Pickup</option>
              </select>
              </div>

             

              <div class = "form-group col-md-12" >
              <input type="submit" value="Save Changes" class = "btn btn-sm btn-success update_truck">
              </div>

              </form>
              </div>

            

            </div>
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
   

	<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">New Truck</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
             
            <form class = "form" method = "post" action = "{{route('new_truck')}}">
            	@csrf
            	<div class = "row" >

            	<div class = "form-group col-md-12" >
            	<label>Registration</label>
            	<input type="text" name="registration" class = "form-control" required>
            	</div>

            	<div class = "form-group col-md-12" >
            	<label>Type</label>
              <select class = "form-control" name = "type">
                <option>Lorry</option>
                <option>Pickup</option>
              </select>
            	</div>

            	<div class = "form-group col-md-12" >
            	<input type="submit" value="Save " class = "btn btn-sm btn-success">
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
				<h4><span class = "fa fa-truck" ></span> Fleet <span class = "btn btn-default btn-sm show_modal" style = "float:right;" >New Truck</span></h4>
			</div>
			<div class = "card-body" >
				<table class = "table table-stripped" >
					<thead>
						<th>#</th>
						<th>Date</th>
						<th>Registration</th>
						<th>Type</th>
						<th>Status</th>
						<th><span class = "fa fa-edit" ></span></th>
						<th><span class = "fa fa-trash" ></span></th>
					</thead>
					<tbody>
          @php $count=1; @endphp
          @foreach($trucks as $truck)
          <tr>
            <td>{{$count}}</td>
            <td>{{$truck->created_at}}</td>
            <td>{{$truck->registration}}</td>
            <td>{{$truck->type}}</td>
            <td>{{$truck->status}}</td>
            <td><span class = "fa fa-edit edit_truck" data = "{{$truck->id}}" ></span></td>
            <td><span class = "fa fa-trash delete_truck" data = "{{$truck->id}}" ></span></td>
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