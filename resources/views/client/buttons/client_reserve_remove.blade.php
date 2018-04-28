
<button class="delete btn btn-danger" id="checkout{{$id}}"><i class="fa fa-trash"></i> CheckOut</button>

<script>
    $('#checkout{{$id}}').click(function () {
        if (confirm('are you sure?')) {
            $.ajax({
                url: "{{(route('client.remove',$id))}}",
                type: 'DELETE',
                data: {
                    '_method': 'DELETE',
                    '_token': '{{ csrf_token() }}'
                },
                success: function () {
                    $('#dataTableBuilder').DataTable().ajax.reload();
                },
                error:function (err) {
                    console.log(err);
                }

            })

        }
    })
</script>
