@extends('layouts.backend.main')
@section('css')
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection
@section('content')
    @include('backend.admin.modals.customer.add')
    @include('backend.admin.modals.customer.edit')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3>Customers</h3>
                </div>
                <div class="col-md-2 text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCustomerModal">
                        Add
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="add-customer-table">
                <thead class="bg-primary">
                    <th>Registered Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        function fetchCustomers(){
            $('#add-customer-table').DataTable({
                destroy: true,
                processing: true,
                serverSide: true,
                order: [[0, 'desc']],
                ajax: {
                    "url": "{{ route('admin.get.customers') }}",
                },
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'actions', name: 'actions'},
                ]
            });
        }
        fetchCustomers();
        //Add Customer
        $("#add-customer-form").on('submit', function (e){
            e.preventDefault();
            let $action = $(this).attr('action');
            let $formData = new FormData(this);
            $.ajax({
               url: $action,
               type: "POST",
                data: $formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(result){
                   if(result.code == 200){
                       $('#addCustomerModal').modal('hide');
                   }
                    fetchCustomers();
                    sweetAlertToster(result.code, result.message)
                }
            });
        });
        //Edit Customer
        $(document).delegate('.editCustomer', 'click', function (){
            let $id = $(this).attr('data-id');
            let $name = $(this).attr('data-name');
            let $email = $(this).attr('data-email');
            $('#edit-id').val($id);
            $('#edit-name').val($name);
            $('#edit-email').val($email);
            $('#editCustomerModal').modal('show');
        });
        $("#edit-customer-form").on('submit', function (e){
            e.preventDefault();
            let $action = $(this).attr('action');
            let $formData = new FormData(this);
            $.ajax({
                url: $action,
                type: "POST",
                data: $formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function(result){
                    if(result.code == 200){
                        $('#editCustomerModal').modal('hide');
                    }
                    fetchCustomers();
                    sweetAlertToster(result.code, result.message)
                }
            });
        });
        //Delete Customer
        $(document).delegate('.deleteCustomer', 'click', function (e){
            e.preventDefault();
            let $id = $(this).attr('data-id');
           $.ajax({
               url: "{{route('admin.delete.customer')}}",
               type: "DELETE",
               data:{
                   id: $id,
                   _token: "{{csrf_token()}}"
               },
               success: function(result){
                   fetchCustomers();
                   sweetAlertToster(result.code, result.message)
               }
           });
        });
    </script>
@endsection
