@if ((Auth::guard('employee')->user()->type ==='manager') || (Auth::guard('employee')->user()->type === 'admin') || (Auth::guard('employee')->user()->type === 'receptionist') )

    <button id="delete{{$id}}" class="btn btn-danger"><i class="fa fa-remove"> Delete</i></button>
@endif





<script>
    $('#delete{{$id}}').click(function () {

        if (confirm('are you sure?')) {
            $.ajax({

                url: 'client/reservation/delete/' +{{$id}},
                type: 'DELETE',
                data: {
                    '_method': 'DELETE',
                    '_token': '{{ csrf_token() }}'
                },
                success: function () {
                    $('#dataTableBuilder').DataTable().ajax.reload();
                },
                error:function (err) {
                    console.log(err)
                }

            })

        }
    })
</script>
